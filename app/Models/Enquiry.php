<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function sub_category(){
        return $this->belongsTo(SubCategory::class);
    }

    public function attachments(){
        return $this->hasMany(EnquiryAttachment::class,'enquiry_id','id');
    }
}
