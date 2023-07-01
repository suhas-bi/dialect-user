<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\SendBidRequest;
use App\Http\Requests\Sales\AskFaqRequest;
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
use App\Models\EnquiryReply;
use App\Models\EnquiryFaq;
use App\Models\Enquiry;
use DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class SalesHomeController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }
    
    public function index(){
        $user = auth()->user();
        $user->update(['token'=>'']);
        $company_id = auth()->user()->company_id;
        return view('sales.received.index');
    }

    public function fetchAllEnquiries(Request $request){
        $user = auth()->user();
        $query = EnquiryRelation::with('enquiry','enquiry.sub_category','enquiry.sender.company','enquiry.all_faqs','enquiry.my_faqs')->where('to_id',$user->id); //->where('is_closed',0)
        if(!is_null($request->keyword)){
            $query->where('reference_no','like','%'.$request->keyword.'%');
            $query->orwhere('subject','like','%'.$request->keyword.'%');
        }
        if($request->mode_filter == 'today'){
            $query->whereDate('created_at', Carbon::today());
        }
        else if($request->mode_filter == 'yesterday'){
            $query->whereDate('created_at', Carbon::yesterday());
        }
        else if($request->mode_filter == 'last_week'){
            $query->whereBetween('created_at',[Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]);
        }
        else if($request->mode_filter == 'last_month'){
            $startOfMonth = now()->subMonth()->startOfMonth();
            $endOfMonth = now()->subMonth()->endOfMonth();
        
            $query->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
        }
        $enquiries = $query->notExpired()->notReplied()->latest()->get();
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

  public function saveQuestion(AskFaqRequest $request){
    DB::beginTransaction();
        try{
            $enquiry = Enquiry::findOrFail($request->enquiry_id);
            $faq = EnquiryFaq::create([
                'enquiry_id' => $request->enquiry_id,
                'reference_no' => $enquiry->reference_no,
                'question' => $request->question,
                'created_by' => auth()->user()->id,
                'status' => 0
            ]);

            $enquiry = EnquiryRelation::where(['enquiry_id' => $enquiry->id, 'to_id' => auth()->user()->id])->first();

            DB::commit();
            
            return response()->json([
                'status' => true,
                'message' => 'Question has been send',
                'enquiry' => $enquiry
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
  }

    public function sendBid(SendBidRequest $request){
        DB::beginTransaction();
        try{
            $enquiry = Enquiry::findOrFail($request->enquiry_id);
            $reply = EnquiryReply::create([
                'enquiry_id' => $enquiry->id,
                'from_id' => auth()->user()->id,	
                'body' => $request->body,	
                'type' => 2,	
                'status' => 0
            ]);
            EnquiryRelation::where(['enquiry_id' => $enquiry->id, 'to_id' => auth()->user()->id])
                             ->update(['is_replied' => 1]);
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Bid Send!'
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

