<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginationInterface;
use Illuminate\Http\Request;
use App\Contracts\Interfaces\Eloquent\SearchInterface;

interface AdminAttendanceInterface extends GetInterface
{
    public function search($internship, Request $request): mixed;
}
