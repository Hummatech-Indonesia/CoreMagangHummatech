<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\CategoryBoardInterface;
use App\Contracts\Interfaces\CodeOfConductInterface;
use App\Contracts\Interfaces\PresentationInterface;
use App\Contracts\Interfaces\ThesisInterface;
use App\Models\CategoryBoard;
use App\Models\Presentation;
use App\Models\Thesis;
use Flasher\Prime\Response\Presenter\PresenterInterface;

class PresentationRepository extends BaseRepository implements PresentationInterface
{
    public function __construct(Presentation $presentation)
    {
        $this->model = $presentation;
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

    public function whereStatus(mixed $status): mixed
    {
        return $this->model->query()
            ->where('status_presentation', $status)
            ->get();
    }
    

}
