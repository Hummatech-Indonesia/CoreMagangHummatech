<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;

interface StudentInterface extends GetInterface , StoreInterface , DeleteInterface , UpdateInterface, WhereInterface
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



    public function whereNotIn(mixed $id):mixed;
}
