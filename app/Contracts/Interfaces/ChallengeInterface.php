<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\WhereSingleInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface ChallengeInterface extends GetInterface, StoreInterface, DeleteInterface, UpdateInterface
{
    public function getUnsubmittedChallenges($mentor);
    public function whereMentor(mixed $id);
}
