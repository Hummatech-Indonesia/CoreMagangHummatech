<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;
use Illuminate\Http\Request;

interface JournalInterface extends GetInterface , StoreInterface , UpdateInterface , DeleteInterface,WhereInterface , ShowInterface
{
    /**
     * get by students
     *
     * @param  mixed $request
     * @return mixed
     */
    public function getByStudents(Request $request): mixed;

    /**
     * get student by student ids
     * @param array
     * @return mixed
     */
    public function getByStudentIds(array $student_ids): mixed;

    public function getjournal();
    public function whereStudent(mixed $id) :mixed;
    public function CountJournalFillin();
    public function CountJournalNotFillin();

    public function whereStudentAndDate($studentId, $date);

    public function search(Request $request): mixed;
}
