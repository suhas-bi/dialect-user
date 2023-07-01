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
    AdminHomeController
};

use App\Http\Controllers\Procurement\{
    ProcurementHomeController,
    ProQuoteController,
    ReviewListController,
    ProDraftController,
    ProCompletedBiddingController,
    ProTeamController,
    ProEventController,
    ProProfileController
};

use App\Http\Controllers\Sales\{
    SalesHomeController,
    SalesRepliedEnquiryController,
    SalesExpiredEnquiryController,
    SalesDraftController,
    SalesEventsController,
    SalesProfileController
};

use App\Http\Controllers\Auth\{
    ForgotPasswordController,
    ResetPasswordController
};

use App\Http\Controllers\Member\{
    MemberHomeController,
    MemberQuoteController,
    MemberDraftController,
    MemberReviewListController,
    MemberCompletedBiddingController,
    MemberEventController
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

/*****************************************  Administrator Start **************************************/ 
Route::get('/admin/dashboard', [AdminHomeController::class,'index'])->name('admin.dashboard');


Route::get('/admin/edit-admin', [AdminHomeController::class,'adminEdit'])->name('admin.adminEdit');
Route::post('/admin/update-admin/{id}', [AdminHomeController::class,'adminUpdate'])->name('admin.adminUpdate');

Route::get('/admin/create-procurement', [AdminHomeController::class,'procurementCreate'])->name('admin.procurementCreate');
Route::get('/admin/create-sales', [AdminHomeController::class,'salesCreate'])->name('admin.salesCreate');
Route::post('/admin/update-user', [AdminHomeController::class,'createUpdateUser'])->name('admin.createUpdateUser');


/*****************************************  Administrator Start **************************************/ 


Route::get('/logout', [AdminHomeController::class,'logout'])->name('logout');

Route::post('/login', [LoginController::class,'login'])->name('login');
Route::get('/login', function(){
    return redirect('/');
});

Route::get('/forgot-password', [ForgotPasswordController::class,'showForgotPasswordForm'])->name('password.forgot');
Route::post('/forgot-password', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class,'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class,'resetPassword'])->name('password.update');




/*****************************************  Procurement Start **************************************/ 

Route::group(['middleware' => 'check.role:2'],function() {

// Generate Quote Request
    Route::get('/procurement/quote/select-category', [ProQuoteController::class,'selectCategory'])->name('procurement.quote.selectCategory');
    Route::get('/procurement/quote/change-category/{id}', [ProQuoteController::class,'changeCategory'])->name('procurement.quote.changeCategory');
    Route::post('/procurement/quote/save-category', [ProQuoteController::class,'saveCategory'])->name('procurement.quote.saveCategory');
    Route::post('/procurement/quote/update-category', [ProQuoteController::class,'updateCategory'])->name('procurement.quote.updateCategory');
    Route::get('/procurement/quote/compose/{id}', [ProQuoteController::class,'compose'])->name('procurement.quote.compose');
    Route::post('/procurement/quote/compose/upload-attachment', [ProQuoteController::class,'uploadAttachment'])->name('procurement.quote.uploadAttachment');
    Route::post('/procurement/quote/compose/fetch-attachment', [ProQuoteController::class,'getEnquiryAttachments'])->name('procurement.getEnquiryAttachments');
    Route::post('/procurement/quote/compose/attchments/delete', [ProQuoteController::class,'deleteAttachments'])->name('procurement.quote.deleteAttachments');
    Route::post('/procurement/quote/compose/save-as-draft', [ProQuoteController::class,'saveAsDraft'])->name('procurement.quote.saveAsDraft');
    Route::post('/procurement/quote/compose/generate-quote', [ProQuoteController::class,'generateQuote'])->name('procurement.quote.generateQuote');
    Route::post('/procurement/quote/compose/edit-accepted-till', [ProQuoteController::class,'editAcceptedDate'])->name('procurement.quote.editAcceptedDate');

    Route::post('/procurement/report', [ProcurementHomeController::class,'report'])->name('procurement.report');
    
// Inbox
    Route::any('/procurement/dashboard', [ProcurementHomeController::class,'index'])->name('procurement.dashboard');
    Route::any('/procurement/fetch-all-enquiries', [ProcurementHomeController::class,'fetchAllEnquiries'])->name('procurement.fetchAllEnquiries');
    Route::any('/procurement/fetch-enquiry', [ProcurementHomeController::class,'fetchEnquiry'])->name('procurement.fetchEnquiry');
    Route::any('/procurement/skip-faq', [ProcurementHomeController::class,'skipFaq'])->name('procurement.skipFaq');
    Route::any('/procurement/answer-faq', [ProcurementHomeController::class,'answerFaq'])->name('procurement.answerFaq');
    Route::post('/procurement/read-reply',[ProcurementHomeController::class,'readReply'])->name('procurement.readReply');
    Route::post('/procurement/shortlist',[ProcurementHomeController::class,'shortlist'])->name('procurement.shortlist');
    Route::post('/procurement/hold',[ProcurementHomeController::class,'hold'])->name('procurement.hold');
// Review List Start
    Route::get('/procurement/review-list/send', [ReviewListController::class,'send'])->name('procurement.reviewList.send');
    Route::get('/procurement/review-list/received', [ReviewListController::class,'received'])->name('procurement.reviewList.received');

// Review List End


// Draft Starts
    Route::get('/procurement/draft', [ProDraftController::class,'index'])->name('procurement.draft');
    Route::post('/procurement/open-draft', [ProDraftController::class,'openDraft'])->name('procurement.openDraft');
    Route::post('/procurement/discard-draft', [ProDraftController::class,'discardDraft'])->name('procurement.discardDraft');
// Draft Ends

// Completed Bidding Starts
    Route::get('/procurement/completed-bidding', [ProCompletedBiddingController::class,'index'])->name('procurement.completedBidding');
// Completed Bidding Ends

// Team Settings & Approvals Start
    Route::get('/procurement/team-account/approval', [ProTeamController::class,'approval'])->name('procurement.teamAccount.approval');
    Route::get('/procurement/team-account/settings', [ProTeamController::class,'team'])->name('procurement.teamAccount.settings');
    Route::post('/procurement/team-account/save-member', [ProTeamController::class,'saveMember'])->name('procurement.teamAccount.saveMember');
    Route::post('/procurement/team-account/update-member', [ProTeamController::class,'updateMember'])->name('procurement.teamAccount.updateMember');
    Route::post('/procurement/team-account/approval/all', [ProTeamController::class,'fetchAllApprovalEnquiries'])->name('procurement.teamAccount.fetchAllApprovalEnquiries');
    Route::post('/procurement/team-account/approve-quote', [ProTeamController::class,'approveQuote'])->name('procurement.teamAccount.approveQuote');
// Team Settings & Approvals End

// Upcoming Events Starts
    Route::get('/procurement/upcoming-events', [ProEventController::class,'index'])->name('procurement.upcomingEvents');
// Upcoming Events Ends

// Profile Starts
    Route::get('/procurement/profile', [ProProfileController::class,'index'])->name('procurement.profile');
// Profile Ends

});
/*****************************************  Procurement Ends **************************************/ 




/*****************************************  Sales Starts ******************************************/

Route::group(['middleware' => 'check.role:3'],function() {

// Received List Starts
    Route::get('/sales/dashboard', [SalesHomeController::class,'index'])->name('sales.dashboard');
    Route::any('/sales/fetch-all-enquiries', [SalesHomeController::class,'fetchAllEnquiries'])->name('sales.fetchAllEnquiries');
    Route::any('/sales/fetch-enquiry', [SalesHomeController::class,'fetchEnquiry'])->name('sales.fetchEnquiry');
    Route::any('/sales/save-question', [SalesHomeController::class,'saveQuestion'])->name('sales.saveQuestion');
    Route::post('/sales/send-bid', [SalesHomeController::class,'sendBid'])->name('sales.sendBid');
// Received List Ends

//Replied Enquiries Starts
    Route::get('/sales/replied-enquiry', [SalesRepliedEnquiryController::class,'index'])->name('sales.repliedEnquiry');
    Route::post('/sales/replied/fetch-all-enquiries', [SalesRepliedEnquiryController::class,'fetchAllEnquiries'])->name('sales.replied.fetchAllEnquiries');
    Route::post('/sales/replied/fetch-enquiry', [SalesRepliedEnquiryController::class,'fetchEnquiry'])->name('sales.replied.fetchEnquiry');
//Replied Enquiries Ends

//Expired Enquiries Starts
    Route::get('/sales/expired-enquiry', [SalesExpiredEnquiryController::class,'index'])->name('sales.expiredEnquiry');
    Route::post('/sales/expired/fetch-all-enquiries', [SalesExpiredEnquiryController::class,'fetchAllEnquiries'])->name('sales.expired.fetchAllEnquiries');
    Route::post('/sales/expired/fetch-enquiry', [SalesExpiredEnquiryController::class,'fetchEnquiry'])->name('sales.expired.fetchEnquiry');
//Expired Enquiries Ends

//Draft Starts
    Route::get('/sales/draft', [SalesDraftController::class,'index'])->name('sales.draft');
//Draft Ends

//Upcoming Events Starts
    Route::get('/sales/upcoming-events', [SalesEventsController::class,'index'])->name('sales.events');
//Upcoming Events Ends

// Profile Starts
    Route::get('/sales/profile', [SalesProfileController::class,'index'])->name('sales.profile');
// Profile Ends

});

/*****************************************  Sales Ends ******************************************/

/************************************** Member Starts **************************************/

Route::group(['middleware' => 'check.role:4'],function() {
// Bid Inbox Starts
    Route::get('/member/dashboard', [MemberHomeController::class,'index'])->name('member.dashboard');
    Route::any('/member/fetch-all-enquiries', [MemberHomeController::class,'fetchAllEnquiries'])->name('member.fetchAllEnquiries');
    Route::any('/member/fetch-enquiry', [MemberHomeController::class,'fetchEnquiry'])->name('member.fetchEnquiry');
    Route::any('/member/skip-faq', [MemberHomeController::class,'skipFaq'])->name('member.skipFaq');
    Route::any('/member/answer-faq', [MemberHomeController::class,'answerFaq'])->name('member.answerFaq');
    Route::post('/member/read-reply',[MemberHomeController::class,'readReply'])->name('member.readReply');
    Route::post('/member/shortlist',[MemberHomeController::class,'shortlist'])->name('member.shortlist');
    Route::post('/member/hold',[MemberHomeController::class,'hold'])->name('member.hold');

    Route::post('/member/report', [MemberHomeController::class,'report'])->name('member.report');
// Bid Inboc Ends

// Generate Quote Request Starts
    Route::get('/member/quote/select-category', [MemberQuoteController::class,'selectCategory'])->name('member.quote.selectCategory');
    Route::get('/member/quote/change-category/{id}', [MemberQuoteController::class,'changeCategory'])->name('member.quote.changeCategory');
    Route::post('/member/quote/save-category', [MemberQuoteController::class,'saveCategory'])->name('member.quote.saveCategory');
    Route::post('/member/quote/update-category', [MemberQuoteController::class,'updateCategory'])->name('member.quote.updateCategory');
    Route::get('/member/quote/compose/{id}', [MemberQuoteController::class,'compose'])->name('member.quote.compose');
    Route::post('/member/quote/compose/upload-attachment', [MemberQuoteController::class,'uploadAttachment'])->name('member.quote.uploadAttachment');
    Route::post('/member/quote/compose/fetch-attachment', [MemberQuoteController::class,'getEnquiryAttachments'])->name('member.getEnquiryAttachments');
    Route::post('/member/quote/compose/attchments/delete', [MemberQuoteController::class,'deleteAttachments'])->name('member.quote.deleteAttachments');
    Route::post('/member/quote/compose/save-as-draft', [MemberQuoteController::class,'saveAsDraft'])->name('member.quote.saveAsDraft');
    Route::post('/member/quote/compose/generate-quote', [MemberQuoteController::class,'generateQuote'])->name('member.quote.generateQuote');
    Route::post('/member/quote/compose/edit-accepted-till', [MemberQuoteController::class,'editAcceptedDate'])->name('member.quote.editAcceptedDate');
// Generate Quote Request Ends

// Draft Starts
    Route::get('/member/draft', [MemberDraftController::class,'index'])->name('member.draft');
    Route::post('/member/open-draft', [MemberDraftController::class,'openDraft'])->name('member.openDraft');
    Route::post('/member/discard-draft', [MemberDraftController::class,'discardDraft'])->name('member.discardDraft');
// Draft Ends

// Review List Start
    Route::get('/member/review-list/send', [MemberReviewListController::class,'send'])->name('member.reviewList.send');
    Route::get('/member/review-list/received', [MemberReviewListController::class,'received'])->name('member.reviewList.received');
// Review List Ends

// Completed Bidding Starts
    Route::get('/member/completed-bidding', [MemberCompletedBiddingController::class,'index'])->name('member.completedBidding');
// Completed Bidding ENds

// Upcoming Events Starts
    Route::get('/member/upcoming-events', [MemberEventController::class,'index'])->name('member.upcomingEvents');
// Upcoming Events Ends

// Profile Starts
Route::get('/member/profile', [MemberProfileController::class,'index'])->name('member.profile');
// Profile Ends


});
/************************************** Member Ends **************************************/