<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasSubCourses {
    /**
     * subCourses
     *
     * @return HasMany
     */
    public function subCourses(): HasMany;
}
