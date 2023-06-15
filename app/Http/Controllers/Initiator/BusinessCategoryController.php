<?php

namespace App\Http\Controllers\Initiator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\CompanyActivity;

class BusinessCategoryController extends Controller
{
    public function index(){
        //$comp = Cache::get('company');
        $comp = session('company');
        if(!$comp){
            return redirect('/');
        }
        $categories = Category::all();
        return view('initiator.business-category',compact('categories'));
    }

    public function alpha(Request $request){
        if($request->alpha == "All"){
            $categories = Category::all();
        }
        else{
            $categories = Category::where('name', 'LIKE', $request->alpha.'%')->get();
        }
        
        return response()->json([
            'status' => true,
            'categories' => $categories,
        ], 200);
    }

    public function search(Request $request){
        $sub_categories = SubCategory::search($request->get('search') ?? '', function ($meilisearch, string $query, array $options) use ($request) {
            $result = $meilisearch->search($query, $options);

            return $result;
        })->get()->map(function($query) {
            return [
                'name'=> $query->name,
                'id'=> $query->id
            ];
        });

        
        return response()->json($sub_categories);
    }

    public function getSubcategories(Request $request){
        //$comp = Cache::get('company');
        $comp = session('company');
        try {
            $category = Category::findOrFail($request->id);
            $subCategories = $category->subCategories;
            return response()->json([
                'status' => true,
                'category' => $category,
                'data' => $subCategories
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
         }    
    }

    public function addActivity(Request $request){
        //$comp = Cache::get('company');
        $comp = session('company');
        if(!$comp){
            return redirect('/');
        }

        try {
            $activity = CompanyActivity::where('company_id',$comp->id)->count();
            if($activity > 2){
                return response()->json([
                    'status' => false,
                    'message' => 'Exceeded maximum no of categories!'
                ], 422);
            }

            $companyServicesExist = CompanyActivity::where('activity_id',$request->id)->where('company_id',$comp->id)->first();
            if(!$companyServicesExist){
                CompanyActivity::create([
                    'activity_id' => $request->id,
                    'company_id' => $comp->id
                ]);

                return response()->json([
                    'status' => true,
                    'message' => 'Category Added!'
                ], 200);
            }

            return response()->json([
                'status' => false,
                'message' => 'Category already exists!'
            ], 422);


        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }   


    }

    public function selectedSubcategories(Request $request){
        //$comp = Cache::get('company');
        $comp = session('company');
        if(!$comp){
            return redirect('/');
        }
        try {
            $activity = CompanyActivity::with('subcategory')->where('company_id',$comp->id)->get();
            return response()->json([
                'status' => true,
                'data' => $activity
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }    
    }

    public function deleteSelected ($id){
        try {
            $activity = CompanyActivity::findOrFail($id);
            $activity->delete();
            return response()->json([
                'status' => true,
                'message' => 'Deleted!' 
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }    
    } 
}
