<?php

namespace App\Services;

use App\Repositories\Contracts\LocationRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LocationService
{
    public function __construct(
        private LocationRepositoryInterface $repository
    ) {}

    public function createLocation(array $data, ?UploadedFile $image = null)
    {
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']) . '-' . Str::random(4);
        }

        return DB::transaction(function () use ($data, $image) {
            $location = $this->repository->create($data);

            if ($image) {
                $location->addMedia($image)->toMediaCollection('location_images');
            }

            return $location;
        });
    }

    public function updateLocation(string $id, array $data, ?UploadedFile $image = null): bool
    {
        if (isset($data['name']) && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']) . '-' . Str::random(4);
        }

        return DB::transaction(function () use ($id, $data, $image) {
            $updated = $this->repository->update($id, $data);

            if ($updated && $image) {
                $location = $this->repository->findById($id);
                $location->clearMediaCollection('location_images');
                $location->addMedia($image)->toMediaCollection('location_images');
            }

            return $updated;
        });
    }

    public function deleteLocation(string $id): bool
    {
        return $this->repository->delete($id);
    }
}
