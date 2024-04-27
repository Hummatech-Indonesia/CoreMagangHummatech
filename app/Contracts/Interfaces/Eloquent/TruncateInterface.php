<?php

namespace App\Contracts\Interfaces\Eloquent;

interface TruncateInterface
{
    /**
     * Truncate table data
     *
     * @return mixed
     */
    public function truncate(): mixed;
}
