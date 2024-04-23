<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereSingleInterface;

interface TaskInterface extends GetInterface, StoreInterface, UpdateInterface, DeleteInterface, WhereSingleInterface
{
    /**
     * Filtering data by status
     *
     * @param string $filter Filtering status
     * @return mixed
     */
    public function filterByStatus(?string $filter): mixed;
    public function getUnsubmittedTasks();
    public function getTaskBySubcourse(int $id): mixed;
    public function whereSubCourse($subCourseId) : mixed;
}
