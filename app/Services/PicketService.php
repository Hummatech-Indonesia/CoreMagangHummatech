<?php

namespace App\Services;

use App\Models\Picket;

class PicketService
{
    public function getSiswaIdByTimDanDayPicket($tim, $day_picket)
    {
        return Picket::where('tim', $tim)
                     ->where('day_picket', $day_picket)
                     ->pluck('student_id')
                     ->toArray();
    }
}
