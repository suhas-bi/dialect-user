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
use App\Models\CompanyUser;
use App\Models\RegistrationToken;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            Cache::put($request->email, $user, now()->addMinutes(20));

            Mail::to($user['email'])->queue(new OTP($otp));
            Cache::put('otp_count', 0);
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
        $email = $request->email;
        $user = Cache::get($email);

        if(!$user){
            return response()->json([
                'status' => false,
                'message' => 'Request Timeout!',
            ], 404);
        }

        try {

            $otp = rand(100000, 999999);
            $user['otp'] = $otp;
            Cache::put($email, $user, now()->addMinutes(20));

            Mail::to($user['email'])->queue(new OTP($otp));

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
            'email' => 'required',
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
            $email = $request->email;
            $user = Cache::get($email);

            $otp_count = Cache::get('otp_count') + 1;
            Cache::put('otp_count', $otp_count);
            if($otp_count > 3){
                return response()->json([
                    'status' => false,
                    'type' => 1,
                    'message' => 'Exceeded maximum attempts',
                ], 422);
            }

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'type' => 1,
                    'message' => 'OTP expired or does not exist',
                ], 422);
            }

            if ($user['otp'] != $request->otp) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid OTP',
                ], 422);
            }

            $checkCompanyExists = Company::where('email',$user['email'])->first();

            if(!$checkCompanyExists){
                $newCompany = Company::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'country_id' => $user['country_id'],
                    'country_code' => $user['country_code'],
                    'phone' => $user['mobile'],
                    'is_approved' => 0
               ]);

               // Clear the OTP from cache
                Cache::forget($email);

                Cache::put('company', $newCompany);

                $plaintext = Str::random(32);
                $token = RegistrationToken::create([
                        'company_id' => $newCompany->id,
                        'token' => hash('sha256', $plaintext),
                        'expire_at' => now()->addDays(7),
                ]);

                $details = [
                    'name' =>  $newCompany->name ?? 'User',
                    'subject'	=>'DialectB2B Registration Process.',
                    'body' => "<div><p>We're excited to welcome you to the world of infinite opportunities, and we can't wait to help you get started on your new journey.<br><br>To get started, complete your registration here:</p></div>",
                    'link'	=> url('registration/'.$token->token),
                ];
                
                \Mail::to($newCompany->email)->send(new \App\Mail\CommonMail($details));

                return response()->json([
                    'status' => true,
                    'company' => $newCompany,
                    'message' => 'Email Verified!'
                ], 200);
            }
            
            // Clear the OTP from cache
            Cache::forget($email);

            Cache::put('company', $checkCompanyExists);
            
            return response()->json([
                'status' => true,
                'company' => $checkCompanyExists,
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
        $comp = Cache::get('company');
        if(!$comp){
            return redirect('/');
        }
        
        $company = Company::find($comp->id);
        if($company->decleration == ''){
            return back()->with('warning','Please upload declaration file to continue.');
        }
        Cache::forget('company');
        
        return view('initiator.review-verification',compact('company'));
    }

    public function onboarding($token){
        $user = CompanyUser::where('token', $token)->firstOrFail();
        if(!$user){
            return redirect('/');
        }
        return view('initiator.onboarding',compact('user'));
    }

    public function setPassword(Request $request){
        $request->validate([  
            'password' =>'required|confirmed|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);
        
        DB::beginTransaction();

        try {
            $user = CompanyUser::find($request->user_id);
            $user->password = Hash::make($request->password);
            $user->status = 1;
            $user->token = '';
            $user->save();
            
            $company_users = CompanyUser::where('company_id',$user->company_id)->whereNotNull('password')->where('status',1)->get();
            $company = Company::find($user->company_id);
            if($company_users->count('id') == 3){
                $company->status = $company->is_account_verified == 1 ? 2 : 1;
                $company->save();
            }
    
            // $details['email'] = $company->email;
            // $details['name'] = $company->name;
            // $details['subject'] = 'User successfully onboarded.';
            // $details['body'] = "<div><p>'.$user->name.' has successfully activated his account</p></div>";
            // dispatch(new MailQueueJob($details));
            
            DB::commit(); 
            if (Auth::attempt(['email' => $user->email, 'password' => $request->password], '')) {
                $user = auth()->user();
                if($user->role == 1){
                    return redirect()->intended('admin/dashboard')
                    ->withSuccess('Signed in');
                }  
                elseif($user->role == 2){
                    return redirect()->intended('procurement/dashboard')
                    ->withSuccess('Signed in');
                }  
                elseif($user->role == 3){
                    return redirect()->intended('sales/dashboard')
                    ->withSuccess('Signed in');
                }  
                elseif($user->role == 4){
                    return redirect()->intended('member/dashboard')
                    ->withSuccess('Signed in');
                }  
                else{
                    return back();
                }
                
            }
      
            return back();
        }
        catch(\Exception  $e){
            DB::rollback();
            return redirect()->intended('/');
        }
       
    }

    public function registrationProcess($token){
        $data = RegistrationToken::where('token', $token)->firstOrFail();
        if(!$data){
            return redirect('/');
        }
        $company = Company::find($data->company_id);
        Cache::put('company', $company);

        $otp = rand(100000, 999999);
        $company['otp'] = $otp;
        Cache::put($company->phone, $company, now()->addMinutes(20));

        try {

            Mail::to($company->email)->queue(new OTP($otp));

            return redirect()->route('sign-up.verify');
            // return response()->json([
            //     'status' => true,
            //     'message' => 'OTP Generated Successfully'
            // ], 200);
        } catch (\Throwable $th) {

            return redirect()->route('sign-up.verify');
            // return response()->json([
            //     'status' => false,
            //     'message' => $th->getMessage()
            // ], 500);

        }    
    }
}
