<?php

namespace App\Http\Controllers\Initiator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Initiator\CompanyInfoRequest;
use App\Http\Requests\Initiator\DeclarationUploadRequest;
use App\Models\Company;
use App\Models\Region;
use App\Models\Document;
use App\Models\Country;
use App\Models\CompanyDocument;
use App\Models\CompanyLocation;
use App\Models\CompanyActivity;
use App\Models\RegistrationToken;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use PDF;
use Mail;

class DeclarationController extends Controller
{
    public function index(){
        //$comp = Cache::get('company');
        $comp = session('company');
        if(!$comp){
            return redirect('/');
        }

        $companyActivities = CompanyActivity::where('company_id',$comp->id)->count();
        if($companyActivities == 0){
            return redirect()->route('sign-up.business-category')->with('warning','At least select one category to proceed!');
        }

        $company = Company::find($comp->id);
        $companyActivities = CompanyActivity::where('company_id',$comp->id)->get();
        $token = RegistrationToken::where('company_id',$company->id)->first();
        $html = '';
        foreach($company->activities as $key => $activity){
            $html.='<li>'.$activity->name ?? ''.'</li>';
        }
        $details = [
            'name' =>  $company->name ?? 'User',
            'subject'	=>'DialectB2B Registration Process.',
            'body' => "<div><p>We're excited to tell you that you've successfully selected the following business categories at Dialectb2b.com: </p><div><ul>".$html."</ul><br><p>To proceed with the registration please follow the link below.</p></div></div>",
            'link'	=> url('registration/'.$token->token),
        ];
        
        \Mail::to($company->email)->send(new \App\Mail\CommonMail($details));

        $company = Company::with('activities','document')->find($comp->id);
        return view('initiator.declaration',compact('company'));
    }

    public function edit(){
        //$comp = Cache::get('company');
        $comp = session('company');
        if(!$comp){
            return redirect('/');
        }

        $countries = Country::where('status',1)->get();
        $company = Company::find($comp->id);
        $regions = Region::where('country_id',$comp->country_id)->get();
        $document = Document::where('country_id',$company->country_id)->first();
        $company_locations = CompanyLocation::where('company_id',$company->id)->pluck('region_id')->toArray();
        $companyActivities = CompanyActivity::with('subcategory')->where('company_id',$comp->id)->get();
        return view('initiator.sign-up-edit',compact('company','regions','company_locations','companyActivities','document','countries'));
    }

    public function update(CompanyInfoRequest $request){
        //$comp = Cache::get('company');
        $comp = session('company');
        if(!$comp){
            return redirect('/');
        }

        $input = $request->validated();

        DB::beginTransaction();

        try {

            Company::find($comp->id)->update([
                'name' => $input['name'],
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

    public function download(Request $request){
        //$comp = Cache::get('company');
        $comp = session('company');
        if(!$comp){
            return redirect()->back();
        }

        $data  = Company::with('document','locations','activities')->find($comp->id)->toArray();
        view()->share('company',$data);
        $pdf = PDF::loadView('initiator.declaration_download', $data);
        return $pdf->download('declaration.pdf');
    } 

    public function upload(DeclarationUploadRequest $request){
        //$comp = Cache::get('company');
        $comp = session('company');
        if(!$comp){
            return redirect('/');
        }

        DB::beginTransaction();
        try{
            $company = Company::find($comp->id);
            $folder = 'uploads/'.$company->id;
            if ($request->hasFile('declaration_file')) {
                $declaration = $request->file('declaration_file');
                $originalName = $declaration->getClientOriginalName();
                $fileName = 'declaration.' . $declaration->getClientOriginalExtension();
                // $filePath = $declaration->storeAs($folder, $fileName);
                $filePath = $declaration->move(public_path($folder), $fileName);
            }
            
            $company->update(['decleration' => $folder.'/'.$fileName, 'declaration_updated_at' => now()]);

            DB::commit();

            $company = Company::find($comp->id);

            return response()->json([
                'status' => true,
                'data' => $company,
                'filepath' => asset($folder.'/'.$fileName),
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

    public function delete(Request $request){
        //$comp = Cache::get('company');
        $comp = session('company');
        if(!$comp){
            return redirect('/');
        }
        DB::beginTransaction();
        try{
            $company = Company::find($comp->id);

            $company->update(['decleration' => '', 'declaration_updated_at' => '']);

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
