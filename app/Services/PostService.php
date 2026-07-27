<?php

namespace App\Services;

use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;

class PostService
{
    public function __construct(
        private PostRepositoryInterface $repository
    ) {}

    public function createPost(array $data, ?UploadedFile $coverImage = null)
    {
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        return DB::transaction(function () use ($data, $coverImage) {
            $post = $this->repository->create($data);

            if ($coverImage) {
                $post->addMedia($coverImage)->toMediaCollection('post_covers');
            }

            return $post;
        });
    }

    public function updatePost(string $id, array $data, ?UploadedFile $coverImage = null): bool
    {
        if (empty($data['slug']) && isset($data['title'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        return DB::transaction(function () use ($id, $data, $coverImage) {
            $updated = $this->repository->update($id, $data);

            if ($updated && $coverImage) {
                $post = $this->repository->findById($id);
                
                $post->clearMediaCollection('post_covers');
                $post->addMedia($coverImage)->toMediaCollection('post_covers');
            }

            return $updated;
        });
    }

    public function deletePost(string $id): bool
    {
        return $this->repository->delete($id);
    }
}