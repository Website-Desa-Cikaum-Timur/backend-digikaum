<?php

namespace App\Providers;

use App\Models\Official;
use App\Models\Organization;
use App\Observers\OfficialObserver;
use App\Observers\OrganizationObserver;
use App\Policies\RolePolicy;
use App\Repositories\Contracts\ComplaintRepositoryInterface;
use App\Repositories\Contracts\FamilyRepositoryInterface;
use App\Repositories\Contracts\GalleryRepositoryInterface;
use App\Repositories\Contracts\LocationRepositoryInterface;
use App\Repositories\Contracts\OfficialRepositoryInterface;
use App\Repositories\Contracts\OrganizationRepositoryInterface;
use App\Repositories\Contracts\PostCategoryRepositoryInterface;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\ResidentRepositoryInterface;
use App\Repositories\Eloquent\ComplaintRepository;
use App\Repositories\Eloquent\FamilyRepository;
use App\Repositories\Eloquent\GalleryRepository;
use App\Repositories\Eloquent\LocationRepository;
use App\Repositories\Eloquent\OfficialRepository;
use App\Repositories\Eloquent\OrganizationRepository;
use App\Repositories\Eloquent\PostCategoryRepository;
use App\Repositories\Eloquent\PostRepository;
use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\Eloquent\ResidentRepository;
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

        $this->app->bind(
            LocationRepositoryInterface::class,
            LocationRepository::class
        );

        $this->app->bind(
            ComplaintRepositoryInterface::class,
            ComplaintRepository::class
        );

        $this->app->bind(
            FamilyRepositoryInterface::class,
            FamilyRepository::class
        );

        $this->app->bind(
            ResidentRepositoryInterface::class,
            ResidentRepository::class
        );

        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->bind(
            GalleryRepositoryInterface::class,
            GalleryRepository::class
        );
    }

    public function boot(): void
    {
        Gate::before(function ($user, string $ability) {
            return $user->hasRole(UserRole::SuperAdmin->value) ? true : null;
        });

        Gate::policy(Role::class, RolePolicy::class);

        Organization::observe(OrganizationObserver::class);
        Official::observe(OfficialObserver::class);
    }
}
