<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\SearchInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface PermissionInterface extends GetInterface, StoreInterface, UpdateInterface, DeleteInterface, ShowInterface, SearchInterface
{

    /**
     * getByStudent
     *
     * @param  mixed $studentId
     * @return mixed
     */
    public function getByStudent(mixed $studentId): mixed;

    /**
     * getByStatus
     *
     * @param  mixed $status
     * @return mixed
     */
    public function getByStatus(string $status): mixed;
}
