<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\StoreInterface;

interface ActiveCourseInterface extends StoreInterface
{
    /**
     * @param mixed $id
     * @return mixed
     */
    public function getByStudent(mixed $id): mixed;
}
