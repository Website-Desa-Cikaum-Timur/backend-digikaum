<?php

namespace App\Shared\Enums;

enum PublicationStatus: string
{
    case Draft = 'draft';
    case Published = 'published';
    case Archived = 'archived';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        return [
            self::Draft->value => 'Draft',
            self::Published->value => 'Published',
            self::Archived->value => 'Archived',
        ];
    }

    public function isPublished(): bool
    {
        return $this === self::Published;
    }
}
