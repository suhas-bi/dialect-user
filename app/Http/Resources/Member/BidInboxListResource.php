<?php

namespace App\Http\Resources\Member;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class BidInboxListResource extends JsonResource
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
            'subject' => substr($this->subject,0,40).'...',
            'date' => Carbon::parse($this->created_at)->format('d F, Y'),
            'expire_in' => Carbon::parse($this->expired_at)->diffForHumans(),
            'reply_count' => count($this->replies)
        ];
    }
}
