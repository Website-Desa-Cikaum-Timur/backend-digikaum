<?php

namespace App\Observers;

use App\Models\Organization;
use Illuminate\Support\Facades\Cache;

class OrganizationObserver
{
    public function saved(Organization $organization): void
    {
        Cache::forget('sotk_organizations_active');
    }

    public function deleted(Organization $organization): void
    {
        Cache::forget('sotk_organizations_active');
    }
}
