<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Resources\Member\BidInboxListResource;
use App\Http\Resources\Member\EnquiryResource;
use App\Http\Requests\Member\AnswerFaqRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTP;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\Enquiry;
use App\Models\EnquiryFaq;
use DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class MemberHomeController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }
    
    public function index(){
        $user = auth()->user();
        $user->update(['token'=>'']);
        $company_id = auth()->user()->company_id;
        return view('member.inbox.index');
    }

    public function fetchAllEnquiries(Request $request){
        $user = auth()->user();
        $query = Enquiry::with('replies')->verified()->where('from_id',$user->id)->where('is_draft',0); //->where('is_closed',0)
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
        $enquiries = $query->whereNull('parent_reference_no')->groupBy('reference_no')->latest()->get();
        return response()->json([
            'status' => true,
            'enquiries' => BidInboxListResource::collection($enquiries),
        ], 200);
    }

    public function fetchEnquiry(Request $request){
        $enquiry = Enquiry::with('replies','sender','sender.company')->findOrFail($request->id);
        return response()->json([
            'status' => true,
            'enquiry' => new EnquiryResource($enquiry),
        ], 200);
    }

    public function skipFaq(Request $request){
        DB::beginTransaction();
        try{
            EnquiryFaq::findOrFail($request->id)->update([
                 'status' => 2
            ]);

            $faq = EnquiryFaq::findOrFail($request->id);
            DB::commit();
            
            return response()->json([
                'status' => true,
                'message' => 'Question has been skipped',
                'faq' => $faq
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function answerFaq(AnswerFaqRequest $request){
        DB::beginTransaction();
        try{
            EnquiryFaq::findOrFail($request->id)->update([
                'answer' => $request->answer,
                'answered_at' => now(),
                'status' => 1
            ]);

            $faq = EnquiryFaq::findOrFail($request->id);
            DB::commit();
            
            return response()->json([
                'status' => true,
                'message' => 'Question has been skipped',
                'faq' => $faq
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
