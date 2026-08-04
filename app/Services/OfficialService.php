<?php

namespace App\Services;

use App\Repositories\Contracts\OfficialRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class OfficialService
{
    public function __construct(
        private OfficialRepositoryInterface $repository
    ) {}

    public function createOfficial(array $data, ?UploadedFile $photo = null)
    {
        return DB::transaction(function () use ($data, $photo) {
            $official = $this->repository->create($data);

            if ($photo) {
                $official->addMedia($photo)->toMediaCollection('official_photos');
            }

            $this->clearSotkCache();

            return $official;
        });
    }

    public function updateOfficial(string $id, array $data, ?UploadedFile $photo = null): bool
    {
        return DB::transaction(function () use ($id, $data, $photo) {
            $updated = $this->repository->update($id, $data);

            if ($updated && $photo) {
                $official = $this->repository->findById($id);
                $official->clearMediaCollection('official_photos');
                $official->addMedia($photo)->toMediaCollection('official_photos');
            }

            if ($updated) {
                $this->clearSotkCache();
            }

            return $updated;
        });
    }

    public function deleteOfficial(string $id): bool
    {
        $deleted = $this->repository->delete($id);

        if ($deleted) {
            $this->clearSotkCache();
        }

        return $deleted;
    }

    private function clearSotkCache(): void
    {
        Cache::forget(OrganizationService::CACHE_KEY_SOTK);
    }
}
