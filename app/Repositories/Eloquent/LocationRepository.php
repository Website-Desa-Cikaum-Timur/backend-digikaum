<?php

namespace App\Repositories\Eloquent;

use App\Models\Location;
use App\Repositories\Contracts\LocationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LocationRepository extends BaseRepository implements LocationRepositoryInterface
{
    public function __construct(Location $model)
    {
        parent::__construct($model);
    }

    public function create(array $data): Model
    {
        if (isset($data['latitude']) && isset($data['longitude'])) {
            $lat = (float) $data['latitude'];
            $lon = (float) $data['longitude'];

            $data['geom'] = DB::raw("ST_SetSRID(ST_MakePoint({$lon}, {$lat}), 4326)");

            unset($data['latitude'], $data['longitude']);
        }

        return parent::create($data);
    }

    public function update(string $id, array $data): bool
    {
        if (isset($data['latitude']) && isset($data['longitude'])) {
            $lat = (float) $data['latitude'];
            $lon = (float) $data['longitude'];

            $data['geom'] = DB::raw("ST_SetSRID(ST_MakePoint({$lon}, {$lat}), 4326)");
            unset($data['latitude'], $data['longitude']);
        }

        return parent::update($id, $data);
    }

    public function getActiveLocationsGeoJson(): Collection
    {
        return $this->model->active()
            ->select('id', 'name', 'slug', 'category', 'description', 'address')
            ->selectRaw('ST_AsGeoJSON(geom) as geojson')
            ->get();
    }

    public function getLocationsWithinRadius(float $latitude, float $longitude, float $radiusInMeters): Collection
    {
        $point = "POINT({$longitude} {$latitude})";

        return $this->model->active()
            ->select('id', 'name', 'slug', 'category', 'description', 'address')
            ->selectRaw('ST_AsGeoJSON(geom) as geojson')
            ->whereRaw(
                'ST_DWithin(geom::geography, ST_GeomFromText(?, 4326)::geography, ?)',
                [$point, $radiusInMeters]
            )
            ->get();
    }

    public function findByIdGeoJson(string $id)
    {
        return $this->model->select('id', 'name', 'slug', 'category', 'description', 'address', 'is_active')
            ->selectRaw('ST_AsGeoJSON(geom) as geojson')
            ->where('id', $id)
            ->first();
    }

    public function findBySlugGeoJson(string $slug)
    {
        return $this->model->select('id', 'name', 'slug', 'category', 'description', 'address', 'is_active')
            ->selectRaw('ST_AsGeoJSON(geom) as geojson')
            ->where('slug', $slug)
            ->first();
    }
}
