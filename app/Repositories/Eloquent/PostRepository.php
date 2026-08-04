<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function getPublishedPosts(int $perPage = 10, ?string $categorySlug = null, ?string $search = null, ?string $sort = 'latest'): LengthAwarePaginator
    {
        $query = $this->model->published()
            ->with([
                'category:id,name,slug',
                'author:id,name',
            ]);

        if ($categorySlug) {
            $query->whereHas('category', function (Builder $q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        if ($search) {
            $query->where(function (Builder $q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        if ($sort === 'popular') {
            $query->orderBy('views_count', 'desc')->orderBy('published_at', 'desc');
        } else {
            $query->latest('published_at');
        }

        return $query->paginate($perPage);
    }

    public function findPublishedBySlug(string $slug)
    {
        return $this->model->published()
            ->with([
                'category:id,name,slug',
                'author:id,name',
            ])
            ->where('slug', $slug)
            ->first();
    }
}
