<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Http\Resources\Api\GalleryResource;
use App\Repositories\Contracts\GalleryRepositoryInterface;
use App\Services\GalleryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GalleryController extends Controller
{
    public function __construct(
        private GalleryService $galleryService,
        private GalleryRepositoryInterface $repository
    ) {}

    public function index(Request $request): AnonymousResourceCollection
    {
        $galleries = $this->repository->getPublicGalleries(
            perPage: $request->query('per_page', 12),
            category: $request->query('category'),
            year: $request->query('year')
        );

        return GalleryResource::collection($galleries);
    }

    public function availableYears(): JsonResponse
    {
        $years = $this->repository->getAvailableYears();

        return response()->json([
            'success' => true,
            'message' => 'Daftar tahun galeri berhasil diambil',
            'data' => $years,
        ]);
    }

    public function store(StoreGalleryRequest $request): JsonResponse
    {
        $gallery = $this->galleryService->createGallery(
            $request->validated(),
            $request->file('image')
        );

        return response()->json([
            'success' => true,
            'message' => 'Foto galeri berhasil ditambahkan',
            'data' => new GalleryResource($gallery),
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $gallery = $this->repository->findById($id);

        if (! $gallery) {
            return response()->json([
                'success' => false,
                'message' => 'Foto galeri tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new GalleryResource($gallery),
        ]);
    }

    public function update(UpdateGalleryRequest $request, string $id): JsonResponse
    {
        $updated = $this->galleryService->updateGallery(
            $id,
            $request->validated(),
            $request->file('image')
        );

        if (! $updated) {
            return response()->json([
                'success' => false,
                'message' => 'Foto galeri gagal diperbarui atau tidak ditemukan',
            ], 404);
        }

        $gallery = $this->repository->findById($id);

        return response()->json([
            'success' => true,
            'message' => 'Foto galeri berhasil diperbarui',
            'data' => new GalleryResource($gallery),
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $deleted = $this->galleryService->deleteGallery($id);

        if (! $deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Foto galeri gagal dihapus atau tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Foto galeri berhasil dihapus',
        ]);
    }
}
