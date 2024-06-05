<?php

namespace App\Observers;

use App\Models\CourseAssignment;
use Faker\Provider\Uuid;

class CourseAssignmentObserver
{
    /**
     * Handle the CourseAssignment "creating" event.
     */
    public function creating(CourseAssignment $courseAssignment): void
    {
        $courseAssignment->id = Uuid::uuid();
    }

    /**
     * Handle the CourseAssignment "created" event.
     */
    public function created(CourseAssignment $courseAssignment): void
    {
        //
    }

    /**
     * Handle the CourseAssignment "updated" event.
     */
    public function updated(CourseAssignment $courseAssignment): void
    {
        //
    }

    /**
     * Handle the CourseAssignment "deleted" event.
     */
    public function deleted(CourseAssignment $courseAssignment): void
    {
        //
    }

    /**
     * Handle the CourseAssignment "restored" event.
     */
    public function restored(CourseAssignment $courseAssignment): void
    {
        //
    }

    /**
     * Handle the CourseAssignment "force deleted" event.
     */
    public function forceDeleted(CourseAssignment $courseAssignment): void
    {
        //
    }
}
