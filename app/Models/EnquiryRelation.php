<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryRelation extends Model
{
    use HasFactory;

    public function enquiry(){
        return $this->belongsTo(Enquiry::class,'enquiry_id','id');
    }
}
