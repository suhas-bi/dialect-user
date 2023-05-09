<?php

namespace App\Http\Controllers\Initiator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeclarationController extends Controller
{
    public function index(){
        return view('initiator.declaration');
    }

    public function edit(){
        return view('initiator.sign-up-edit');
    }
}
