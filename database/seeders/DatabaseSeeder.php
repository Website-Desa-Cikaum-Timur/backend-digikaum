<?php

namespace Database\Seeders;

use App\Models\User;
use App\Shared\Enums\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            ShieldSeeder::class,
        ]);

        $superAdmin = User::updateOrCreate(
            ['email' => 'admin@digikaum.test'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $superAdmin->syncRoles([UserRole::SuperAdmin->value]);

        $editor = User::updateOrCreate(
            ['email' => 'editor@digikaum.test'],
            [
                'name' => 'Editor Konten',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $editor->syncRoles([UserRole::EditorKonten->value]);

        $ppidOfficer = User::updateOrCreate(
            ['email' => 'ppid@digikaum.test'],
            [
                'name' => 'PPID Officer',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $ppidOfficer->syncRoles([UserRole::PpidOfficer->value]);
    }
}
