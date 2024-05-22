<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\StoreInterface;

interface StudentSubCourseInterface extends StoreInterface
{
    /**
     *
     * get by sub course
     * @return Mixed
     *
     */
    public function getBySubCourse(mixed $id): mixed;
}
