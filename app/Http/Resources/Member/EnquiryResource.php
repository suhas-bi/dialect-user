<?php

namespace App\Http\Resources\Member;

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
            'expiry' => array(
                'day' => Carbon::parse($this->expired_at)->format('d'),
                'month' => Carbon::parse($this->expired_at)->format('F'),
                'year' => Carbon::parse($this->expired_at)->format('Y'),
            ),
            'reply_count' => count($this->replies),
            'action_count' => count($this->replies),
            'sender' => $this->sender
        ];
    }
}
