<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
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


class MemberEventController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }
    
    public function index(){
        $company_id = auth()->user()->company_id;
        return view('member.event.index');
    }

}

