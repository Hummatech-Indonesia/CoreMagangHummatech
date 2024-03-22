<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;

interface StudentInterface extends GetInterface , StoreInterface , DeleteInterface , UpdateInterface, WhereInterface, ShowInterface
{
    /**
     * getByRfid
     *
     * @param  mixed $cardId
     * @return void
     */
    public function getByRfid(mixed $cardId);

    /**
     * listAttendance
     *
     * @return mixed
     */
    public function listAttendance(): mixed;

    /**
     * listStudent
     * @return mixed
     */
    public function listStudent(): mixed;

    /**
     * Sp
     */
    public function sp(mixed $id): mixed;

    /**
     * countStudentOffline
     */
    public function countStudentOffline(): mixed;

    /**
     * List Student Offline
     */
    public function listStudentOffline(): mixed;

    /**
     * List Student Offline
     */
    public function listStudentOnline(): mixed;
}
