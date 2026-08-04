<?php

namespace App\Shared\Enums;

enum GalleryCategory: string
{
    case Kegiatan = 'kegiatan';
    case Pembangunan = 'pembangunan';
    case Alam = 'alam';
    case Budaya = 'budaya';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        return [
            self::Kegiatan->value => 'Kegiatan Warga',
            self::Pembangunan->value => 'Pembangunan',
            self::Alam->value => 'Alam & Potensi',
            self::Budaya->value => 'Seni & Budaya',
        ];
    }
}
