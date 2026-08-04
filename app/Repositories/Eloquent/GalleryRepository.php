<?php

namespace App\Repositories\Eloquent;

use App\Models\Gallery;
use App\Repositories\Contracts\GalleryRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class GalleryRepository extends BaseRepository implements GalleryRepositoryInterface
{
    public function __construct(Gallery $model)
    {
        parent::__construct($model);
    }

    public function getPublicGalleries(int $perPage = 12, ?string $category = null, ?int $year = null): LengthAwarePaginator
    {
        $query = $this->model->active()->orderBy('year', 'desc')->latest();

        if ($category) {
            $query->where('category', $category);
        }

        if ($year) {
            $query->where('year', $year);
        }

        return $query->paginate($perPage);
    }

    public function getAvailableYears(): array
    {
        return $this->model->active()
            ->select('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();
    }
}
