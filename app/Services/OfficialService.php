<?php

namespace App\Services;

use App\Repositories\Contracts\OfficialRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class OfficialService
{
    public function __construct(
        private OfficialRepositoryInterface $repository
    ) {}

    public function createOfficial(array $data)
    {
        $official = $this->repository->create($data);
        $this->clearSotkCache();

        return $official;
    }

    public function updateOfficial(string $id, array $data): bool
    {
        $updated = $this->repository->update($id, $data);

        if ($updated) {
            $this->clearSotkCache();
        }

        return $updated;
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
