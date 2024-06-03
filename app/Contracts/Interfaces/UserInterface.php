<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\GetWhereInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;

interface UserInterface extends GetInterface, StoreInterface, GetWhereInterface, UpdateInterface, DeleteInterface
{
    /**
     * Add course to subcribed user
     *
     * @param mixed $course
     * @return mixed
     */
    public function addCourseToSubcribedUser(int $course): void;

    /**
     * Add course to subcribed user
     *
     * @param mixed $courseId
     * @param mixed $subCourseId
     * @return mixed
     */
    public function addSubCourseToSubcribedUser(int $courseId, mixed $subCourseId): void;
    public function where(string $string, mixed $id): mixed;
}
