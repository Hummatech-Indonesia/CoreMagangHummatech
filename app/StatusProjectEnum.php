<?php

namespace App;

enum StatusProjectEnum : string
{
    case PENDING = 'pending';
    case ACCEPTED = 'accepted';

    public function label()
    {
        return match ($this) {
            self::PENDING => 'menunggu',
            self::ACCEPTED => 'disetujui',
        };
    }
    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'warning',
            self::ACCEPTED => 'success',
        };
    }
}
