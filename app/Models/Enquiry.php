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

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function sender(){
        return $this->belongsTo(CompanyUser::class,'from_id','id');
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

    public function all_faqs(){
        return $this->hasMany(EnquiryFaq::class,'enquiry_id','id');
    }

    public function my_faqs(){
        return $this->hasMany(EnquiryFaq::class,'enquiry_id','id')->where('created_by',auth()->user()->id);
    }

    public function all_replies(){
        return $this->hasMany(EnquiryReply::class,'enquiry_id','id')->latest();
    }

    public function shortlisted_replies(){
        return $this->hasMany(EnquiryReply::class,'enquiry_id','id')->where('status',1)->latest();
    }

    public function selected_replies(){
        return $this->hasMany(EnquiryReply::class,'enquiry_id','id')->where('is_selected',1)->latest();
    }

    public function action_replies(){
        return $this->hasMany(EnquiryReply::class,'enquiry_id','id')->where('status','>',0)->latest();
    }

    public function pending_replies(){
        return $this->hasMany(EnquiryReply::class,'enquiry_id','id')->where('status',0)->latest();
    }

    public function suggestions(){
        return $this->hasMany(EnquiryReply::class,'enquiry_id','id')->whereNotNull('suggested_remarks')->latest();
    }

    public function reply(){
        return $this->hasOne(EnquiryReply::class,'enquiry_id','id')->where('enquiry_replies.from_id',auth()->user()->id);
    }

    public function shared(){
        return $this->hasOne(CompanyUser::class,'id','shared_to');
    }


    public function scopeVerified($query)
    {
        return $query->where('verified_by','!=',0);
    }

    public function scopeShared($query)
    {
        return $query->whereNotNull('shared_to');
    }

    public function scopeNotShared($query)
    {
        return $query->whereNull('shared_to');
    }

    public function scopeCompleted($query)
    {
        return $query->where('is_completed',1);
    }

    public function scopeNotCompleted($query)
    {
        return $query->where('is_completed',0);
    }

   
}
