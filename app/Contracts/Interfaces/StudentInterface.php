<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;
use Illuminate\Http\Request;

interface StudentInterface extends GetInterface , StoreInterface , DeleteInterface , UpdateInterface, WhereInterface, ShowInterface
{

    /**
     *
     * @param mixed $id
     * @return mixed
     *
     */
    public function getAttendanceByDivision(mixed $id): mixed;

    public function countActiveOflline():mixed;
    public function countPending():mixed;
    public function countDecline():mixed;
    /**
     * Method countActiveOnlineStudents
     *
     * @return mixed
     */
    public function countActiveOnlineStudents():mixed;
    /**
     * Method countActiveOfflineStudents
     *
     * @return mixed
     */
    public function countActiveOfflineStudents():mixed;
    /**
     * Method countDeactiveStudents
     *
     * @return mixed
     */
    public function countDeactiveStudents():mixed;


    /**
     * getByRfid
     *
     * @param  mixed $cardId
     * @return void
     */
    public function getByRfid(mixed $cardId);

    public function getApiStudent() :mixed;

    /**
     * listAttendance
     *
     * @param  mixed $request
     * @return mixed
     */
    public function listAttendance(Request $request): mixed;

    /**
     * listOfflineAttendance
     *
     * @param  mixed $request
     * @return mixed
     */
    public function listOfflineAttendance(Request $request): mixed;
    public function studentOfflineAttendance(Request $request): mixed;

    /**
     * listStudent
     * @return mixed
     */
    public function listStudent(Request $request): mixed;

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
    public function listStudentOffline(Request $request): mixed;
    public function ListAlumni(Request $request): mixed;


    /**
     * List Student Offline
     */
    public function listStudentOnline(Request $request): mixed;

    /**
     * Get Student Banned
     */
    public function getstudentbanned(Request $request): mixed;

    /**
     * Get Student Banned
     */
    public function getstudentdeclined(Request $request): mixed;

    /**
     * Get Student Mentor Placement
     */

     public function getstudentmentorplacement(mixed $id,Request $request): mixed;

     /**
      * Get Student Except Auth
      */
    public function getstudentoffexceptauth(mixed $id): mixed;

    /**
     * Get Student Division Placement
     */
    public function getstudentdivisionplacement(Request $request): mixed;

    /**
     * Pluck  collumn
     */
    public function pluck(mixed $column): mixed;

    /**
     * Get Edit Student Mentor Placement
     */
    public function geteditstudentmentorplacement(mixed $id, Request $request): mixed;

    /**
     * Get Edit Student Division Placement
     */
    public function getstudentdivisionplacementedit(Request $request): mixed;
    public function whereStudentDivision(mixed $id, Request $request): mixed;

    public function whereRfidNull(Request $request): mixed;
    public function listRfid(Request $request): mixed;

    /**
     * getStudentAccepted
     *
     * @return mixed
     */
    public function getStudentAccepted(): mixed;

}
