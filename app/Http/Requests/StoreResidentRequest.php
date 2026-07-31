<?php

namespace App\Http\Requests;

use App\Shared\Enums\FamilyRelation;
use App\Shared\Enums\GenderType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreResidentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'family_id' => ['required', 'string', Rule::exists('families', 'id')],
            'nik' => ['required', 'string', 'size:16', Rule::unique('residents', 'nik')],
            'name' => ['required', 'string', 'max:255'],
            'place_of_birth' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', Rule::enum(GenderType::class)],
            'religion' => ['nullable', 'string'],
            'education_level' => ['nullable', 'string'],
            'profession' => ['nullable', 'string'],
            'blood_type' => ['nullable', 'string', 'max:3'],
            'marital_status' => ['required', 'string'],

            'family_relation_status' => [
                'required',
                Rule::enum(FamilyRelation::class),
                function ($attribute, $value, $fail) {
                    if ($value === FamilyRelation::Head->value) {
                        $fail('Status Kepala Keluarga hanya bisa dibuat saat pembuatan KK baru.');
                    }
                },
            ],

            'father_name' => ['nullable', 'string', 'max:255'],
            'mother_name' => ['nullable', 'string', 'max:255'],
        ];
    }
}
