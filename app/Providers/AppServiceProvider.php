<?php

namespace App\Providers;

use App\Policies\RolePolicy;
use App\Shared\Enums\UserRole;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::before(function ($user, string $ability) {
            return $user->hasRole(UserRole::SuperAdmin->value) ? true : null;
        });

        Gate::policy(Role::class, RolePolicy::class);
    }
}
