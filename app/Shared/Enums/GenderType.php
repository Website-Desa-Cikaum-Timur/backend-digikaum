<?php

namespace App\Shared\Enums;

enum GenderType: string
{
    case Male = 'LAKI-LAKI';
    case Female = 'PEREMPUAN';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        return [
            self::Male->value => 'Laki-Laki',
            self::Female->value => 'Perempuan',
        ];
    }
}
