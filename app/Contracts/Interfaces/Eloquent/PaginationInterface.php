<?php

namespace App\Contracts\Interfaces\Eloquent;

interface PaginationInterface
{
    /**
     * Paginate the given query into a simple paginator.
     *
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null): mixed;
}
