<?php

namespace App\Contracts\Interfaces\Eloquent;

interface GetWhereInterface
{
    /**
     * show
     *
     * @param  mixed $id
     * @return mixed
     */
    public function GetWhere(mixed $id): mixed;
}
