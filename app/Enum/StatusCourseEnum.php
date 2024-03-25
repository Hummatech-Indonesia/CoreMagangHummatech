<?php

namespace App\Enum;

enum StatusCourseEnum :string
{
    case PAID = 'paid';
    case SUBCRIBE = 'subcribe';

    public function label()
    {
        return match ($this) {
            self::PAID => 'Berbayar',
            self::SUBCRIBE => 'Berlangganan',
        };
    }
}
