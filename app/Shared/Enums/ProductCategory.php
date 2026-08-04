<?php

namespace App\Shared\Enums;

enum ProductCategory: string
{
    case Kuliner = 'kuliner';
    case Kerajinan = 'kerajinan';
    case Pertanian = 'pertanian';
    case Jasa = 'jasa';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        return [
            self::Kuliner->value => 'Makanan & Minuman',
            self::Kerajinan->value => 'Kerajinan Tangan',
            self::Pertanian->value => 'Pertanian & Peternakan',
            self::Jasa->value => 'Jasa & Lainnya',
        ];
    }
}
