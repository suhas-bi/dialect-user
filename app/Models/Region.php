<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $guarded = [''];
    
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_locations', 'region_id', 'company_id');
    }
}
