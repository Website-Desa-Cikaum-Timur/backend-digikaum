<?php

namespace App\Repositories\Contracts;

use App\Shared\Contracts\RepositoryInterface;
use Illuminate\Support\Collection;

interface PostCategoryRepositoryInterface extends RepositoryInterface
{
    public function getActiveCategories(): Collection;
}
