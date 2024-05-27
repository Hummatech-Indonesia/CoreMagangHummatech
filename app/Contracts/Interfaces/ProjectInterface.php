<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface ProjectInterface extends GetInterface, StoreInterface, UpdateInterface, DeleteInterface
{
    /**
     *
     * update by team id
     * @param mixed $id
     * @param array $data
     * @return mixed
     *
     */
    public function updateByTeamId(mixed $id, array $data): mixed;

    public function where($parameter, $value): mixed;
    public function accProject(mixed $id, array $data, $hummataskTeam): mixed;
    public function getProjectAccepted($id): mixed;
}
