<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function document(){
        return $this->hasOne(CompanyDocument::class,'company_id','id');
    }

    public function activities()
    {
        return $this->belongsToMany(SubCategory::class, 'company_activities', 'company_id', 'activity_id');
    }

    public function locations()
    {
        return $this->belongsToMany(Region::class, 'company_locations', 'company_id', 'region_id');
    }
}
