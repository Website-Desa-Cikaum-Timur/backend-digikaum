<?php

namespace App\Http\Resources\Api;

use App\Shared\Enums\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => $this->category->value,
            'category_label' => GalleryCategory::options()[$this->category->value] ?? $this->category->value,
            'year' => $this->year,
            'is_active' => $this->is_active,
            'image_url' => $this->getFirstMediaUrl('gallery_images') ?: null,
            'created_at' => $this->created_at->toIso8601String(),
        ];
    }
}
