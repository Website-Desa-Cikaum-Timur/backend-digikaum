<?php

namespace App\Http\Requests;

use App\Shared\Enums\GalleryCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGalleryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', Rule::enum(GalleryCategory::class)],
            'year' => ['required', 'integer', 'min:2000', 'max:2099'],
            'is_active' => ['nullable', 'boolean'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
        ];
    }
}
