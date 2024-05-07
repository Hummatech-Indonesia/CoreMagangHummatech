<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasActiveCourses {
    /**
     * activeCourses
     *
     * @return HasMany
     */
    public function activeCourses(): HasMany;
}
