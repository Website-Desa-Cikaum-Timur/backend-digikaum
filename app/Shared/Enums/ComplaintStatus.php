<?php

namespace App\Shared\Enums;

enum ComplaintStatus: string
{
    case Pending = 'pending';
    case Processing = 'processing';
    case Resolved = 'resolved';
    case Rejected = 'rejected';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        return [
            self::Pending->value => self::Pending->label(),
            self::Processing->value => self::Processing->label(),
            self::Resolved->value => self::Resolved->label(),
            self::Rejected->value => self::Rejected->label(),
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Menunggu Tindakan',
            self::Processing => 'Sedang Diproses',
            self::Resolved => 'Selesai',
            self::Rejected => 'Ditolak',
        };
    }

    public function isTerminal(): bool
    {
        return match ($this) {
            self::Resolved, self::Rejected => true,
            default => false,
        };
    }
}
