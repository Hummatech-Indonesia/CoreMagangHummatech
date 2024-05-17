<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AppointmentOfMentorInterface;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Models\AppointmentOfAmentor;
use Illuminate\Http\Request;

class AppointmentOfMentorRepository extends BaseRepository implements AppointmentOfMentorInterface
{
    public function __construct(AppointmentOfAmentor $appointmentOfAmentor)
    {
        $this->model = $appointmentOfAmentor;
    }

    public function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null): mixed
    {
        return $this->model->query()->paginate($perPage, $columns, $pageName, $page);
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


    public function search(Request $request):mixed
    {
        $query = $this->model->query();

        $query->when($request->name, function ($query) use ($request) {
            $query->whereRelation('mentors','name', 'LIKE', '%' . $request->name . '%');
        });

        return $query;
    }

    public function count()
    {
        return $this->model->query()->where('mentor_id' , auth()->user()->id)->count();
    }
}
