<?php

namespace App\Observers;

use App\Models\TransactionHistory;
use Faker\Provider\Uuid;

class TransactionHistoryObserver
{
    /**
     * Handle the TransactionHistory "created" event.
     */
    public function creating(TransactionHistory $transactionHistory): void
    {
        $transactionHistory->id = Uuid::uuid();
    }

    /**
     * Handle the TransactionHistory "created" event.
     */
    public function created(TransactionHistory $transactionHistory): void
    {
        //
    }

    /**
     * Handle the TransactionHistory "updated" event.
     */
    public function updated(TransactionHistory $transactionHistory): void
    {
        //
    }

    /**
     * Handle the TransactionHistory "deleted" event.
     */
    public function deleted(TransactionHistory $transactionHistory): void
    {
        //
    }

    /**
     * Handle the TransactionHistory "restored" event.
     */
    public function restored(TransactionHistory $transactionHistory): void
    {
        //
    }

    /**
     * Handle the TransactionHistory "force deleted" event.
     */
    public function forceDeleted(TransactionHistory $transactionHistory): void
    {
        //
    }
}
