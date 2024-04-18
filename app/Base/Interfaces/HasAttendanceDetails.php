<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasAttendanceDetails {
    /**
     * attendanceDetails
     *
     * @return HasMany
     */
    public function attendanceDetails(): HasMany;
}
