<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductService
{
    public function __construct(
        private ProductRepositoryInterface $repository
    ) {}

    public function createProduct(array $data, ?UploadedFile $image = null)
    {
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']) . '-' . Str::random(4);
        }

        return DB::transaction(function () use ($data, $image) {
            $product = $this->repository->create($data);

            if ($image) {
                $product->addMedia($image)->toMediaCollection('product_images');
            }

            return $product;
        });
    }

    public function updateProduct(string $id, array $data, ?UploadedFile $image = null): bool
    {
        if (isset($data['name']) && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']) . '-' . Str::random(4);
        }

        return DB::transaction(function () use ($id, $data, $image) {
            $updated = $this->repository->update($id, $data);

            if ($updated && $image) {
                $product = $this->repository->findById($id);
                $product->clearMediaCollection('product_images');
                $product->addMedia($image)->toMediaCollection('product_images');
            }

            return $updated;
        });
    }

    public function deleteProduct(string $id): bool
    {
        return $this->repository->delete($id);
    }
}
