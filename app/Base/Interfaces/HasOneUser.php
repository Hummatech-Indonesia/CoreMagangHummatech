<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasOne;

interface HasOneUser {
    /**
     * hasOneUser
     *
     * @return HasOne
     */
    public function hasOneUser(): HasOne;
}
