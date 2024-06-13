<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\CategoryBoardInterface;
use App\Contracts\Interfaces\CodeOfConductInterface;
use App\Contracts\Interfaces\ThesisInterface;
use App\Models\CategoryBoard;
use App\Models\Thesis;

class CategoryBoardRepository extends BaseRepository implements CategoryBoardInterface
{
    public function __construct(CategoryBoard $categoryBoard)
    {
        $this->model = $categoryBoard;
    }

    public function get(): mixed
    {
        return $this->model->query()
            ->get();
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->show($id)
            ->update($data);
    }
    /**
     * Method show
     *
     * @param mixed $id [explicite description]
     *
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
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

    public function getByHummataskTeamId(mixed $id): mixed
    {
        return $this->model->query()
            ->with('boards')
            ->where('hummatask_team_id', $id)
            ->get();
    }

    public function getByStatus(mixed $id, $team):mixed
    {
        return $this->model->query()
            ->where('status', $id)
            ->where('hummatask_team_id', $team)
            ->get();
    }

}
