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
use Illuminate\Http\Request;

class PresentationRepository extends BaseRepository implements PresentationInterface
{
    public function __construct(Presentation $presentation)
    {
        $this->model = $presentation;
    }

    /**
     * get by team today
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getByTeamToday(mixed $id): mixed
    {
        return $this->model->query()
            ->where('hummatask_team_id', $id)
            ->whereDate('created_at', now())
            ->first();
    }

    /**
     * get by team
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getByTeam(mixed $id): mixed
    {
        return $this->model->query()
            ->where('hummatask_team_id', $id)
            ->get();
    }

    /**
     * getByDivision
     *
     * @param  mixed $request
     * @return mixed
     */
    public function getByDivision(Request $request): mixed
    {
        return $this->model->query()
            ->whereRelation('mentor', 'division_id', '=', $request->division_id)
            ->when($request->submission == "1", function ($query) {
                // note : 1 ketika presentasi sudah di pilih;
                $query->whereNotNull('hummatask_team_id');
            })
            ->whereDate('created_at', now())
            ->get();
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
            ->findOrFail($id)
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

    public function GetPresentationByMentor(mixed $id, Request $request): mixed
    {
        $query = $this->model->query()
            ->whereHas('mentor', function ($query) use ($id)
        {
            $query->where('division_id', $id);
        });

        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->input('created_at'));
        } else {
            $query->whereDate('created_at', now()->toDateString());
        }

        $perPage = 10;
        $presentations = $query->paginate($perPage);

        $presentations->appends($request->query());

        return $presentations;
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

    /**
     * getScheduleTodayByMentor
     *
     * @param  mixed $id
     * @return void
     */
    public function getScheduleTodayByMentor(mixed $id): mixed
    {
        return $this->model->query()
            ->whereNull('hummatask_team_id')
            ->whereDate('created_at', now())
            ->where('mentor_id', $id)
            ->get();
    }

    // public function getMonthlyPresentationsByStudentId(int $studentId): array
    // {
    //     $presentations = $this->model->query()
    //         ->whereHas('hummataskTeam', function ($query) use ($studentId) {
    //             $query->where('student_id', $studentId);
    //         })
    //         ->whereMonth('created_at', Carbon::now()->month)
    //         ->whereYear('created_at', Carbon::now()->year)
    //         ->with(['hummataskTeam.division', 'hummataskTeam.team', 'hummataskTeam.student'])
    //         ->get()
    //         ->groupBy(function ($presentation) {
    //             return $presentation->hummataskTeam->student->id;
    //         })
    //         ->map(function ($group) {
    //             $firstPresentation = $group->first();
    //             return [
    //                 'division_name' => $firstPresentation->hummataskTeam->division->name ?? 'N/A',
    //                 'team_name' => $firstPresentation->hummataskTeam->team->name ?? 'N/A',
    //                 'student_name' => $firstPresentation->hummataskTeam->student->name ?? 'N/A',
    //                 'month' => $firstPresentation->created_at->format('F'),
    //                 'count' => $group->count(),
    //             ];
    //         });

    //         dd($presentations);


    //     return $presentations->values()->toArray();
    // }


    public function getMonthlyPresentationsByStudentId(int $studentId): mixed
    {
        return $this->model->query()
            ->whereHas('hummataskTeam', function ($query) use ($studentId) {
                $query->whereHas('studentTeams', function($q) use ($studentId) {
                    $q->where('student_id', $studentId);
                });
            })
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
                // ->whereHas('hummataskTeam', function ($query) use ($studentId) {
                //     $query->where('student_id', $studentId);
                // })
                // ->whereMonth('created_at', Carbon::now()->month)
                // ->whereYear('created_at', Carbon::now()->year)
                // ->get();

                // dd($presentations);
        // return $presentations->values()->toArray();

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
