<?php

namespace App\Filament\Resources\Locations\Pages;

use App\Filament\Resources\Locations\LocationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EditLocation extends EditRecord
{
    protected static string $resource = LocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $location = $this->getRecord();

        $geomData = DB::selectOne(
            'SELECT ST_Y(geom::geometry) as lat, ST_X(geom::geometry) as lng FROM locations WHERE id = ?',
            [$location->id]
        );

        if ($geomData) {
            $data['latitude'] = $geomData->lat;
            $data['longitude'] = $geomData->lng;
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['latitude']) && isset($data['longitude'])) {
            $lat = (float) $data['latitude'];
            $lon = (float) $data['longitude'];

            $data['geom'] = DB::raw("ST_SetSRID(ST_MakePoint({$lon}, {$lat}), 4326)");
            unset($data['latitude'], $data['longitude']);
        }

        if (isset($data['name']) && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']) . '-' . Str::random(4);
        }

        return $data;
    }
}
