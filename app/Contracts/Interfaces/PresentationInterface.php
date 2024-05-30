<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use Illuminate\Http\Request;

interface PresentationInterface extends GetInterface, StoreInterface, UpdateInterface, DeleteInterface
{
    public function whereStatus(mixed $status): mixed;
    public function GetToday(): mixed;
    public function deleteAll(): mixed;
    public function GetPresentations(mixed $id):mixed;
    public function where($parameter, $value): mixed;
    public function getByHummataskTeamId(): mixed;
    public function countMonthlyPresentationsByTeamId(int $teamId): int;
    public function getMonthlyPresentationsByStudentId(int $studentId): mixed;
    public function getPresentationsByStudentId(int $studentId);
    public function getPresentationsByTeam(mixed $id):mixed;
    public function GetPresentationByMentor(mixed $id, Request $request): mixed;

}
