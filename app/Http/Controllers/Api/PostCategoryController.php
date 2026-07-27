<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostCategoryRequest;
use App\Http\Requests\UpdatePostCategoryRequest;
use App\Http\Resources\Api\PostCategoryResource;
use App\Repositories\Contracts\PostCategoryRepositoryInterface;
use App\Services\PostCategoryService;
use Illuminate\Http\JsonResponse;

class PostCategoryController extends Controller
{
    public function __construct(
        private PostCategoryService $categoryService,
        private PostCategoryRepositoryInterface $repository
    ) {}

    public function index(): JsonResponse
    {
        $categories = $this->categoryService->getActiveCategories();

        return response()->json([
            'success' => true,
            'message' => 'Data kategori berhasil diambil',
            'data' => PostCategoryResource::collection($categories),
        ]);
    }

    public function store(StorePostCategoryRequest $request): JsonResponse
    {
        $category = $this->categoryService->createCategory($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil ditambahkan',
            'data' => new PostCategoryResource($category),
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $category = $this->repository->findById($id);

        if (! $category) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail kategori berhasil diambil',
            'data' => new PostCategoryResource($category),
        ]);
    }

    public function update(UpdatePostCategoryRequest $request, string $id): JsonResponse
    {
        $updated = $this->categoryService->updateCategory($id, $request->validated());

        if (! $updated) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori gagal diperbarui atau tidak ditemukan',
            ], 404);
        }

        $category = $this->repository->findById($id);

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil diperbarui',
            'data' => new PostCategoryResource($category),
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $deleted = $this->categoryService->deleteCategory($id);

        if (! $deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori gagal dihapus atau tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil dihapus',
        ]);
    }
}
