<?php

namespace App\Http\Controllers\Initiator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Initiator\SignUpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SignUpController extends Controller
{
    public function index(){
        return view('initiator.sign-up');
    }

    public function storeAndVerify(SignUpRequest $request){
        try {
            $otp = rand(10000, 99999);
            $user = $request->validated();
            Cache::put($request->mobile, $user, now()->addMinutes(20));
            return response()->json([
                'status' => true,
                'message' => 'OTP Send!',
                'user' => $user
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

    public function review(){
        return view('initiator.review-verification');
    }
}
