<?php

namespace App\Repositories\Eloquent;

use App\Models\Organization;
use App\Repositories\Contracts\OrganizationRepositoryInterface;
use Illuminate\Support\Collection;

class OrganizationRepository extends BaseRepository implements OrganizationRepositoryInterface
{
    public function __construct(Organization $model)
    {
        parent::__construct($model);
    }

    public function getActiveOrganizationsWithOfficials(): Collection
    {
        return $this->model
            ->where('is_active', true)
            ->with(['officials' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('sort_order', 'asc');
            }])
            ->orderBy('name', 'asc')
            ->get();
    }
}
