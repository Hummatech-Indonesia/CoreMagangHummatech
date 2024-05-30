<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasOne;

interface HasOneStudentSubCoursePosition {

    /**
     *
     * student sub course position
     * @return HasOne
     *
     */
    public function studentSubCoursePosition(): HasOne;
}
