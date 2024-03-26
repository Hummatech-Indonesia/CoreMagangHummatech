<?php

namespace App\Enum;

enum TaskLevelEnum: string
{
    case EASY = 'easy';
    case NORMAL = 'normal';
    case HARD = 'hard';

    public function label(): string
    {
        return match ($this) {
            self::EASY => 'Mudah',
            self::NORMAL => 'Biasa',
            self::HARD => 'Sulit',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::EASY => 'success',
            self::NORMAL => 'warning',
            self::HARD => 'danger',
        };
    }
}
