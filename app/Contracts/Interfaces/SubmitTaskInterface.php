<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface SubmitTaskInterface extends StoreInterface, ShowInterface, UpdateInterface, DeleteInterface
{
    /**
     * getByAssignment
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getByAssignment(mixed $id): mixed;
}
