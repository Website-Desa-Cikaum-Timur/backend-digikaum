<?php

namespace App\Repositories\Contracts;

use App\Shared\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getPublicProducts(int $perPage = 12, ?string $category = null, ?string $search = null): LengthAwarePaginator;

    public function findBySlug(string $slug): ?Model;
}
