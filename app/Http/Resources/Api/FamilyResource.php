<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class FamilyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $censoredKk = Str::substr($this->kk_number, 0, 6) . '******' . Str::substr($this->kk_number, -4);
        $isAdmin = auth('sanctum')->check();

        return [
            'id' => $this->id,
            'kk_number' => $isAdmin ? $this->kk_number : $censoredKk,
            'head_of_family_name' => $this->head_of_family_name,
            'address' => $this->address,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'village' => $this->village,
            'district' => $this->district,
            'city' => $this->city,
            'residents' => ResidentResource::collection($this->whenLoaded('residents')),
            'created_at' => $this->created_at->toIso8601String(),
        ];
    }
}
