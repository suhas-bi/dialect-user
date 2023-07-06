<?php

namespace App\Http\Resources\Member;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class BidInboxListResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reference_no' => $this->reference_no,
            'subject' => substr($this->subject,0,40).'...',
            'date' => Carbon::parse($this->created_at)->format('d F, Y'),
            'expire_in' => Carbon::parse($this->expired_at)->diffForHumans(),
            'reply_count' => count($this->all_replies),
            'suggestions_count' => count($this->suggestions),
            'share_priority' => $this->sharePriorityText($this->share_priority),
            'share_priority_text' => $this->sharePrioritySymbol($this->share_priority),
            'shared_at' => Carbon::parse($this->shared_at)->format('d F, Y'),
        ];
    }

    public function sharePrioritySymbol($status){
        if($status == 1){
            return '';
        }
        else if($status == 2){
            return '';
        }
        else if($status == 3){
            return '<i class="flag-ico"></i>';
        }
    }

    public function sharePriorityText($status){
        if($status == 1){
            return 'Low';
        }
        else if($status == 2){
            return 'Medium';
        }
        else if($status == 3){
            return 'High';
        }
    }
}
