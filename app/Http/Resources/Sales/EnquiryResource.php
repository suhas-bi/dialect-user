<?php

namespace App\Http\Resources\Sales;

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
            'enquiry_id' => $this->enquiry->id,
            'reference_no' => $this->enquiry->reference_no,
            'subject' => $this->enquiry->subject,
            'body' => $this->enquiry->body,
            'country' => $this->enquiry->country->name,
            'region' => $this->enquiry->region->name ?? 'All Region',
            'attachments' => $this->enquiry->attachments,
            'sender' => $this->enquiry->sender,
            'created_at' => Carbon::parse($this->enquiry->created_at)->format('d F, Y'),
            'created_date' => Carbon::parse($this->enquiry->created_at)->format('d F, Y'),
            'created_time' => Carbon::parse($this->enquiry->created_at)->format('H:i:s'),
            'expire_at' => Carbon::parse($this->enquiry->expired_at)->format('d F, Y'),
            'my_faqs' => FaqResource::collection($this->enquiry->my_faqs),
            'all_faqs' => FaqResource::collection($this->enquiry->all_faqs),
            'reply' => $this->enquiry->reply
        ];
    }
}
