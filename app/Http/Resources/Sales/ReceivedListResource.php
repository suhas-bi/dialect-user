<?php

namespace App\Http\Resources\Sales;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ReceivedListResource extends JsonResource
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
            'subject' => substr($this->enquiry->subject,0,40).'...',
            'category' => $this->enquiry->sub_category->name,
            'company' => $this->enquiry->sender->company->name,
            'date' => Carbon::parse($this->enquiry->created_at)->format('d F, Y'),
            'expiry_date' => Carbon::parse($this->enquiry->expired_at)->format('d F, Y'),
            'expire_in' => Carbon::parse($this->enquiry->expired_at)->diffForHumans(),
            'is_read' => $this->is_read,
            'is_replied' => $this->is_replied
        ];
    }
}
