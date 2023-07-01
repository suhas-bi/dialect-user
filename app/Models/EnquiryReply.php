<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryReply extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function sender(){
        return $this->belongsTo(CompanyUser::class,'from_id','id');
    }

    public function attachments(){
        return $this->hasMany(EnquiryAttachment::class,'reply_id','id');
    }

    

}
