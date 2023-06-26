<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryFaq extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function sender(){
        return $this->belongsTo(CompanyUser::class,'created_by','id');
    }
}
