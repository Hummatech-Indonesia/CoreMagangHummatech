<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\BoardInterface;
use App\Contracts\Interfaces\CategoryBoardInterface;
use App\Contracts\Interfaces\CodeOfConductInterface;
use App\Contracts\Interfaces\ThesisInterface;
use App\Models\Board;
use App\Models\CategoryBoard;
use App\Models\Thesis;

class BoardRepository extends BaseRepository implements BoardInterface
{
    public function __construct(Board $board)
    {
        $this->model = $board;
    }

    public function get(): mixed
    {
        return $this->model->query()
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
    public function where($parameter, $value): mixed
    {
        return $this->model->query()->where($parameter, $value)->get();
    }
    public function whereCategory(mixed $id):mixed
    {
        return $this->model->query()->where('category_board_id', $id)->get();

    }
}
