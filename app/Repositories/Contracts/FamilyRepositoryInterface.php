<?php

namespace App\Repositories\Contracts;

use App\Shared\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

interface FamilyRepositoryInterface extends RepositoryInterface
{
    public function findByKkNumber(string $kkNumber): ?Model;

    public function isKkNumberExists(string $kkNumber): bool;
}
