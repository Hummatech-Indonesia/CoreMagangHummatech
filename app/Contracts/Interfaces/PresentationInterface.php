<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface PresentationInterface extends GetInterface, StoreInterface, UpdateInterface, DeleteInterface
{
    public function whereStatus(mixed $status): mixed;
    public function GetToday(): mixed;
    public function deleteAll(): mixed;
    public function GetPresentations(mixed $id):mixed;
}
