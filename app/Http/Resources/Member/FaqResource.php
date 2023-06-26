<?php

namespace App\Http\Resources\Member;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class FaqResource extends JsonResource
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
            'enquiry_id' => $this->enquiry_id,
            'reference_no' => $this->reference_no,
            'question' => $this->question,
            'answer' => $this->answer,
            'status' => $this->status,
            'answered_at' => Carbon::parse($this->answered_at)->format('d F, Y'),
            'created_at' => Carbon::parse($this->created_at)->format('d F, Y'),
            
        ];
    }
}
