<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasOne;

interface HasOneCourseAssignment
{
    /**
     * courseAssignment
     *
     * @return HasOne
     */
    public function courseAssignment(): HasOne;
}
