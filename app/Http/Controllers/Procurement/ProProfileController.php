<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTP;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\CompanyDocument;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ProProfileController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }
    
    public function index(){
        $company_id = auth()->user()->company_id;
        $user = auth()->user();
        $company = Company::with('document')->find($company_id);
        return view('procurement.profile.index',compact('user','company'));
    }

}

