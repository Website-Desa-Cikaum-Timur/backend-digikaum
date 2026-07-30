<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Http\Resources\Api\LocationResource;
use App\Repositories\Contracts\LocationRepositoryInterface;
use App\Services\LocationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct(
        private LocationService $locationService,
        private LocationRepositoryInterface $repository
    ) {}

    public function index(Request $request): JsonResponse
    {
        if ($request->has(['lat', 'lon', 'radius'])) {
            $locations = $this->repository->getLocationsWithinRadius(
                (float) $request->lat,
                (float) $request->lon,
                (float) $request->radius
            );
        } else {
            $locations = $this->repository->getActiveLocationsGeoJson();
        }

        return response()->json([
            'success' => true,
            'data' => LocationResource::collection($locations),
        ]);
    }

    public function store(StoreLocationRequest $request): JsonResponse
    {
        $location = $this->locationService->createLocation(
            $request->validated(),
            $request->file('photo')
        );

        $locationWithGeoJson = $this->repository->findByIdGeoJson($location->id);

        return response()->json([
            'success' => true,
            'message' => 'Titik lokasi spasial berhasil ditambahkan',
            'data' => new LocationResource($locationWithGeoJson),
        ], 201);
    }

    public function show(string $slug): JsonResponse
    {
        $location = $this->repository->findBySlugGeoJson($slug);

        if (! $location) {
            return response()->json([
                'success' => false,
                'message' => 'Titik lokasi tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new LocationResource($location),
        ]);
    }

    public function update(UpdateLocationRequest $request, string $id): JsonResponse
    {
        $updated = $this->locationService->updateLocation(
            $id,
            $request->validated(),
            $request->file('photo')
        );

        if (! $updated) {
            return response()->json([
                'success' => false,
                'message' => 'Titik lokasi gagal diperbarui atau tidak ditemukan',
            ], 404);
        }

        $location = $this->repository->findByIdGeoJson($id);

        return response()->json([
            'success' => true,
            'message' => 'Titik lokasi berhasil diperbarui',
            'data' => new LocationResource($location),
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $deleted = $this->locationService->deleteLocation($id);

        if (! $deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Titik lokasi gagal dihapus atau tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Titik lokasi beserta fotonya berhasil dihapus secara permanen',
        ]);
    }
}
