<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\Whereterface;

interface MentorDivisionInterface extends GetInterface, StoreInterface , Whereterface, DeleteInterface
{
    /**
     * Get mentor by id
     */
    public function whereMentor($id):mixed;
}
