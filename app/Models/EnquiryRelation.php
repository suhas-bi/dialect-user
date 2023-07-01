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

    

    public function scopeExpired($query)
    {
        return $query->whereHas('enquiry', function ($query) {
            $query->whereDate('expired_at', '<', today());
        });
    }

    public function scopeNotExpired($query)
    {
        return $query->whereHas('enquiry', function ($query) {
            $query->whereDate('expired_at', '>=', today());
        });
    }

    public function scopeReplied($query)
    {
        return $query->where('is_replied',1);
    }

    public function scopeNotReplied($query)
    {
        return $query->where('is_replied',0);
    }
}
