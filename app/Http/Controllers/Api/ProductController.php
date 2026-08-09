<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Api\ProductResource;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $productService,
        private ProductRepositoryInterface $repository
    ) {}

    public function index(Request $request): AnonymousResourceCollection
    {
        $products = $this->repository->getPublicProducts(
            perPage: $request->query('per_page', 12),
            category: $request->query('category'),
            search: $request->query('search')
        );

        return ProductResource::collection($products);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = $this->productService->createProduct(
            $request->validated(),
            $request->file('image')
        );

        return response()->json([
            'success' => true,
            'message' => 'Data UMKM berhasil ditambahkan',
            'data' => new ProductResource($product),
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $product = $this->repository->findBySlug($id);

        if (! $product) {
            return response()->json([
                'success' => false,
                'message' => 'Data UMKM tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new ProductResource($product),
        ]);
    }

    public function update(UpdateProductRequest $request, string $id): JsonResponse
    {
        $updated = $this->productService->updateProduct(
            $id,
            $request->validated(),
            $request->file('image')
        );

        if (! $updated) {
            return response()->json([
                'success' => false,
                'message' => 'Data UMKM gagal diperbarui atau tidak ditemukan',
            ], 404);
        }

        $product = $this->repository->findById($id);

        return response()->json([
            'success' => true,
            'message' => 'Data UMKM berhasil diperbarui',
            'data' => new ProductResource($product),
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $deleted = $this->productService->deleteProduct($id);

        if (! $deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Data UMKM gagal dihapus atau tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data UMKM berhasil dihapus',
        ]);
    }
}
