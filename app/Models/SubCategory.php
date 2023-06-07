<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class SubCategory extends Model
{
    use HasFactory,Searchable;


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_sub_categories', 'sub_category_id', 'category_id');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_activities', 'activity_id', 'company_id');
    }

    protected $with = [
        'sub_keywords'
    ];

    public function searchable(): bool
    {
        return $this->published || $this->sub_keywords->searchable;
    }
    

    public function toSearchableArray(): array
    {
        $array = $this->toArray();
        
        // Include the sub_keyword names in the searchable array
        $array['sub_keywords'] = $this->sub_keywords;
        
        return $array;
    }

    public static function getSearchFilterAttributes(): array
    {
        return [ 'sub_keywords' ];
    }
    
    public function sub_keywords(){
        return $this->hasMany(SubCategoryKeyword::class,'sub_category_id','id');
    }

}
