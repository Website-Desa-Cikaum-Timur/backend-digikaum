<?php

namespace App\Services;

use App\Repositories\Contracts\OrganizationRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class OrganizationService
{
    public const CACHE_KEY_SOTK = 'sotk_organizations_active';

    private const CACHE_TTL = 86400;

    public function __construct(
        private OrganizationRepositoryInterface $repository
    ) {}

    public function getSotkHierarchy(): Collection
    {
        return Cache::remember(self::CACHE_KEY_SOTK, self::CACHE_TTL, function () {
            return $this->repository->getActiveOrganizationsWithOfficials();
        });
    }

    public function createOrganization(array $data)
    {
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $organization = $this->repository->create($data);
        $this->clearCache();

        return $organization;
    }

    public function updateOrganization(string $id, array $data): bool
    {
        if (empty($data['slug']) && isset($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $updated = $this->repository->update($id, $data);

        if ($updated) {
            $this->clearCache();
        }

        return $updated;
    }

    public function deleteOrganization(string $id): bool
    {
        $deleted = $this->repository->delete($id);

        if ($deleted) {
            $this->clearCache();
        }

        return $deleted;
    }

    private function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY_SOTK);
    }
}
