<?php

namespace App\Repositories\Eloquent;

use App\Models\Location;
use App\Repositories\Contracts\LocationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class LocationRepository extends BaseRepository implements LocationRepositoryInterface
{
    public function __construct(Location $model)
    {
        parent::__construct($model);
    }

    public function getActiveLocationsGeoJson(): Collection
    {
        return $this->model->active()->get();
    }

    public function getLocationsWithinRadius(float $latitude, float $longitude, float $radiusInMeters): Collection
    {
        $haversine = '(6371000 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude))))';

        return $this->model->active()
            ->select('*')
            ->selectRaw("{$haversine} AS distance", [$latitude, $longitude, $latitude])
            ->having('distance', '<=', $radiusInMeters)
            ->get();
    }

    public function findByIdGeoJson(string $id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function findBySlugGeoJson(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
