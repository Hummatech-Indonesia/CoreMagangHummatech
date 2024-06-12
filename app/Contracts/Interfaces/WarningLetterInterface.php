<?php
namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\SearchInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Models\WarningLetter;

interface WarningLetterInterface extends GetInterface , StoreInterface , DeleteInterface , ShowInterface, SearchInterface
{
    public function findByStudentIdAndStatus($studentId, $status): ?WarningLetter;

}
