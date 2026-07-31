<?php

namespace App\Http\Requests;

use App\Shared\Enums\GenderType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFamilyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kk_number' => ['required', 'string', 'size:16', Rule::unique('families', 'kk_number')],
            'head_of_family_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'rt' => ['required', 'string', 'max:3'],
            'rw' => ['required', 'string', 'max:3'],
            'postal_code' => ['required', 'string', 'size:5'],
            'village' => ['nullable', 'string'],
            'district' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'province' => ['nullable', 'string'],

            'head_resident' => ['required', 'array'],
            'head_resident.nik' => ['required', 'string', 'size:16', Rule::unique('residents', 'nik')],
            'head_resident.name' => ['required', 'string', 'max:255'],
            'head_resident.place_of_birth' => ['required', 'string', 'max:255'],
            'head_resident.date_of_birth' => ['required', 'date'],
            'head_resident.gender' => ['required', Rule::enum(GenderType::class)],
            'head_resident.religion' => ['nullable', 'string'],
            'head_resident.marital_status' => ['required', 'string'],
        ];
    }
}
