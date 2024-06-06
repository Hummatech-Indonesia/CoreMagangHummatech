<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasStudentCoursePositions {
    /**
     * studentCoursePositions
     *
     * @return HasMany
     */
    public function studentCoursePositions(): HasMany;
}
