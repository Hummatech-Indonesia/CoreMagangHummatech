<?php

namespace App\Observers;

use App\Models\SubmitTask;
use Faker\Provider\Uuid;

class SubmitTaskObserver
{
    /**
     * Handle the SubmitTask "creating" event.
     */
    public function creating(SubmitTask $submitTask): void
    {
        $submitTask->id = Uuid::uuid();
    }

    /**
     * Handle the SubmitTask "created" event.
     */
    public function created(SubmitTask $submitTask): void
    {
        //
    }

    /**
     * Handle the SubmitTask "updated" event.
     */
    public function updated(SubmitTask $submitTask): void
    {
        //
    }

    /**
     * Handle the SubmitTask "deleted" event.
     */
    public function deleted(SubmitTask $submitTask): void
    {
        //
    }

    /**
     * Handle the SubmitTask "restored" event.
     */
    public function restored(SubmitTask $submitTask): void
    {
        //
    }

    /**
     * Handle the SubmitTask "force deleted" event.
     */
    public function forceDeleted(SubmitTask $submitTask): void
    {
        //
    }
}
