<?php

namespace App\Contracts\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasAttendanceDetails {
    /**
     * attendanceDetails
     *
     * @return HasMany
     */
    public function attendanceDetails(): HasMany;
}
