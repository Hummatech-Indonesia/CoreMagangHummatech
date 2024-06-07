<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface CourseAssignmentInterface extends StoreInterface, DeleteInterface, UpdateInterface, ShowInterface
{
    /**
     * getByCourse
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getByCourse(mixed $id): mixed;
}
