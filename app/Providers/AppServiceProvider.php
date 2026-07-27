<?php

namespace App\Providers;

use App\Policies\RolePolicy;
use App\Repositories\Contracts\OfficialRepositoryInterface;
use App\Repositories\Contracts\OrganizationRepositoryInterface;
use App\Repositories\Contracts\PostCategoryRepositoryInterface;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Repositories\Eloquent\OfficialRepository;
use App\Repositories\Eloquent\OrganizationRepository;
use App\Repositories\Eloquent\PostCategoryRepository;
use App\Repositories\Eloquent\PostRepository;
use App\Shared\Enums\UserRole;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            PostCategoryRepositoryInterface::class,
            PostCategoryRepository::class
        );

        $this->app->bind(
            OrganizationRepositoryInterface::class,
            OrganizationRepository::class
        );

        $this->app->bind(
            OfficialRepositoryInterface::class,
            OfficialRepository::class
        );

        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
        );
    }

    public function boot(): void
    {
        Gate::before(function ($user, string $ability) {
            return $user->hasRole(UserRole::SuperAdmin->value) ? true : null;
        });

        Gate::policy(Role::class, RolePolicy::class);
    }
}
