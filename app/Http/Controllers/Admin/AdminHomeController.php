<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Initiator\SignUpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTP;
use App\Models\Company;
use App\Models\CompanyUser;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdminHomeController extends Controller
{

    public function __construct() 
    {
      $this->middleware('auth');
    }
    
    public function index(){
        $company_id = auth()->user()->company_id;

        $userCount = CompanyUser::where('company_id',$company_id)->whereNotNull('password')->count();
        if($userCount < 3){
            $admin = CompanyUser::where('company_id',$company_id)->where('role',1)->first();
            $procurement = CompanyUser::where('company_id',$company_id)->where('role',2)->first();
            $sales = CompanyUser::where('company_id',$company_id)->where('role',3)->first();
            return view('admin.team-creation',compact('admin','procurement','sales'));
        }
        else{
            return view('admin.setup.completion');
        }
    }

    public function adminEdit (){
        $company_id = auth()->user()->company_id;
        $admin = CompanyUser::where('company_id',$company_id)->where('role',1)->first();
        $procurement = CompanyUser::where('company_id',$company_id)->where('role',2)->first();
        $sales = CompanyUser::where('company_id',$company_id)->where('role',3)->first();
        return view('admin.setup.edit-admin',compact('admin','procurement','sales'));
    }

    public function adminUpdate(Request $request,$id){
        $request->validate([
            'admin_name' => 'required|string|max:50',
            'admin_email' => 'required|email:rfc,dns|unique:company_users,email,'.$id,
            'admin_designation' => 'required|string|max:50',
            'admin_mobile' => 'nullable|different:landline,extension|digits_between:4,13|unique:company_users,mobile,'.$id,
            'admin_landline' => 'different:mobile,extension|nullable|digits_between:4,13|unique:company_users,landline',
            'admin_extension' => 'different:mobile,landline|nullable|digits_between:1,13',
        ]);

        $company_id = auth()->user()->company_id;
        $plaintext = Str::random(32);
        $companyuser = CompanyUser::find($id)->update([
            'name' => $request->admin_name,
            'mobile' => $request->admin_mobile,
            'landline' => $request->admin_landline,
            'extension' => $request->admin_extension,
            'designation' => $request->admin_designation,
            'email' => $request->admin_email,
            'token' => hash('sha256', $plaintext),
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function procurementCreate(){
        $company_id = auth()->user()->company_id;
        $admin = CompanyUser::where('company_id',$company_id)->where('role',1)->first();
        $procurement = CompanyUser::where('company_id',$company_id)->where('role',2)->first();
        $sales = CompanyUser::where('company_id',$company_id)->where('role',3)->first();
        return view('admin.setup.create-procurement',compact('admin','procurement','sales'));
    }

    public function salesCreate(){
        $company_id = auth()->user()->company_id;
        $admin = CompanyUser::where('company_id',$company_id)->where('role',1)->first();
        $procurement = CompanyUser::where('company_id',$company_id)->where('role',2)->first();
        $sales = CompanyUser::where('company_id',$company_id)->where('role',3)->first();
        return view('admin.setup.create-sales',compact('admin','procurement','sales'));
    }

    public function createUpdateUser(Request $request){
        $id = $request->user_id;

        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email:rfc,dns|unique:company_users,email,'.$id,
            'designation' => 'required|string|max:50',
            'mobile' => 'nullable|different:landline,extension|digits_between:4,13|unique:company_users,mobile,'.$id,
            'landline' => 'different:mobile,extension|nullable|digits_between:4,13|unique:company_users,landline',
            'extension' => 'different:mobile,landline|nullable|digits_between:1,13',
        ]);

        $company_id = auth()->user()->company_id;
        $plaintext = Str::random(32);

        $companyuser = CompanyUser::updateOrCreate([
            'company_id'   => $company_id,
            'role' => $request->role
        ],[
            'name' => $request->name,
            'country_code' => '+974',
            'mobile' => $request->mobile,
            'landline' => $request->landline,
            'extension' => $request->extension,
            'designation' => $request->designation,
            'email' => $request->email,
            'token' => hash('sha256', $plaintext),
        ]);

        if($companyuser->password == ''){

            $details = [
                'name' => $companyuser->name,
                'subject' => 'DialectB2B Registration Process.',
                'body' => '<p>We, Dialectb2b.com, are happy to let you know that,your organization successfully created account with us. Please complete your account training from the below link.</p>',
                'link' => url('onboarding/' . $companyuser->token),
            ];

            \Mail::to($companyuser->email)->send(new \App\Mail\CommonMail($details));
        }

        return redirect()->route('admin.dashboard');
    }

    

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function procurement(){
        echo "Procurement Home";
    }

    public function sales(){
        echo "Sales Home";
    }

}