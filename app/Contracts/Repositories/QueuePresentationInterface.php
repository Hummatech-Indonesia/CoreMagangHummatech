<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface QueuePresentationInterface extends UpdateInterface
{

    public function getQueueByDivision(int $divisionId);

}
