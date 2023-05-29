<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_sub_categories', 'sub_category_id', 'category_id');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_activities', 'activity_id', 'company_id');
    }

}
