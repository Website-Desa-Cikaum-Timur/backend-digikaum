<?php

namespace App\Repositories\Eloquent;

use App\Models\Resident;
use App\Repositories\Contracts\ResidentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ResidentRepository extends BaseRepository implements ResidentRepositoryInterface
{
    public function __construct(Resident $model)
    {
        parent::__construct($model);
    }

    public function findByNik(string $nik): ?Model
    {
        return $this->model->where('nik', $nik)->first();
    }

    public function isNikExists(string $nik): bool
    {
        return $this->model->where('nik', $nik)->exists();
    }
}
