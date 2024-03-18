<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasAttendance {
    /**
     * attendance
     *
     * @return BelongsTo
     */
    public function attendance(): BelongsTo;
}
