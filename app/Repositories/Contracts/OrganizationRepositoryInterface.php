<?php

namespace App\Repositories\Contracts;

use App\Shared\Contracts\RepositoryInterface;
use Illuminate\Support\Collection;

interface OrganizationRepositoryInterface extends RepositoryInterface
{
    /**
     * Mengambil organisasi aktif beserta pejabat aktif di dalamnya,
     * diurutkan berdasarkan sort_order pejabat.
     */
    public function getActiveOrganizationsWithOfficials(): Collection;
}
