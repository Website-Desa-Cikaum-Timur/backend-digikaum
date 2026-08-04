<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfficialRequest;
use App\Http\Requests\UpdateOfficialRequest;
use App\Http\Resources\Api\OfficialResource;
use App\Repositories\Contracts\OfficialRepositoryInterface;
use App\Services\OfficialService;
use Illuminate\Http\JsonResponse;

class OfficialController extends Controller
{
    public function __construct(
        private OfficialService $officialService,
        private OfficialRepositoryInterface $repository
    ) {}

    public function store(StoreOfficialRequest $request): JsonResponse
    {
        $official = $this->officialService->createOfficial(
            $request->validated(),
            $request->file('photo')
        );

        return response()->json([
            'success' => true,
            'message' => 'Pejabat berhasil ditambahkan',
            'data' => new OfficialResource($official),
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $official = $this->repository->findById($id);

        if (! $official) {
            return response()->json([
                'success' => false,
                'message' => 'Pejabat tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail pejabat berhasil diambil',
            'data' => new OfficialResource($official),
        ]);
    }

    public function update(UpdateOfficialRequest $request, string $id): JsonResponse
    {
        $updated = $this->officialService->updateOfficial(
            $id,
            $request->validated(),
            $request->file('photo')
        );

        if (! $updated) {
            return response()->json([
                'success' => false,
                'message' => 'Data pejabat gagal diperbarui atau tidak ditemukan',
            ], 404);
        }

        $official = $this->repository->findById($id);

        return response()->json([
            'success' => true,
            'message' => 'Data pejabat berhasil diperbarui',
            'data' => new OfficialResource($official),
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $deleted = $this->officialService->deleteOfficial($id);

        if (! $deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Data pejabat gagal dihapus atau tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data pejabat berhasil dihapus',
        ]);
    }
}
