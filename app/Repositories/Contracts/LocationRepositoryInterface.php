<?php

namespace App\Repositories\Contracts;

use App\Shared\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface LocationRepositoryInterface extends RepositoryInterface
{
    public function getActiveLocationsGeoJson(): Collection;

    public function getLocationsWithinRadius(float $latitude, float $longitude, float $radiusInMeters): Collection;

    public function findByIdGeoJson(string $id);

    public function findBySlugGeoJson(string $slug);
}
