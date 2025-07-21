<?php

namespace App\Services;

use Carbon\Carbon;

class AttendanceService
{
    public function isInTime($now, string $type, $max, $ruleToday): bool
    {
        $start = Carbon::parse($ruleToday->{$type . '_starts'});
        $end = Carbon::parse($ruleToday->{$type . '_ends'})->addMinutes($max ?? 15);

        return $now->between($start, $end);
    }
}
