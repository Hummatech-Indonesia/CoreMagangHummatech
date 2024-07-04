<?php

namespace App;

enum StatusProjectEnum : string
{
    case PENDING = 'pending';
    case ACCEPTED = 'accepted';
    case SUCCESS = 'success';

    public function label()
    {
        return match ($this) {
            self::PENDING => 'menunggu',
            self::ACCEPTED => 'aktif',
            self::SUCCESS => 'Selesai',
        };
    }
    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'danger',
            self::ACCEPTED => 'success',
            self::SUCCESS => 'primary'
        };
    }
}
