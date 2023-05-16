<?php

namespace App\Http\Controllers\Initiator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Initiator\CompanyInfoRequest;
use Illuminate\Support\Facades\Cache;
use App\Models\Company;
use App\Models\Region;
use App\Models\CompanyDocument;
use App\Models\CompanyLocation;
use App\Models\CompanyActivity;
use DB;

class DeclarationController extends Controller
{
    public function index(){
        $comp = Cache::get('company');
        if(!$comp){
            return redirect('/');
        }

        $companyActivities = CompanyActivity::where('company_id',$comp->id)->count();
        if($companyActivities == 0){
            return redirect()->route('sign-up.business-category')->with('warning','At least select one category to proceed!');
        }

        $company = Company::find($comp->id);
        return view('initiator.declaration',compact('company'));
    }

    public function edit(){
        $comp = Cache::get('company');
        if(!$comp){
            return redirect('/');
        }

        $company = Company::find($comp->id);
        $regions = Region::where('country_id',$comp->country_id)->get();
        return view('initiator.sign-up-edit',compact('company','regions'));
    }

    public function update(CompanyInfoRequest $request){
        $comp = Cache::get('company');
        if(!$comp){
            return redirect('/');
        }

        $input = $request->validated();

        DB::beginTransaction();

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
                'message' => 'Success!'
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
