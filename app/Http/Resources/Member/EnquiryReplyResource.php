<?php

namespace App\Http\Resources\Member;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class EnquiryReplyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'enquiry_id' => $this->enquiry_id,
            'sender' => $this->sender,
            'sender_company' => $this->sender->company,
            'body' => $this->body,
            'created_at' => Carbon::parse($this->created_at)->format('d F, Y'),
            'created_time' => Carbon::parse($this->created_at)->diffForHumans(),
            'status' => $this->status,
            'status_text' => $this->status_text($this->status,$this->is_selected),
            'status_color' => $this->status_color($this->status),
            'hold_reason' => $this->hold_reason,
            'suggested_remarks' => $this->suggested_remarks,
            'is_selected' => $this->is_selected,
            'attachments' => $this->attachments  
        ];
    }

    public function status_text($status,$is_selected){
        if($status == 0){
            return 'Pending Review';
        }
        else if($status == 1){
            if($is_selected == 1){
                return 'Selected';
            }
            else{
                return 'Shortlisted';
            }  
        }
        else if($status == 2){
            return 'On Hold';
        }
    }

    public function status_color($status){
        if($status == 0){
            return 'yellow';
        }
        else if($status == 1){
            return 'green';
        }
        else if($status == 2){
            return 'red';
        }
    }
}
