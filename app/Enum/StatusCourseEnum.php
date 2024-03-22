<?php

namespace App\Enum;

enum StatusCourseEnum :string
{
    case PAID = 'paid';
    case FREE = 'free';

    public function label()
    {
        return match ($this) {
            self::PAID => 'Berbayar',
            self::FREE => 'Gratis',
        };
    }
}
