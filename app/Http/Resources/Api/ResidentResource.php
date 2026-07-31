<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ResidentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $censoredNik = Str::substr($this->nik, 0, 6) . '******' . Str::substr($this->nik, -4);

        $isAdmin = auth('sanctum')->check();

        return [
            'id' => $this->id,
            'family_id' => $this->family_id,

            'nik' => $isAdmin ? $this->nik : $censoredNik,

            'name' => $this->name,
            'place_of_birth' => $this->place_of_birth,
            'date_of_birth' => $this->date_of_birth->format('Y-m-d'),

            'gender' => $this->gender->value,
            'family_relation_status' => $this->family_relation_status->value,

            'religion' => $this->religion,
            'education_level' => $this->education_level,
            'profession' => $this->profession,
            'blood_type' => $this->blood_type,
            'marital_status' => $this->marital_status,

            'is_active' => $this->is_active,
            'created_at' => $this->created_at->toIso8601String(),
        ];
    }
}
