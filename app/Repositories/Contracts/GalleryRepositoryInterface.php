<?php

namespace App\Repositories\Contracts;

use App\Shared\Contracts\RepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

interface GalleryRepositoryInterface extends RepositoryInterface
{
    public function getPublicGalleries(int $perPage = 12, ?string $category = null, ?int $year = null): LengthAwarePaginator;

    public function getAvailableYears(): array;
}
