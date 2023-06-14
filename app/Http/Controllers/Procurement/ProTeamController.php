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
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ProTeamController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }
    
    public function approval(){
        $company_id = auth()->user()->company_id;
        return view('procurement.approval.index');
    }

    public function team(){
      $company_id = auth()->user()->company_id;
      return view('procurement.team.index');
  }

}

