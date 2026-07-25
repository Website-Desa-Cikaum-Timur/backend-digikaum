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
}
