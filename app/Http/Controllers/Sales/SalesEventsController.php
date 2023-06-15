<?php

namespace App\Http\Controllers\Sales;

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


class SalesEventsController extends Controller
{
    public function __construct() 
    {
      //$this->middleware('auth');
    }
    
    public function index(){
        // $user = auth()->user();
        // $user->update(['token'=>'']);
        // $company_id = auth()->user()->company_id;
        return view('sales.events.index');
    }

}

