<?php

namespace App\Shared\Enums;

enum FamilyRelation: string
{
    case Head = 'KEPALA KELUARGA';
    case Wife = 'ISTRI';
    case Child = 'ANAK';
    case Grandchild = 'CUCU';
    case Parent = 'ORANG TUA';
    case InLaw = 'MERTUA';
    case Other = 'FAMILI LAIN';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        $options = [];
        foreach (self::cases() as $case) {
            $options[$case->value] = ucwords(strtolower($case->value));
        }

        return $options;
    }
}
