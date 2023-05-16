<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class, 'category_sub_categories', 'category_id', 'sub_category_id');
    }

}
