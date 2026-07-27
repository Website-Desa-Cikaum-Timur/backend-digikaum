<?php

namespace App\Repositories\Eloquent;

use App\Models\Official;
use App\Repositories\Contracts\OfficialRepositoryInterface;
use Illuminate\Support\Collection;

class OfficialRepository extends BaseRepository implements OfficialRepositoryInterface
{
    public function __construct(Official $model)
    {
        parent::__construct($model);
    }

    public function getActiveOfficialsByOrganization(string $organizationId): Collection
    {
        return $this->model
            ->where('organization_id', $organizationId)
            ->where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();
    }
}
