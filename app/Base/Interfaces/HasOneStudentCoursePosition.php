<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasOne;

interface HasOneStudentCoursePosition {

    /**
     *
     * student course position
     * @return HasOne
     *
     */
    public function studentCoursePosition(): HasOne;
}
