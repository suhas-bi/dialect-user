<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Initiator\SignUpRequest;
use App\Http\Resources\Sales\ReceivedListResource;
use App\Http\Resources\Sales\EnquiryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTP;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\EnquiryRelation;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class SalesExpiredEnquiryController extends Controller
{
    public function __construct() 
    {
      //$this->middleware('auth');
    }
    
    public function index(){
        return view('sales.expired.index');
    }

    public function fetchAllEnquiries(Request $request){
      $user = auth()->user();
      $query = EnquiryRelation::with('enquiry','enquiry.sub_category','enquiry.sender.company','enquiry.all_faqs','enquiry.my_faqs')->where('to_id',$user->id); //->where('is_closed',0)
          $query->whereHas('enquiry', function ($query) use ($request){
              if(!is_null($request->keyword)){
                  $query->where('enquiries.reference_no','like','%'.$request->keyword.'%');
                  $query->orwhere('enquiries.subject','like','%'.$request->keyword.'%');
              }
              if($request->mode_filter == 'today'){
                  $query->whereDate('enquiries.created_at', Carbon::today());
              }
              else if($request->mode_filter == 'yesterday'){
                  $query->whereDate('enquiries.created_at', Carbon::yesterday());
              }
              else if($request->mode_filter == 'last_week'){
                  $query->whereBetween('enquiries.created_at',[Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]);
              }
              else if($request->mode_filter == 'last_month'){
                  $startOfMonth = now()->subMonth()->startOfMonth();
                  $endOfMonth = now()->subMonth()->endOfMonth();
              
                  $query->whereBetween('enquiries.created_at', [$startOfMonth, $endOfMonth]);
              }
          });
        $enquiries = $query->expired()->latest()->get();
        return response()->json([
            'status' => true,
            'enquiries' => ReceivedListResource::collection($enquiries),
        ], 200);
  }

  public function fetchEnquiry(Request $request){
    $enquiry = EnquiryRelation::with('enquiry','enquiry.attachments','enquiry.sender','enquiry.sender.company')->findOrFail($request->id);
    return response()->json([
        'status' => true,
        'enquiry' => new EnquiryResource($enquiry),
    ], 200);
}


}

