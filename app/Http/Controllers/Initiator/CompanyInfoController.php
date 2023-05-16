<?php

namespace App\Http\Controllers\Initiator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Initiator\CompanyInfoRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use App\Models\Company;
use App\Models\CompanyDocument;
use App\Models\CompanyLocation;
use App\Models\Region;
use DB;

class CompanyInfoController extends Controller
{
    public function index(){
        $comp = Cache::get('company');
        if(!$comp){
            return redirect('/');
        }

        $regions = Region::where('country_id',$comp->country_id)->get();
        $company = Company::find($comp->id);
        return view('initiator.company-info',compact('company','regions'));
    }

    public function store(CompanyInfoRequest $request){
        $comp = Cache::get('company');
        if(!$comp){
            return redirect('/');
        }

        $input = $request->validated();

        DB::beginTransaction();

        $docExists = CompanyDocument::where('doc_number',$input['document_no'])->where('company_id','!=',$comp->id)->first();
        if($docExists){
            return response()->json([
                'status' => false,
                'type' => 'superseed',
                'message' => 'Document already exists!',
            ], 422);
        }

        try {

            Company::find($comp->id)->update([
                'address' => $input['address'],
                'zone' => $input['zone'],
                'street' => $input['street'],
                'building' => $input['building'],
                'unit' => $input['unit'],
                'pobox' => $input['pobox'],
                'fax' => $input['fax'],
                'domain' => $input['domain'],
            ]);

            CompanyDocument::updateOrCreate([
                'company_id'   => $comp->id,
            ],[
                'doc_type' => 1,
                'doc_file' => '123.pdf',
                'expiry_date' => $input['expiry_date'],
                'doc_number' => $input['document_no']
            ]);

            $company_locations = CompanyLocation::where('company_id',$comp->id)->exists();
            if($company_locations == true){
                CompanyLocation::where('company_id',$comp->id)->delete();
            }

            foreach($request->region_id as $key => $region){
                CompanyLocation::create([
                    'company_id' => $comp->id,
                    'region_id' => $region
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Success!',
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
