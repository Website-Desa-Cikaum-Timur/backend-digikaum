<?php

namespace App\Services;

use App\Repositories\Contracts\GalleryRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class GalleryService
{
    public function __construct(
        private GalleryRepositoryInterface $repository
    ) {}

    public function createGallery(array $data, ?UploadedFile $image = null)
    {
        return DB::transaction(function () use ($data, $image) {
            $gallery = $this->repository->create($data);

            if ($image) {
                $gallery->addMedia($image)->toMediaCollection('gallery_images');
            }

            return $gallery;
        });
    }

    public function updateGallery(string $id, array $data, ?UploadedFile $image = null): bool
    {
        return DB::transaction(function () use ($id, $data, $image) {
            $updated = $this->repository->update($id, $data);

            if ($updated && $image) {
                $gallery = $this->repository->findById($id);
                $gallery->clearMediaCollection('gallery_images');
                $gallery->addMedia($image)->toMediaCollection('gallery_images');
            }

            return $updated;
        });
    }

    public function deleteGallery(string $id): bool
    {
        return $this->repository->delete($id);
    }
}
