<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyLocation extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function region(){
        return $this->hasOne(SubCategory::class,'id','region_id');
    }
}
