<?php

namespace App\Repositories\Contracts;

use App\Shared\Contracts\RepositoryInterface;
use Illuminate\Support\Collection;

interface PostCategoryRepositoryInterface extends RepositoryInterface
{
    /**
     * Mengambil semua kategori yang sedang aktif, diurutkan berdasarkan abjad.
     */
    public function getActiveCategories(): Collection;
}
