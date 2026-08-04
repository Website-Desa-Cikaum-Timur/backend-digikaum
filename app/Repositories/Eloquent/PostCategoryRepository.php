<?php

namespace App\Repositories\Eloquent;

use App\Models\PostCategory;
use App\Repositories\Contracts\PostCategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class PostCategoryRepository extends BaseRepository implements PostCategoryRepositoryInterface
{
    public function __construct(PostCategory $model)
    {
        parent::__construct($model);
    }

    public function getActiveCategories(): Collection
    {
        return $this->model
            ->where('is_active', true)
            ->withCount(['posts' => function (Builder $query) {
                $query->published();
            }])
            ->orderBy('name', 'asc')
            ->get();
    }
}
