<?php

namespace App\Repositories\Contracts;

use App\Shared\Contracts\RepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getPublicProducts(int $perPage = 12, ?string $category = null, ?string $search = null): LengthAwarePaginator;
}
