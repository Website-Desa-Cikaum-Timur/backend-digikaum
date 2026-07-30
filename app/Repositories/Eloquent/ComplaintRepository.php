<?php

namespace App\Repositories\Eloquent;

use App\Models\Complaint;
use App\Repositories\Contracts\ComplaintRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ComplaintRepository extends BaseRepository implements ComplaintRepositoryInterface
{
    public function __construct(Complaint $model)
    {
        parent::__construct($model);
    }

    public function findByTrackingCode(string $code): ?Model
    {
        return $this->model->trackingCode($code)->first();
    }

    public function isTrackingCodeExists(string $code): bool
    {
        return $this->model->trackingCode($code)->exists();
    }
}
