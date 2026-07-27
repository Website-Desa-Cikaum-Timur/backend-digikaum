<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'content' => $this->when(! $request->routeIs('*.index'), $this->content),
            'status' => $this->status,
            'is_highlight' => $this->is_highlight,
            'views_count' => $this->views_count,
            'published_at' => $this->published_at ? $this->published_at->toIso8601String() : null,

            'cover_image_url' => $this->getFirstMediaUrl('post_covers') ?: null,

            'category' => $this->whenLoaded('category', function () {
                return [
                    'id' => $this->category->id,
                    'name' => $this->category->name,
                    'slug' => $this->category->slug,
                ];
            }),
            'author' => $this->whenLoaded('author', function () {
                return [
                    'id' => $this->author->id,
                    'name' => $this->author->name,
                ];
            }),

            'created_at' => $this->created_at->toIso8601String(),
        ];
    }
}
