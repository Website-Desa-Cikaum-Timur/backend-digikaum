<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFamilyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $familyId = $this->route('family');

        return [
            'kk_number' => ['required', 'string', 'size:16', Rule::unique('families', 'kk_number')->ignore($familyId)],
            'head_of_family_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'rt' => ['required', 'string', 'max:3'],
            'rw' => ['required', 'string', 'max:3'],
            'postal_code' => ['required', 'string', 'size:5'],
            'village' => ['nullable', 'string'],
            'district' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'province' => ['nullable', 'string'],
        ];
    }
}
