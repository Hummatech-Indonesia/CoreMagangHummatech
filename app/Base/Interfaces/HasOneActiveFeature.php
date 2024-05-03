<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasOne;

interface HasOneActiveFeature {

    /**
     * activeFeature
     *
     * @return HasOne
     */
    public function activeFeature(): HasOne;
}
