<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface HummataskTeamMembersInterface extends StoreInterface, UpdateInterface
{
    public function getStudentByPresentation(mixed $data): mixed;
}