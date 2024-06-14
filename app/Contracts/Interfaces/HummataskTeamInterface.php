<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\SlugInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface HummataskTeamInterface extends GetInterface, StoreInterface, DeleteInterface, UpdateInterface, SlugInterface
{
    public function where($parameter, $value): mixed;
    public function WhereTeam(): mixed;

    /**
     * getByStudent
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getByStudent(mixed $id): mixed;

    /**
     * getTeamByRfidLeader
     *
     * @param  mixed $rfid
     * @return mixed
     */
    public function getTeamByRfidLeader(mixed $rfid): mixed;

    /**
     * getTeamByRfidMember
     *
     * @param  mixed $rfid
     * @return mixed
     */
    public function getTeamByRfidMember(mixed $rfid): mixed;
}
