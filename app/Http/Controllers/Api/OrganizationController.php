<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Http\Resources\Api\OrganizationResource;
use App\Repositories\Contracts\OrganizationRepositoryInterface;
use App\Services\OrganizationService;
use Illuminate\Http\JsonResponse;

class OrganizationController extends Controller
{
    public function __construct(
        private OrganizationService $organizationService,
        private OrganizationRepositoryInterface $repository
    ) {}

    public function index(): JsonResponse
    {
        $organizations = $this->organizationService->getSotkHierarchy();

        return response()->json([
            'success' => true,
            'message' => 'Bagan SOTK berhasil diambil',
            'data' => OrganizationResource::collection($organizations),
        ]);
    }

    public function store(StoreOrganizationRequest $request): JsonResponse
    {
        $organization = $this->organizationService->createOrganization($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Organisasi berhasil ditambahkan',
            'data' => new OrganizationResource($organization),
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $organization = $this->repository->findById($id);

        if (! $organization) {
            return response()->json([
                'success' => false,
                'message' => 'Organisasi tidak ditemukan',
            ], 404);
        }

        $organization->load(['officials' => function ($query) {
            $query->orderBy('sort_order', 'asc');
        }]);

        return response()->json([
            'success' => true,
            'message' => 'Detail organisasi berhasil diambil',
            'data' => new OrganizationResource($organization),
        ]);
    }

    public function update(UpdateOrganizationRequest $request, string $id): JsonResponse
    {
        $updated = $this->organizationService->updateOrganization($id, $request->validated());

        if (! $updated) {
            return response()->json([
                'success' => false,
                'message' => 'Organisasi gagal diperbarui atau tidak ditemukan',
            ], 404);
        }

        $organization = $this->repository->findById($id);

        return response()->json([
            'success' => true,
            'message' => 'Organisasi berhasil diperbarui',
            'data' => new OrganizationResource($organization),
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $deleted = $this->organizationService->deleteOrganization($id);

        if (! $deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Organisasi gagal dihapus atau tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Organisasi berhasil dihapus',
        ]);
    }
}
