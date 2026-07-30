<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'category' => $this->category,
            'description' => $this->description,
            'address' => $this->address,
            'is_active' => $this->is_active,

            'geometry' => isset($this->geojson) ? json_decode($this->geojson) : null,

            'photo_url' => $this->getFirstMediaUrl('location_photos') ?: null,
        ];
    }
}
