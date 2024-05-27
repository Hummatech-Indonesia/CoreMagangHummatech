<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface StudentTeamInterface extends GetInterface, StoreInterface, UpdateInterface, DeleteInterface
{
    public function where($parameter, $value): mixed;
    public function getTeamsByMentorId($mentor_id): mixed;

    /**
     *
     * delete by hummatask team id
     * @param mixed $id
     * @return mixed
     *
     */
    public function deleteByTeamId(mixed $id): mixed;
}
