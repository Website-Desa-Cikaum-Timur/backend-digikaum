<?php

namespace App\Services;

use App\Repositories\Contracts\ComplaintRepositoryInterface;
use App\Shared\Enums\ComplaintStatus;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ComplaintService
{
    public function __construct(
        private ComplaintRepositoryInterface $repository
    ) {}

    public function submitComplaint(array $data, ?UploadedFile $evidence = null)
    {
        $data['tracking_code'] = $this->generateUniqueTrackingCode();
        $data['slug'] = Str::slug($data['title'] . '-' . Str::random(6));

        $data['status'] = ComplaintStatus::Pending->value;

        return DB::transaction(function () use ($data, $evidence) {
            $complaint = $this->repository->create($data);

            if ($evidence) {
                $complaint->addMedia($evidence)->toMediaCollection('complaint_evidences');
            }

            return $complaint;
        });
    }

    public function updateComplaintStatus(string $id, ComplaintStatus $newStatus): bool
    {
        $complaint = $this->repository->findById($id);

        if (! $complaint) {
            return false;
        }

        if ($complaint->status->isTerminal()) {
            throw new \Exception('Aduan yang sudah Selesai atau Ditolak tidak dapat diubah statusnya.');
        }

        return $this->repository->update($id, [
            'status' => $newStatus->value,
        ]);
    }

    private function generateUniqueTrackingCode(): string
    {
        do {
            $date = date('Ymd');
            $randomString = strtoupper(Str::random(4));
            $code = "CMP-{$date}-{$randomString}";
        } while ($this->repository->isTrackingCodeExists($code));

        return $code;
    }
}
