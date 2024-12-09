<?php

namespace App\Enum;

enum StatusCategoryPresentationEnum : string
{
    case ONLINE = 'online';
    case OFFLINE = 'offline';
    public function label(): string
    {
        return match ($this) {
            self::ONLINE => 'Presentasi Online',
            self::OFFLINE => 'Presentasi Offline',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::ONLINE => 'success',
            self::OFFLINE => 'muted',
        };
    }
}
