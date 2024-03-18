<?php

namespace App\Observers;

use App\Models\AttendanceRule;
use Faker\Provider\Uuid;

class AttendanceRuleObserver
{

    /**
     * Handle the AttendanceRule "creating" event.
     *
     * @param  \App\Models\AttendanceRule  $attendanceRule
     * @return void
     */
    public function creating(AttendanceRule $attendanceRule)
    {
        $attendanceRule->id = Uuid::uuid();
    }

    /**
     * Handle the AttendanceRule "created" event.
     */
    public function created(AttendanceRule $attendanceRule): void
    {
        //
    }

    /**
     * Handle the AttendanceRule "updated" event.
     */
    public function updated(AttendanceRule $attendanceRule): void
    {
        //
    }

    /**
     * Handle the AttendanceRule "deleted" event.
     */
    public function deleted(AttendanceRule $attendanceRule): void
    {
        //
    }

    /**
     * Handle the AttendanceRule "restored" event.
     */
    public function restored(AttendanceRule $attendanceRule): void
    {
        //
    }

    /**
     * Handle the AttendanceRule "force deleted" event.
     */
    public function forceDeleted(AttendanceRule $attendanceRule): void
    {
        //
    }
}
