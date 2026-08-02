<?php

namespace App\Observers;

use App\Models\Official;
use Illuminate\Support\Facades\Cache;

class OfficialObserver
{
    public function saved(Official $official): void
    {
        Cache::forget('sotk_organizations_active');
    }

    public function deleted(Official $official): void
    {
        Cache::forget('sotk_organizations_active');
    }
}
