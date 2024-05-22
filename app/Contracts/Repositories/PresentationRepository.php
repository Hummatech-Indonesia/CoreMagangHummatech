<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\CategoryBoardInterface;
use App\Contracts\Interfaces\CodeOfConductInterface;
use App\Contracts\Interfaces\PresentationInterface;
use App\Contracts\Interfaces\ThesisInterface;
use App\Models\CategoryBoard;
use App\Models\HummataskTeam;
use App\Models\Presentation;
use App\Models\Thesis;
use Carbon;
use DB;
use Flasher\Prime\Response\Presenter\PresenterInterface;

class PresentationRepository extends BaseRepository implements PresentationInterface
{
    public function __construct(Presentation $presentation)
    {
        $this->model = $presentation;
    }

    public function GetToday(): mixed
    {
        return $this->model->query()
            ->whereDate('created_at', Carbon::today())
            ->where('mentor_id' , auth()->user()->mentor->id)
            ->get();
    }

    public function deleteAll(): mixed
    {
        return $this->model->query()
            ->where('mentor_id', auth()->user()->mentor->id)
            ->whereDate('created_at' , now())
            ->delete();
    }

    public function get(): mixed
    {
        return $this->model->query()
            ->where('created_at', now())
            ->get();
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()
            ->where('id', $id)
            ->update($data);
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }
    /**
     * checkAttendanceStudent
     *
     * @param  mixed $studentId
     * @return void
     */


    public function delete(mixed $id): mixed
    {
        return $this->model->query()
            ->where('id', $id)
            ->delete();
    }

    public function whereStatus(mixed $status): mixed
    {
        return $this->model->query()
            ->where('status_presentation', $status)
            ->get();
    }

    public function GetPresentations(mixed $id): mixed
    {
        return $this->model->query()
            ->whereDate('created_at', Carbon::today())
            ->where('mentor_id' , $id)
            ->get();
    }

    public function GetPresentationByMentor(mixed $id): mixed
    {
        return $this->model->query()
        ->where('mentor_id', $id)
        // ->where('hummatask_team_id', $id)
        ->get();
    }

    public function getPresentationsByTeam(mixed $id):mixed
    {
        return $this->model->query()
        ->where('hummatask_team_id', $id)
        ->get();
    }

    public function where($parameter, $value): mixed
    {
        return $this->model->query()->where($parameter, $value)->get();
    }
    public function getByHummataskTeamId(): mixed
    {
        return $this->model->query()
            ->whereNotNull('hummatask_team_id')
            ->get();
    }

    public function countMonthlyPresentationsByTeamId(int $teamId): int
    {
        return $this->model->query()

        ->where('hummatask_team_id', $teamId)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
    }

    public function countMonthlyPresentationsByStudentId(int $studentId): array
    {

        $teams = HummataskTeam::with('student', 'division')->whereHas('student', function ($query) use ($studentId) {
        $query->where('id', $studentId);
    })->get();

    $monthlyPresentations = [];
    foreach ($teams as $team) {
        if ($team && $team->students) {
            foreach ($team->students as $student) {
                if ($student) {
                    $count = $this->model->where('hummatask_team_id', $team->id)
                                          ->whereMonth('created_at', Carbon::now()->month)
                                          ->whereYear('created_at', Carbon::now()->year)
                                          ->count();
                    $monthlyPresentations[] = [
                        'student_name' => $student->name,
                        'team_name' => $team->name,
                        'division_name' => $team->division->name,
                        'month' => Carbon::now()->translatedFormat('F'),
                        'presentation_count' => $count
                    ];
                }
            }
        }
    }

    return $monthlyPresentations;
    }


    public function getPresentationsByStudentId(int $studentId)
    {
        return $this->model->query()
            ->whereHas('hummataskTeam.student', function ($query) use ($studentId) {
                $query->where('id', $studentId);
            })
            ->get();
    }

}
