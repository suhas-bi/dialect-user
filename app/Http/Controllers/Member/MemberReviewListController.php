<?php

namespace App\Http\Controllers\Member;

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


class MemberReviewListController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }
    
    public function send(){
        $company_id = auth()->user()->company_id;
        return view('member.reviewlist.send.index');
    }

    public function received(){
      $company_id = auth()->user()->company_id;
      return view('member.reviewlist.received.index');
    }

}

