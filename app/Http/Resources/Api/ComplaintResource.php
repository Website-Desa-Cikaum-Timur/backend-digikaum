<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tracking_code' => $this->tracking_code,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'category' => $this->category,

            'reporter_name' => $this->is_anonymous ? 'Anonim (Disembunyikan)' : $this->reporter_name,

            'reporter_phone' => $this->when(! $this->is_anonymous && $this->reporter_phone, $this->reporter_phone),

            'is_anonymous' => $this->is_anonymous,

            'status' => $this->status->value,
            'status_label' => $this->status->label(),

            'evidence_url' => $this->getFirstMediaUrl('complaint_evidences') ?: null,

            'created_at' => $this->created_at->toIso8601String(),
        ];
    }
}
