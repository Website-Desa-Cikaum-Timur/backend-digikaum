<?php

namespace App\Filament\Resources\Locations\Pages;

use App\Filament\Resources\Locations\LocationResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateLocation extends CreateRecord
{
    protected static string $resource = LocationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $lat = (float) $data['latitude'];
        $lon = (float) $data['longitude'];

        $data['geom'] = DB::raw("ST_SetSRID(ST_MakePoint({$lon}, {$lat}), 4326)");

        unset($data['latitude'], $data['longitude']);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']) . '-' . Str::random(4);
        }

        return $data;
    }
}
