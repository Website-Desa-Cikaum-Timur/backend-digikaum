<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFamilyRequest;
use App\Http\Resources\Api\FamilyResource;
use App\Repositories\Contracts\FamilyRepositoryInterface;
use App\Services\DemographicService;
use App\Shared\Exceptions\DomainException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

class DemographicController extends Controller
{
    public function __construct(
        private DemographicService $demographicService,
        private FamilyRepositoryInterface $familyRepository
    ) {}

    public function store(StoreFamilyRequest $request): JsonResponse
    {
        try {
            $validated = $request->validated();

            $familyData = Arr::except($validated, ['head_resident']);
            $headResidentData = $validated['head_resident'];

            $family = $this->demographicService->registerNewFamilyWithHead($familyData, $headResidentData);

            return response()->json([
                'success' => true,
                'message' => 'Kartu Keluarga dan Kepala Keluarga berhasil diregistrasi.',
                'data' => new FamilyResource($family),
            ], 201);

        } catch (DomainException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
    }

    public function show(string $id): JsonResponse
    {
        $family = $this->familyRepository->findById($id);

        if (! $family) {
            return response()->json([
                'success' => false,
                'message' => 'Data Kartu Keluarga tidak ditemukan.',
            ], 404);
        }

        $family->load('residents');

        return response()->json([
            'success' => true,
            'data' => new FamilyResource($family),
        ]);
    }
}
