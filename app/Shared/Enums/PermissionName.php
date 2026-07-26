<?php

namespace App\Shared\Enums;

enum PermissionName: string
{
    case ViewBerita = 'view berita';
    case CreateBerita = 'create berita';
    case UpdateBerita = 'update berita';
    case DeleteBerita = 'delete berita';

    case ViewPpid = 'view ppid';
    case ManagePpid = 'manage ppid';

    case ManageUsers = 'manage users';
    case ManageRoles = 'manage roles';

    public function label(): string
    {
        return match ($this) {
            self::ViewBerita => 'Lihat Berita',
            self::CreateBerita => 'Buat Berita',
            self::UpdateBerita => 'Ubah Berita',
            self::DeleteBerita => 'Hapus Berita',
            self::ViewPpid => 'Lihat PPID',
            self::ManagePpid => 'Kelola PPID',
            self::ManageUsers => 'Kelola Pengguna',
            self::ManageRoles => 'Kelola Peran',
        };
    }
}
