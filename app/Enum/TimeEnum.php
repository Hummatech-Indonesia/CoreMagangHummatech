<?php

namespace App\Enum;

enum TimeEnum :string
{
    case MORNING = 'morning';
    case AFTERNOON = 'afternoon';

    public function label()
    {
        return match ($this) {
            self::MORNING => 'Pagi',
            self::AFTERNOON => 'Sore',
        };
    }
}

