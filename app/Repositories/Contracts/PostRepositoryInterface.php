<?php

namespace App\Repositories\Contracts;

use App\Shared\Contracts\RepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

interface PostRepositoryInterface extends RepositoryInterface
{
    public function getPublishedPosts(int $perPage = 10, ?string $categorySlug = null, ?string $search = null, ?string $sort = 'latest'): LengthAwarePaginator;

    public function findPublishedBySlug(string $slug);
}
