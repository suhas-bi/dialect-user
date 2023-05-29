<?php

namespace App\Http\Controllers\Initiator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Initiator\CompanyInfoRequest;
use App\Http\Requests\Initiator\DocumentUploadRequest;
use App\Http\Requests\Initiator\LogoUploadRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use App\Models\Company;
use App\Models\CompanyDocument;
use App\Models\CompanyLocation;
use App\Models\Region;
use App\Models\Document;
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
        $document = Document::where('country_id',$company->country_id)->first();
        $company_locations = CompanyLocation::where('company_id',$company->id)->pluck('region_id')->toArray();
        return view('initiator.company-info',compact('company','regions','document','company_locations'));
    }

    public function store(CompanyInfoRequest $request){
        $comp = Cache::get('company');
        if(!$comp){
            return redirect('/');
        }

        $company = Company::find($comp->id);
        $input = $request->validated();
        DB::beginTransaction();
        
        $docExists = CompanyDocument::where('doc_number',$input['document_no'])->where('company_id','!=',$company->id)->first();
        if($docExists){
            return response()->json([
                'status' => false,
                'type' => 'superseed',
                'message' => 'Document already exists!',
            ], 422);
        }

        try {
            
            $company->update([
                'address' => $input['address'],
                'zone' => $input['zone'],
                'street' => $input['street'],
                'building' => $input['building'],
                'unit' => $input['unit'],
                'pobox' => $input['pobox'],
                'fax' => $input['fax'],
                'domain' => $input['domain']
            ]);

            CompanyDocument::updateOrCreate([
                'company_id'   => $company->id,
            ],[
                'doc_type' => 1,
                'expiry_date' => $input['expiry_date'],
                'doc_number' => $input['document_no']
            ]);

            $company_locations = CompanyLocation::where('company_id',$company->id)->exists();
            if($company_locations == true){
                CompanyLocation::where('company_id',$company->id)->delete();
            }

            foreach($request->region_id as $key => $region){
                CompanyLocation::create([
                    'company_id' => $company->id,
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

    public function uploadDocument(DocumentUploadRequest $request){
        $comp = Cache::get('company');
        if(!$comp){
            return redirect('/');
        }

        DB::beginTransaction();
        try{
            $company = Company::find($comp->id);
            $document = Document::where('country_id',$company->country_id)->first();
            $folder = 'uploads/company/'.$company->id;
            if ($request->hasFile('document_file')) {
                $document = $request->file('document_file');
                $originalName = $document->getClientOriginalName();
                $fileName = 'company_document.' . $document->getClientOriginalExtension();
                $filePath = $document->storeAs($folder, $fileName);
            }
            $document = CompanyDocument::updateOrCreate([
                'company_id'   => $company->id,
            ],[
                'doc_name' => $originalName,
                'doc_type' => 1,
                'doc_file' => $filePath,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'data' => $document,
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

    public function deleteDocument(Request $request){
        $comp = Cache::get('company');
        if(!$comp){
            return redirect('/');
        }

        DB::beginTransaction();
        try{
            $company = Company::find($comp->id);
            $document = Document::where('country_id',$company->country_id)->first();
            $folder = 'uploads/company/'.$company->id;
            if ($request->hasFile('document_file')) {
                $document = $request->file('document_file');
                $fileName = 'company_document.' . $document->getClientOriginalExtension();
                $filePath = $document->storeAs($folder, $fileName);
            }
            $document = CompanyDocument::updateOrCreate([
                'company_id'   => $company->id,
            ],[
                'doc_type' => $document->id,
                'doc_file' => '',
            ]);

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

    public function uploadLogo(LogoUploadRequest $request){
        $comp = Cache::get('company');
        if(!$comp){
            return redirect('/');
        }

        DB::beginTransaction();
        try{
            $company = Company::find($comp->id);
            $folder = 'uploads/company/'.$company->id;
            if ($request->hasFile('logo_file')) {
                $logo = $request->file('logo_file');
                $originalName = $logo->getClientOriginalName();
                $fileName = 'company_logo.' . $logo->getClientOriginalExtension();
                $filePath = $logo->storeAs($folder, $fileName);
            }
            
            $company->update(['logo' => $filePath]);

            DB::commit();

            return response()->json([
                'status' => true,
                'data' => $company,
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
