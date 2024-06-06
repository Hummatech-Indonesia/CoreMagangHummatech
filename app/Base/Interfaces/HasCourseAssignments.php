<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasCourseAssignments
{
    /**
     * courseAssignments
     *
     * @return HasMany
     */
    public function courseAssignments(): HasMany;
}
