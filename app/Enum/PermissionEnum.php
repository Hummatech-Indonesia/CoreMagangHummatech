<?php

namespace App\Enum;

enum PermissionEnum :string
{
    case PERMISSION = 'permission';
    case SICK = 'sick';

    public function label()
    {
        return match ($this) {
            self::PERMISSION => 'izin',
            self::SICK => 'sakit',
        };
    }
    public function color(): string
    {
        return match ($this) {
            self::PERMISSION => 'warning',
            self::SICK => 'warning',
        };
    }
}
