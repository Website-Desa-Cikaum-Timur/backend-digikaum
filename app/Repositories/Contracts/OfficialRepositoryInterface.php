<?php

namespace App\Repositories\Contracts;

use App\Shared\Contracts\RepositoryInterface;
use Illuminate\Support\Collection;

interface OfficialRepositoryInterface extends RepositoryInterface
{
    /**
     * Mengambil daftar pejabat berdasarkan ID organisasi.
     */
    public function getActiveOfficialsByOrganization(string $organizationId): Collection;
}
