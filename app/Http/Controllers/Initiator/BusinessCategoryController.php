<?php

namespace App\Http\Controllers\Initiator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessCategoryController extends Controller
{
    public function index(){
        return view('initiator.business-category');
    }
}
