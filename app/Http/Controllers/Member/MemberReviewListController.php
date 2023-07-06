<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Resources\Member\BidInboxListResource;
use App\Http\Resources\Member\EnquiryResource;
use App\Http\Requests\Member\AnswerFaqRequest;
use App\Http\Requests\Member\HoldRequest;
use App\Http\Requests\Member\ShareRequest;
use App\Http\Requests\Member\ShareRecallRequest;
use App\Http\Resources\Member\EnquiryReplyResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTP;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\Enquiry;
use App\Models\ShareRecallHistory;
use DB;
use Auth;
use Carbon\Carbon;
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

  public function fetchAllSendEnquiries(Request $request){
    $user = auth()->user();
    $query = Enquiry::with('all_replies')->verified()->where('from_id',$user->id)->where('is_draft',0); //->where('is_closed',0)
    if(!is_null($request->keyword)){
        $query->where('reference_no','like','%'.$request->keyword.'%');
        $query->orwhere('subject','like','%'.$request->keyword.'%');
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
    
        $query->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
    }
    $enquiries = $query->shared()->notCompleted()->latest()->get();
    return response()->json([
        'status' => true,
        'enquiries' => BidInboxListResource::collection($enquiries),
    ], 200);
}

public function fetchEnquiry(Request $request){
  $enquiry = Enquiry::with('all_replies','sender','sender.company')->findOrFail($request->id);
  return response()->json([
      'status' => true,
      'enquiry' => new EnquiryResource($enquiry),
  ], 200);
}

  public function received(){
    $company_id = auth()->user()->company_id;
    return view('member.reviewlist.received.index');
  }

  public function fetchAllReceivedEnquiries(Request $request){
    $user = auth()->user();
    $query = Enquiry::with('all_replies')->verified()->where('shared_to',$user->id)->where('is_draft',0); //->where('is_closed',0)
    if(!is_null($request->keyword)){
        $query->where('reference_no','like','%'.$request->keyword.'%');
        $query->orwhere('subject','like','%'.$request->keyword.'%');
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
    
        $query->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
    }
    $enquiries = $query->shared()->notCompleted()->latest()->get();
    return response()->json([
        'status' => true,
        'enquiries' => BidInboxListResource::collection($enquiries),
    ], 200);
}

  public function markAsCompleted(Request $request){
      DB::beginTransaction();
      try{
          Enquiry::findOrFail($request->id)->update(['is_completed' => 1]);
          DB::commit();
          
          return response()->json([
              'status' => true,
              'message' => 'Marked as completed',
          ], 200);
      } catch (\Exception $e) {
          DB::rollback();
          return response()->json([
              'status' => false,
              'message' => $e->getMessage()
          ], 500);
      }
  }

  public function recallShare(ShareRecallRequest $request){
      DB::beginTransaction();
      try{
          $enquiry = Enquiry::findOrFail($request->enquiry_id);
          ShareRecallHistory::create([
              'enquiry_id' => $enquiry->id,
              'company_user_id' => $enquiry->shared_to,
              'comments' => $request->comments
          ]);
          $enquiry->update([
              'shared_to' => null,
              'shared_at' => null,
              'share_priority' => null
          ]);
          DB::commit();
          
          return response()->json([
              'status' => true,
              'message' => 'Share recalled!',
          ], 200);
      } catch (\Exception $e) {
          DB::rollback();
          return response()->json([
              'status' => false,
              'message' => $e->getMessage()
          ], 500);
      }
  }

}

