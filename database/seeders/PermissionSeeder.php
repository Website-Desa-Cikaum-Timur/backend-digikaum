<?php

namespace Database\Seeders;

use App\Shared\Enums\PermissionName;
use App\Shared\Enums\UserRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        foreach (PermissionName::cases() as $permission) {
            Permission::findOrCreate($permission->value, 'web');
        }

        foreach (UserRole::cases() as $userRole) {
            $role = Role::findByName($userRole->value, 'web');

            $permissionValues = array_map(
                fn (PermissionName $permission) => $permission->value,
                $userRole->permissions(),
            );

            $role->syncPermissions($permissionValues);
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
