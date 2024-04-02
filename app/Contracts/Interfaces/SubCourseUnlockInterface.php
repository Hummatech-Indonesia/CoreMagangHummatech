<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CountInterface;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface SubCourseUnlockInterface extends GetInterface, StoreInterface, UpdateInterface, DeleteInterface, CountInterface
{
    /**
     * Get All Course Based on User
     *
     * @param mixed $subCourse
     * @param mixed $userId
     * @param string $search
     * @return mixed
     */
    public function getCourseByUser(mixed $subCourse, mixed $userId, ?string $search): mixed;
}
