<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasCourseAssignment
{
    /**
     * courseAssignment
     *
     * @return BelongsTo
     */
    public function courseAssignment(): BelongsTo;
}
