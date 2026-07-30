<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComplaintRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'reporter_name' => ['required', 'string', 'max:150'],
            'reporter_phone' => ['nullable', 'string', 'max:20'],
            'category' => ['required', 'string', 'max:100'],
            'is_anonymous' => ['nullable', 'boolean'],
            'evidence' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
        ];
    }
}
