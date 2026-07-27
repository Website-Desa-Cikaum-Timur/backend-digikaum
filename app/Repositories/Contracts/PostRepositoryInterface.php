<?php

namespace App\Repositories\Contracts;

use App\Shared\Contracts\RepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

interface PostRepositoryInterface extends RepositoryInterface
{
    /**
     * Mengambil daftar berita yang sudah rilis (published) menggunakan paginasi.
     * Bisa di-filter berdasarkan slug kategori (opsional).
     */
    public function getPublishedPosts(int $perPage = 10, ?string $categorySlug = null): LengthAwarePaginator;

    /**
     * Mencari detail berita publik berdasarkan slug.
     */
    public function findPublishedBySlug(string $slug);
}
