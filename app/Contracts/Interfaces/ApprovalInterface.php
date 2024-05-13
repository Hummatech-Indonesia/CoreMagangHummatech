<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;
use Illuminate\Http\Request;

interface ApprovalInterface extends WhereInterface, UpdateInterface
{
    public function ListStudentOnline(Request $request): mixed;


    public function ListStudentOffline(Request $request): mixed;
}
