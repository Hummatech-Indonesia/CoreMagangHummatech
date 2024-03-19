<?php

namespace App\Contracts\Interfaces\Eloquent;

interface WhereSingleInterface
{
    /**
     * Get the specified data from database and eloquent.
     *
     * @param int $id The ID of the data to get.
     * @return mixed
     */
    public function getId(int $id): mixed;
}
