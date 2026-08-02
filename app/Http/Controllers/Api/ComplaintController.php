<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintStatusRequest;
use App\Http\Resources\Api\ComplaintResource;
use App\Repositories\Contracts\ComplaintRepositoryInterface;
use App\Services\ComplaintService;
use App\Shared\Enums\ComplaintStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ComplaintController extends Controller
{
    public function __construct(
        private readonly ComplaintService $complaintService,
        private readonly ComplaintRepositoryInterface $repository
    ) {}

    public function index(): AnonymousResourceCollection
    {
        $complaints = $this->repository->paginate(15);

        return ComplaintResource::collection($complaints);
    }

    public function store(StoreComplaintRequest $request): JsonResponse
    {
        $complaint = $this->complaintService->submitComplaint(
            $request->validated(),
            $request->file('evidence')
        );

        return response()->json([
            'success' => true,
            'message' => 'Aduan berhasil dikirim. Simpan kode resi Anda untuk pelacakan.',
            'data' => new ComplaintResource($complaint),
        ], 201);
    }

    public function track(string $trackingCode): JsonResponse
    {
        $complaint = $this->repository->findByTrackingCode($trackingCode);

        if (! $complaint) {
            return response()->json([
                'success' => false,
                'message' => 'Kode resi pengaduan tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new ComplaintResource($complaint),
        ]);
    }

    public function updateStatus(UpdateComplaintStatusRequest $request, string $id): JsonResponse
    {
        try {
            $statusEnum = ComplaintStatus::from($request->status);

            $updated = $this->complaintService->updateComplaintStatus($id, $statusEnum);

            if (! $updated) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data pengaduan tidak ditemukan.',
                ], 404);
            }

            $complaint = $this->repository->findById($id);

            return response()->json([
                'success' => true,
                'message' => 'Status pengaduan berhasil diperbarui.',
                'data' => new ComplaintResource($complaint),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
    }
}
