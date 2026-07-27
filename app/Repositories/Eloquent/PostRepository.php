<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function getPublishedPosts(int $perPage = 10, ?string $categorySlug = null): LengthAwarePaginator
    {
        $query = $this->model->published()
            ->with([
                'category:id,name,slug', 
                'author:id,name' 
            ])
            ->latest('published_at');

        if ($categorySlug) {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        return $query->paginate($perPage);
    }

    public function findPublishedBySlug(string $slug)
    {
        return $this->model->published()
            ->with([
                'category:id,name,slug', 
                'author:id,name'
            ])
            ->where('slug', $slug)
            ->first();
    }
}