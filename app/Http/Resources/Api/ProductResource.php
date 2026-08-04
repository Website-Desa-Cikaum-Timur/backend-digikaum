<?php

namespace App\Http\Resources\Api;

use App\Shared\Enums\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'category' => $this->category->value,
            'category_label' => ProductCategory::options()[$this->category->value] ?? $this->category->value,
            'description' => $this->description,
            'owner_name' => $this->owner_name,
            'phone_number' => $this->phone_number,
            'price' => $this->price,
            'formatted_price' => $this->price ? 'Rp ' . number_format($this->price, 0, ',', '.') : null,
            'is_active' => $this->is_active,
            'image_url' => $this->getFirstMediaUrl('product_images') ?: null,
            'created_at' => $this->created_at->toIso8601String(),
        ];
    }
}
