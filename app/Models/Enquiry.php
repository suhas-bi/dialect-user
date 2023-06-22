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

    public function open_faqs(){
        return $this->hasMany(EnquiryFaq::class,'enquiry_id','id')->where('status','!=',1);
    }

    public function closed_faqs(){
        return $this->hasMany(EnquiryFaq::class,'enquiry_id','id')->where('status',1);
    }

    public function replies(){
        return $this->hasMany(Enquiry::class,'parent_reference_no','reference_no')->where('is_draft',0)->where('from_id','!=',auth()->user()->id)->with('company')->latest();
    }

    public function scopeVerified($query)
    {
        return $query->where('verified_by','!=',0);
    }
}
