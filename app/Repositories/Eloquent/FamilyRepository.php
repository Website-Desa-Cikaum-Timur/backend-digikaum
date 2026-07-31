<?php

namespace App\Repositories\Eloquent;

use App\Models\Family;
use App\Repositories\Contracts\FamilyRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FamilyRepository extends BaseRepository implements FamilyRepositoryInterface
{
    public function __construct(Family $model)
    {
        parent::__construct($model);
    }

    public function findByKkNumber(string $kkNumber): ?Model
    {
        return $this->model->where('kk_number', $kkNumber)->first();
    }

    public function isKkNumberExists(string $kkNumber): bool
    {
        return $this->model->where('kk_number', $kkNumber)->exists();
    }
}
