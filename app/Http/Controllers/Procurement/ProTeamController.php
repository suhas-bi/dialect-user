<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Procurement\NewMemberRequest;
use App\Http\Resources\Procurement\BidInboxListResource;
use App\Http\Resources\Procurement\EnquiryResource;
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


class ProTeamController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
    }
    
    public function approval(){
        $company_id = auth()->user()->company_id;
        return view('procurement.approval.index');
    }

    public function fetchAllApprovalEnquiries(Request $request){
        $user = auth()->user();
        $query = Enquiry::where('verified_by',0)->where('is_draft',0); //->where('is_closed',0)
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
        $enquiries = $query->groupBy('reference_no')->latest()->get();
        return response()->json([ 
            'status' => true,
            'enquiries' => BidInboxListResource::collection($enquiries),
        ], 200);
    }

    public function approveQuote(Request $request){
        DB::beginTransaction();
        try{
            $company_id = auth()->user()->company_id;
            Enquiry::findOrFail($request->id)->update([
                'verified_by' => auth()->user()->id,
                'verified_at' => now()
            ]);

            $enquiry = Enquiry::findOrFail($request->id);
            DB::commit();
            return response()->json([
                'status' => true,
                'data' => $enquiry,
                'message' => 'Quote Approved!'
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    } 

    public function team(){
       $company_id = auth()->user()->company_id;
       $members = CompanyUser::where(['company_id' => $company_id,'role' => 4])->get();
       return view('procurement.team.index',compact('members'));
    }

    public function saveMember(NewMemberRequest $request){
      DB::beginTransaction();
        try{

            $plaintext = Str::random(32);

            $member = CompanyUser::create([
              'company_id' => auth()->user()->company_id,
              'name' => $request->name,
              'role' => 4,
              'designation' => 'Team Member',
              'email' => $request->email,
              'status' => 0,
              'approval_status' => $request->approval_status,
              'token' => hash('sha256', $plaintext)
            ]);

            if($member->password == ''){

                $details = [
                    'name' => $member->name,
                    'subject' => 'DialectB2B Registration Process.',
                    'body' => '<p>We, Dialectb2b.com, are happy to let you know that,your organization successfully created account with us. Please complete your account training from the below link.</p>',
                    'link' => url('onboarding/' . $member->token),
                ];
    
                \Mail::to($member->email)->send(new \App\Mail\CommonMail($details));
            }

            DB::commit();
            
            return response()->json([
                'status' => true,
                'message' => 'New member added!',
                'member' => $member
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function updateMember(Request $request){
        DB::beginTransaction();
        try{
            $member = CompanyUser::findOrFail($request->id)->update([
                'status' => $request->status,
                'approval_status' => $request->approval_status,
            ]);

            $member = CompanyUser::findOrFail($request->id);
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Member profile updated!',
                'member' => $member
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

