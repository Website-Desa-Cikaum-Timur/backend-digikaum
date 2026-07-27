<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $postId = $this->route('post');

        return [
            'post_category_id' => ['sometimes', 'required', 'string', 'exists:post_categories,id'],
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'slug' => [
                'nullable', 
                'string', 
                'max:255', 
                Rule::unique('posts', 'slug')->ignore($postId)
            ],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['sometimes', 'required', 'string'],
            'status' => ['nullable', 'in:draft,published,archived'],
            'is_highlight' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ];
    }
}