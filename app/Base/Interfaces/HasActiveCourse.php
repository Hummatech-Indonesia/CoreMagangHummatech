<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasActiveCourse {
    /**
     * activeCourse
     *
     * @return BelongsTo
     */
    public function activeCourse(): BelongsTo;
}
