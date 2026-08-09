<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function getPublicProducts(int $perPage = 12, ?string $category = null, ?string $search = null): LengthAwarePaginator
    {
        $query = $this->model->active()->latest();

        if ($category) {
            $query->where('category', $category);
        }

        if ($search) {
            $query->where(function (Builder $q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('owner_name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        return $query->paginate($perPage);
    }

    public function findBySlug(string $slug): ?Model
    {
        return $this->model->active()
            ->where('slug', $slug)
            ->orWhere('id', $slug)
            ->first();
    }
}
