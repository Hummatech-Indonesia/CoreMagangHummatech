<?php

namespace App\Enum;

enum StatusHummaTeamEnum : string
{
    case PENDING = 'pending';
    case ACTIVE = 'active';
    case EXPIRED = 'expired';

    public function label()
    {
        return match ($this) {
            self::PENDING => 'Belum aktif',
            self::ACTIVE => 'Aktif',
            self::EXPIRED => 'Tidak aktif',
        };
    }
    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'warning',
            self::ACTIVE => 'success',
            self::EXPIRED => 'danger',
        };
    }
}
