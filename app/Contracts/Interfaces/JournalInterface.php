<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;

interface JournalInterface extends GetInterface , StoreInterface , UpdateInterface , DeleteInterface,WhereInterface , ShowInterface
{
    public function getjournal();
    public function whereStudent(mixed $id) :mixed;
    public function CountJournalFillin();
    public function CountJournalNotFillin();
    // public function getStats(): mixed;
}
