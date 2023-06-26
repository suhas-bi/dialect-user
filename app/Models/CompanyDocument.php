<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDocument extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function document(){
        return $this->hasOne(Document::class,'id','doc_type');
    }
}
