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
    /**
     * get student by student ids
     * @param array
     * @return mixed
     */
    public function getByStudents(array $student_ids): mixed;

    public function getjournal();
    public function whereStudent(mixed $id) :mixed;
    public function CountJournalFillin();
    public function CountJournalNotFillin();

    /**
     * get by student offline
     * @return mixed
     */
    public function getByStudentOffline(): mixed;

    /**
     * get by student online
     * @return mixed
     */
    public function getByStudentOnline(): mixed;
    // public function getStats(): mixed;
}
