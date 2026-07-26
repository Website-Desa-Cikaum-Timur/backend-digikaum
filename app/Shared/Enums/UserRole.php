<?php

namespace App\Shared\Enums;

enum UserRole: string
{
    case SuperAdmin = 'super-admin';
    case EditorKonten = 'editor-konten';
    case PpidOfficer = 'ppid-officer';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        return [
            self::SuperAdmin->value => 'Super Admin',
            self::EditorKonten->value => 'Editor Konten',
            self::PpidOfficer->value => 'PPID Officer',
        ];
    }

    public function permissions(): array
    {
        return match ($this) {
            self::SuperAdmin => [],
            self::EditorKonten => [
                PermissionName::ViewBerita,
                PermissionName::CreateBerita,
                PermissionName::UpdateBerita,
                PermissionName::DeleteBerita,
            ],
            self::PpidOfficer => [
                PermissionName::ViewPpid,
                PermissionName::ManagePpid,
            ],
        };
    }
}
