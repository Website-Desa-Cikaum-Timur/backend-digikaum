<?php

namespace App\Repositories\Contracts;

use App\Shared\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

interface ResidentRepositoryInterface extends RepositoryInterface
{
    public function findByNik(string $nik): ?Model;

    public function isNikExists(string $nik): bool;
}
