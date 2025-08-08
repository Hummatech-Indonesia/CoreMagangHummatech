<?php

namespace App\Enum;

enum StatusPresenceEnum: string
{
    case MASUK = 'masuk';
    case IZIN = 'izin';
    case SAKIT = 'sakit';
    case ALPHA = 'alpha';

    public function color(): string
    {
        return match ($this) {
            self::MASUK => 'success',
            self::IZIN => 'warning',
            self::SAKIT => 'warning',
            self::ALPHA => 'danger',
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::MASUK => 'Masuk',
            self::IZIN => 'Izin',
            self::SAKIT => 'Sakit',
            self::ALPHA => 'Alpha',
        };
    }
}
