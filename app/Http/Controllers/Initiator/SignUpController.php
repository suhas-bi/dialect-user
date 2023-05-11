<?php

namespace App\Http\Controllers\Initiator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Initiator\SignUpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTP;
use App\Models\Company;

class SignUpController extends Controller
{
    public function index(){
        return view('initiator.sign-up');
    }

    public function storeAndVerify(SignUpRequest $request){
        try {
            $otp = rand(100000, 999999);
            $user = $request->validated();
            $user['otp'] = $otp;
            Cache::put($request->mobile, $user, now()->addMinutes(20));

            Mail::to('suhas966@gmail.com')->queue(new OTP($otp));

            return response()->json([
                'status' => true,
                'message' => 'OTP Send!',
                'user' => $user,
                'otp' => $otp
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);

        }    
    }

    public function resendOtp(Request $request){
        $mobile_number = $request->mobile;
        $user = Cache::get($mobile_number);

        if(!$user){
            return response()->json([
                'status' => false,
                'message' => 'Request Timeout!',
            ], 404);
        }

        try {

            $otp = rand(100000, 999999);
            $user['otp'] = $otp;
            Cache::put($mobile_number, $user, now()->addMinutes(20));

            Mail::to('suhas966@gmail.com')->queue(new OTP($otp));

            return response()->json([
                'status' => true,
                'message' => 'OTP Generated Successfully'
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);

        }    
    }

    public function verify(){
        return view('initiator.sign-up-otp');
    }

    public function verifyOtp(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'otp' => 'required|max:6',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $mobile_number = $request->mobile;
            $user = Cache::get($mobile_number);

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'OTP expired or does not exist',
                ], 404);
            }

            if ($user['otp'] != $request->otp) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid OTP',
                ], 422);
            }

            $newCompany = Company::create([
                 'name' => $user['name'],
                 'email' => $user['email'],
                 'country_id' => $user['country_id'],
                 'country_code' => $user['country_code'],
                 'phone' => $user['mobile'],
                 'pobox' =>	$user['pobox'],
            ]);

            // Clear the OTP from cache
            Cache::forget($mobile_number);

            Cache::put('company', $newCompany);

            return response()->json([
                'status' => true,
                'company' => $newCompany,
                'message' => 'Email Verified!'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function review(){
        return view('initiator.review-verification');
    }
}
