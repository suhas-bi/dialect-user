<?php

namespace App\Http\Controllers\Initiator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Initiator\SignUpRequest;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function index(){
        return view('initiator.sign-up');
    }

    public function storeAndVerify(SignUpRequest $request){
        dd($request);
    }

    public function verify(){
        return view('initiator.sign-up-otp');
    }

    public function review(){
        return view('initiator.review-verification');
    }
}
