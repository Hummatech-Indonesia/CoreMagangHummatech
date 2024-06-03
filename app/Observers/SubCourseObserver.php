<?php

namespace App\Observers;

use App\Models\SubCourse;
use Faker\Provider\Uuid;

class SubCourseObserver
{
    /**
     * Handle the SubCourse "creating" event.
     */
    public function creating(SubCourse $subCourse): void
    {
        $subCourse->id = Uuid::uuid();
    }

    /**
     * Handle the SubCourse "created" event.
     */
    public function created(SubCourse $subCourse): void
    {
        //
    }

    /**
     * Handle the SubCourse "updated" event.
     */
    public function updated(SubCourse $subCourse): void
    {
        //
    }

    /**
     * Handle the SubCourse "deleted" event.
     */
    public function deleted(SubCourse $subCourse): void
    {
        //
    }

    /**
     * Handle the SubCourse "restored" event.
     */
    public function restored(SubCourse $subCourse): void
    {
        //
    }

    /**
     * Handle the SubCourse "force deleted" event.
     */
    public function forceDeleted(SubCourse $subCourse): void
    {
        //
    }
}
