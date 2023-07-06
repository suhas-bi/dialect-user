<?php

namespace App\Http\Resources\Procurement;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class EnquiryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reference_no' => $this->reference_no,
            'subject' => $this->subject,
            'body' => $this->body,
            'attachments' => $this->attachments,
            'open_faqs' => FaqResource::collection($this->open_faqs),
            'closed_faqs' => FaqResource::collection($this->closed_faqs),
            'created_at' => Carbon::parse($this->created_at)->format('d F, Y'),
            'expire_at' => Carbon::parse($this->expired_at)->format('d F, Y'),
            'expiry' => array(
                'day' => Carbon::parse($this->expired_at)->format('d'),
                'month' => Carbon::parse($this->expired_at)->format('F'),
                'year' => Carbon::parse($this->expired_at)->format('Y'),
            ),
            'reply_count' => count($this->all_replies),
            'action_count' => count($this->action_replies),
            'sender' => $this->sender,
            'all_replies' => EnquiryReplyResource::collection($this->all_replies),
            'shortlisted' => EnquiryReplyResource::collection($this->shortlisted_replies),
            'selected' => EnquiryReplyResource::collection($this->selected_replies),
            'pending_replies' => EnquiryReplyResource::collection($this->pending_replies),
            'suggestions' => $this->suggestions,
            'share' => $this->shared,
            'share_priority' => $this->sharePriorityText($this->share_priority),
            'share_date' => Carbon::parse($this->shared_at)->format('d F, Y')
        ];
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
