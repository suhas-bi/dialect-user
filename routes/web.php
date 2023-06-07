<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Initiator\{
    SignUpController,
    CompanyInfoController,
    BusinessCategoryController,
    DeclarationController,
    ReRegistrationController
};

use App\Http\Controllers\LoginController;

use App\Http\Controllers\Admin\{
    AdminHomeController,
};

use App\Http\Controllers\Procurement\{
    ProcurementHomeController,
    ReviewListController,
    ProDraftController,
    ProCompletedBiddingController,
    ProTeamController,
    ProEventController,
};

use App\Http\Controllers\Sales\{
    SalesHomeController,
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
Route::post('/sign-up/company-info/store', [CompanyInfoController::class,'store'])->name('sign-up.company-info.store');

Route::post('/sign-up/company-info/upload-document', [CompanyInfoController::class,'uploadDocument'])->name('sign-up.company-info.uploadDocument');
Route::post('/sign-up/company-info/delete-document', [CompanyInfoController::class,'deleteDocument'])->name('sign-up.company-info.deleteDocument');

Route::post('/sign-up/company-info/upload-logo', [CompanyInfoController::class,'uploadLogo'])->name('sign-up.company-info.uploadLogo');

Route::get('/sign-up/business-category',[BusinessCategoryController::class,'index'])->name('sign-up.business-category');
Route::post('/sign-up/business-category',[BusinessCategoryController::class,'search'])->name('sign-up.business-category.search');
Route::post('/sign-up/business-category/alpha',[BusinessCategoryController::class,'alpha'])->name('sign-up.business-category.alpha');
Route::post('/sign-up/business-category/subcategory', [BusinessCategoryController::class,'getSubcategories'])->name('sign-up.business-category.subcategory');
Route::post('/sign-up/business-category/selected', [BusinessCategoryController::class,'selectedSubcategories'])->name('sign-up.business-category.selected');
Route::delete('/sign-up/business-category/delete/{id}', [BusinessCategoryController::class,'deleteSelected'])->name('sign-up.business-category.delete');
Route::post('/sign-up/business-category/add', [BusinessCategoryController::class,'addActivity'])->name('sign-up.business-category.add');
 
Route::get('/sign-up/declaration', [DeclarationController::class,'index'])->name('sign-up.declaration');
Route::get('/sign-up/download-declaration', [DeclarationController::class,'download'])->name('sign-up.declaration.download');
Route::post('/sign-up/declaration/upload', [DeclarationController::class,'upload'])->name('sign-up.declaration.upload');
Route::post('/sign-up/declaration/delete', [DeclarationController::class,'delete'])->name('sign-up.declaration.delete');

Route::get('/sign-up/registration-edit', [DeclarationController::class,'edit'])->name('sign-up.edit');
Route::post('/sign-up/registration-edit', [DeclarationController::class,'update'])->name('sign-up.update');

Route::get('onboarding/{token}',  [SignUpController::class,'onboarding'])->name('onboarding');
Route::post('registration',  [SignUpController::class,'setPassword'])->name('registration.setPassword');

Route::get('/sign-up/review-verification', [SignUpController::class,'review'])->name('sign-up.review-verification');

// Common
Route::post('get-document',  [SignUpController::class,'getDocumentByCountry'])->name('getDocumentByCountry');
Route::post('get-region',  [SignUpController::class,'getRegionByCountry'])->name('getRegionByCountry');


// Re Registration 
Route::get('registration/{token}',  [ReRegistrationController::class,'registrationProcess'])->name('registration');
Route::get('/register/verify', [ReRegistrationController::class,'verify'])->name('registration.reVerify');
Route::post('/register/verify-otp', [ReRegistrationController::class,'verifyOtp'])->name('registration.verify-otp');

// Administrator
Route::get('/admin/dashboard', [AdminHomeController::class,'index'])->name('admin.dashboard');


Route::get('/admin/edit-admin', [AdminHomeController::class,'adminEdit'])->name('admin.adminEdit');
Route::post('/admin/update-admin/{id}', [AdminHomeController::class,'adminUpdate'])->name('admin.adminUpdate');

Route::get('/admin/create-procurement', [AdminHomeController::class,'procurementCreate'])->name('admin.procurementCreate');
Route::get('/admin/create-sales', [AdminHomeController::class,'salesCreate'])->name('admin.salesCreate');
Route::post('/admin/update-user', [AdminHomeController::class,'createUpdateUser'])->name('admin.createUpdateUser');

Route::get('/logout', [AdminHomeController::class,'logout'])->name('logout');

Route::post('/login', [LoginController::class,'login'])->name('login');
Route::get('/login', function(){
    return redirect('/');
});


// Procurement Start 
Route::get('/procurement/dashboard', [ProcurementHomeController::class,'index'])->name('procurement.dashboard');
Route::get('/procurement/review-list', [ReviewListController::class,'index'])->name('procurement.reviewList');
Route::get('/procurement/draft', [ProDraftController::class,'index'])->name('procurement.draft');
Route::get('/procurement/completed-bidding', [ProCompletedBiddingController::class,'index'])->name('procurement.completedBidding');
Route::get('/procurement/team-account', [ProTeamController::class,'index'])->name('procurement.teamAccount');
Route::get('/procurement/upcoming-events', [ProEventController::class,'index'])->name('procurement.upcomingEvents');


// Procurement Ends

// Sales Starts
Route::get('/sales/dashboard', [SalesHomeController::class,'index'])->name('sales.dashboard');

// Sales Ends

