<?php

namespace App\Enum;

enum StatusHummaTeamEnum : string
{
    case PENDING = 'pending';
    case ACTIVE = 'active';
    case EXPIRED = 'expired';
    case SUCCESS = 'success';

    public function label()
    {
        return match ($this) {
            self::PENDING => 'Belum aktif',
            self::ACTIVE => 'Aktif',
            self::EXPIRED => 'Tidak aktif',
            self::SUCCESS => 'Selesai',
        };
    }
    public function color()
    {
        return match ($this) {
            self::PENDING => 'warning',
            self::ACTIVE => 'success',
            self::EXPIRED => 'danger',
            self::SUCCESS => 'primary'
        };
    }
}
