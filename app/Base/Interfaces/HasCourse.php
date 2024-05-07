<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasCourse {
    /**
     * course
     *
     * @return BelongsTo
     */
    public function course(): BelongsTo;
}
