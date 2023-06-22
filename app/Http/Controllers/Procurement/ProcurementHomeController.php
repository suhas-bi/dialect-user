<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\Http\Resources\Procurement\BidInboxListResource;
use App\Http\Resources\Procurement\EnquiryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTP;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\Enquiry;
use DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ProcurementHomeController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }
    
    public function index(){
        $user = auth()->user();
        $user->update(['token'=>'']);
        $company_id = auth()->user()->company_id;
        return view('procurement.inbox.index');
    }

    public function fetchAllEnquiries(Request $request){
        $user = auth()->user();
        $query = Enquiry::with('replies')->verified()->where('from_id',$user->id)->where('is_draft',0); //->where('is_closed',0)
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
            $query->whereBetween('created_at',[Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]);
        }
        else if($request->mode_filter == 'by_month'){
            if(!is_null($request->second_filter)){
                $query->whereMonth('created_at', $request->second_filter)->whereYear('created_at', date('Y'));
            }
        }
        else if($request->mode_filter == 'by_year'){
            if(!is_null($request->second_filter)){
                $query->whereYear('created_at', $request->second_filter);
            }
        }
        $enquiries = $query->whereNull('parent_reference_no')->groupBy('reference_no')->latest()->get();
        return response()->json([
            'status' => true,
            'enquiries' => BidInboxListResource::collection($enquiries),
        ], 200);
    }

    public function fetchEnquiry(Request $request){
        $enquiry = Enquiry::with('replies')->findOrFail($request->id);
        return response()->json([
            'status' => true,
            'enquiry' => new EnquiryResource($enquiry),
        ], 200);
    }

}

