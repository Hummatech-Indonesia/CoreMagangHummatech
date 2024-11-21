<?php

namespace App\Enum;

enum ProjectAcceptStatus: string
{

    case ACCEPT = 'accept';
    case REJECTED = 'rejected';
    case WAITING = 'waiting';

    public function label(): string
    {
        return match ($this) {
            self::ACCEPT => 'Diterima',
            self::REJECTED => 'Ditolak',
            self::WAITING => 'Menunggu'
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::ACCEPT => 'bg-light-success text-success',
            self::REJECTED => 'bg-light-danger text-danger',
            self::WAITING => 'bg-light-warning text-warning'
        };
    }
}
