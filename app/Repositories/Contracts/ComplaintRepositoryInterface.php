<?php

namespace App\Repositories\Contracts;

use App\Shared\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

interface ComplaintRepositoryInterface extends RepositoryInterface
{
    public function findByTrackingCode(string $code): ?Model;

    public function isTrackingCodeExists(string $code): bool;
}
