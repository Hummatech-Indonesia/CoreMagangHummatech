<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface ProjectInterface extends GetInterface, StoreInterface, UpdateInterface, DeleteInterface
{
    public function where($parameter, $value): mixed;
    public function accProject(mixed $id, array $data, $hummataskTeam): mixed;
    public function getProjectAccepted($id): mixed;
}
