<?php

namespace App\Services;

use App\Repositories\Contracts\PostCategoryRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class PostCategoryService
{
    private const CACHE_KEY_ACTIVE = 'post_categories_active';

    private const CACHE_TTL = 86400;

    public function __construct(
        private PostCategoryRepositoryInterface $repository
    ) {}

    public function getActiveCategories(): Collection
    {
        return Cache::remember(self::CACHE_KEY_ACTIVE, self::CACHE_TTL, function () {
            return $this->repository->getActiveCategories();
        });
    }

    public function createCategory(array $data)
    {
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $category = $this->repository->create($data);

        $this->clearCache();

        return $category;
    }

    public function updateCategory(string $id, array $data): bool
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

    public function deleteCategory(string $id): bool
    {
        $deleted = $this->repository->delete($id);

        if ($deleted) {
            $this->clearCache();
        }

        return $deleted;
    }

    private function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY_ACTIVE);
    }
}
