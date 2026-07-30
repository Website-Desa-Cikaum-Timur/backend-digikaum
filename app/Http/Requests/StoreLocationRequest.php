<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'in:umkm,fasilitas_kesehatan,fasilitas_pendidikan,rawan_bencana,kantor_desa,ibadah'],
            'description' => ['nullable', 'string'],
            'address' => ['nullable', 'string', 'max:500'],

            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-180,180'],

            'is_active' => ['nullable', 'boolean'],

            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ];
    }
}
