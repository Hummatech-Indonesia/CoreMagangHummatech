<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface CategoryBoardInterface extends GetInterface, StoreInterface, UpdateInterface, DeleteInterface,ShowInterface
{
        public function getByHummataskTeamId(int $teamId): mixed;
        public function getByStatus(mixed $id, $team):mixed;


}
