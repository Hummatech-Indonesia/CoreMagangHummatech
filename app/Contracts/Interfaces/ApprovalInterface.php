<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;

interface ApprovalInterface extends WhereInterface, UpdateInterface
{
    public function ListStudentOnline(): mixed;

    public function ListStudentOffline(): mixed;
}
