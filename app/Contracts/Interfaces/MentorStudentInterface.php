<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface MentorStudentInterface extends GetInterface, StoreInterface, UpdateInterface, DeleteInterface
{
    public function pluck($column);

    public function whereMentorStudent(mixed $id):mixed;
    public function whereStudent(mixed $id): mixed;
}
