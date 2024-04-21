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

    /**
     * Get Student Banned
     */
    public function getstudentbanned(): mixed;

    /**
     * Get Student Mentor Placement
     */

     public function getstudentmentorplacement(mixed $id): mixed;

     /**
      * Get Student Except Auth
      */
    public function getstudentoffexceptauth(mixed $id): mixed;

    /**
     * Get Student Division Placement
     */
    public function getstudentdivisionplacement(): mixed;

    /**
     * Pluck  collumn
     */
    public function pluck(mixed $column): mixed;

    /**
     * Get Edit Student Mentor Placement
     */
    public function geteditstudentmentorplacement(mixed $id): mixed;

    /**
     * Get Edit Student Division Placement
     */
    public function getstudentdivisionplacementedit(): mixed;
    public function whereStudentDivision(mixed $id):mixed;

}
