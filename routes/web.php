<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Initiator\{
    SignUpController,
    CompanyInfoController,
    BusinessCategoryController,
    DeclarationController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WebsiteController::class,'index']);

Route::get('/sign-up', [SignUpController::class,'index'])->name('sign-up');
Route::post('/sign-up/store', [SignUpController::class,'storeAndVerify'])->name('sign-up.store');
Route::get('/sign-up/verify', [SignUpController::class,'verify'])->name('sign-up.verify');
Route::post('/sign-up/resend-otp', [SignUpController::class,'resendOtp'])->name('sign-up.resend-otp');
Route::post('/sign-up/verify-otp', [SignUpController::class,'verifyOtp'])->name('sign-up.verify-otp');

Route::get('/sign-up/company-info', [CompanyInfoController::class,'index'])->name('sign-up.company-info');

Route::get('/sign-up/business-category',[BusinessCategoryController::class,'index'])->name('sign-up.business-category');

Route::get('/sign-up/declaration', [DeclarationController::class,'index'])->name('sign-up.declaration');

Route::get('/sign-up/declaration-edit', [DeclarationController::class,'edit'])->name('sign-up.edit');

Route::get('/sign-up/review-verification', [SignUpController::class,'review'])->name('sign-up.review-verification');