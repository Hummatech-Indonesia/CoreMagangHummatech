<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginationInterface;
use App\Contracts\Interfaces\Eloquent\SearchInterface;
use Illuminate\Http\Request;

interface AdminJournalInterface extends GetInterface, SearchInterface
{
    public function getByStatus(string $status) :mixed;
    public function NotFillin(Request $request):mixed;
}
