<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentInterface;
use App\Enum\InternshipTypeEnum;
use App\Enum\StudentStatusEnum;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentRepository extends BaseRepository implements StudentInterface
{
    /**
     * __construct
     *
     * @param  mixed $student
     * @return void
     */
    public function __construct(Student $student)
    {
        $this->model = $student;
    }
    /**
     * Method countActiceStudents
     *
     * @return mixed
     */
    public function countActiveOnlineStudents(): mixed
    {
        return $this->model
        ->query()
            ->where('finish_date', '>', now())
            ->where('internship_type', 'online')->count();
    }
    public function countActiveOfflineStudents(): mixed
    {
        return $this->model->query()
        ->where('finish_date', '>', now())
        ->where('internship_type', 'offline')->count();
    }
    /**
     * Method countDeactiveStudents
     *
     * @return mixed
     */
    public function countDeactiveStudents(): mixed
    {
        return $this->model->where('finish_date', '<', now())->count();
    }
    /**
     * listAttendance
     *
     * @param  mixed $request
     * @return mixed
     */
    public function listAttendance(Request $request): mixed
    {
        $date = now();
        if ($request->has('date')) {
            $date = $request->date;
        }
        return $this->model->query()
            ->whereNotNull('rfid')
            ->where('internship_type', InternshipTypeEnum::ONLINE->value)
            ->withCount([
                'attendances' => function ($query) {
                    $query->whereDate('created_at', now());
                }
            ])
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->with([
                'attendances' => function ($query) use ($date) {
                    $query->whereDate('created_at', $date);
                }
            ])
            ->where('status', StudentStatusEnum::ACCEPTED->value)
            ->orderByDesc('attendances_count')
            ->get();
    }

    /**
     * listOfflineAttendance
     *
     * @param  mixed $request
     * @return mixed
     */
    public function listOfflineAttendance(Request $request): mixed
    {
        $date = now();
        if ($request->has('date')) {
            $date = $request->date;
        }
        return $this->model->query()
            ->where('id', auth()->user()->student->id)
            ->whereNotNull('rfid')
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->where('internship_type', InternshipTypeEnum::OFFLINE->value)
            ->withCount([
                'attendances' => function ($query) {
                    $query->whereDate('created_at', now());
                }
            ])
            ->with([
                'attendances' => function ($query) use ($date) {
                    $query->whereDate('created_at', $date);
                }
            ])
            ->where('status', StudentStatusEnum::ACCEPTED->value)
            ->orderByDesc('attendances_count')
            ->get();
    }


    /**
     * getByRfid
     *
     * @param  mixed $cardId
     * @return void
     */
    public function getByRfid(mixed $cardId)
    {
        return $this->model->query()
            ->where('rfid', $cardId)
            ->firstOrFail();
    }

    public function getApiStudent(): mixed
    {
        return $this->model->query()->where('id', auth()->user()->student->id)->get();
    }

    /**
     * Get Data
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    /**
     * getStudentAccepted
     *
     * @return mixed
     */
    public function getStudentAccepted(): mixed
    {
        return $this->model->query()
            ->where('status', StudentStatusEnum::ACCEPTED->value)
            ->where('internship_type', InternshipTypeEnum::OFFLINE->value)
            ->get();
    }

    /**
     * Store data to database
     *
     * @param  array $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    /**
     * Show data Into Database
     *
     * @param  mixed $id
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }

    /**
     * Update data to database
     *
     * @param  mixed $id
     * @param  array $data
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }

    /**
     * Delete data to database
     *
     * @param  mixed $id
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete($id);
    }

    /**
     * Where Status Accepted
     *
     * @return mixed
     */
    public function where(): mixed
    {
        return $this->model->query()
            ->where('status', 'accepted')
            ->where('acepted', '1')
            ->get();
    }

    /**
     * Pluck Collumn From Database
     *
     * @param  mixed $column
     * @return mixed
     */
    public function pluck(mixed $column): mixed
    {
        return $this->model->query()->pluck($column);
    }

    /**
     * List All Student
     *
     * @return mixed
     */
    public function listStudent(): mixed
    {
        return $this->model->query()
            ->whereNotIn('status', ['pending', 'banned'])
            ->get();
    }

    /**
     * Show Student To Warning Letter
     *
     * @param  mixed $id
     * @return mixed
     */
    public function sp(mixed $id): mixed
    {
        return $this->model->query()
            ->where('id', $id)
            ->firstOrFail();
    }

    /**
     * Count Student Offline
     *
     * @return mixed
     */
    public function countStudentOffline(): mixed
    {
        return $this->model->query()
            ->where('internship_type', InternshipTypeEnum::OFFLINE->value)
            ->where('status', 'accepted')
            ->count();
    }

    /**
     * List Student Offline
     *
     * @return mixed
     */
    public function listStudentOffline(): mixed
    {
        return $this->model->query()
            ->where('internship_type', InternshipTypeEnum::OFFLINE->value)
            ->where('status', 'accepted')
            ->get();
    }

    /**
     * List Student Online
     *
     * @return mixed
     */
    public function listStudentOnline(): mixed
    {
        return $this->model->query()
            ->where('internship_type', InternshipTypeEnum::ONLINE->value)
            ->where('status', 'accepted')
            ->get();
    }

    /**
     * Get Student By Status Banned
     *
     * @return mixed
     */
    public function getstudentdeclined(): mixed
    {
        return $this->model->query()
            ->where('status', StudentStatusEnum::DECLINED->value)
            ->get();
    }

    /**
     * Get Student By Status Banned
     *
     * @return mixed
     */
    public function getstudentbanned(): mixed
    {
        return $this->model->query()
            ->where('status', StudentStatusEnum::BANNED->value)
            ->get();
    }

    /**
     * Get Student By Status Accepted
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getstudentmentorplacement(mixed $id): mixed
    {
        return $this->model->query()
            ->where('internship_type', InternshipTypeEnum::ONLINE->value)
            ->where('status', 'accepted')
            ->whereNotIn('id', $id)
            ->get();
    }

    /**
     * Get Student By Status Accepted
     *
     * @param  mixed $id
     */
    public function getstudentoffexceptauth(mixed $id): mixed
    {
        return $this->model->query()
            ->where('internship_type', 'offline')
            ->where('id', '!=', $id)
            ->get();
    }

    /**
     * Get Student for Division Placement
     *
     * @return mixed
     */
    public function getstudentdivisionplacement(): mixed
    {
        return $this->model->query()
            ->where('internship_type', InternshipTypeEnum::OFFLINE->value)
            ->where('status', 'accepted')
            ->where('division_id', null)
            ->get();
    }

    /**
     * Get Edit Student Mentor Placement
     *
     * @param  mixed $id
     * @return mixed
     */
    public function geteditstudentmentorplacement(mixed $id): mixed
    {
        return $this->model->query()
            ->where('internship_type', InternshipTypeEnum::ONLINE->value)
            ->where('status', 'accepted')
            ->whereIn('id', $id)
            ->get();
    }

    /**
     * Get Edit Student Division Placement
     *
     * @return mixed
     */
    public function getstudentdivisionplacementedit(): mixed
    {
        return $this->model->query()
            ->where('internship_type', InternshipTypeEnum::OFFLINE->value)
            ->where('status', 'accepted')
            ->where('division_id', '!=', null)
            ->get();
    }

    public function whereStudentDivision(mixed $id): mixed
    {
        return $this->model->query()->where('division_id', $id)->get();
        ;
    }

    public function whereRfidNull(Request $request): mixed
    {
        return $this->model->query()
        ->whereNull('rfid')
        ->when($request->name, function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        })
        ->when($request->created_at, function ($query) use ($request) {
            $query->whereDate('created_at', $request->created_at);
        })
        ->paginate(10);
    }

    public function listRfid(Request $request): mixed
    {
        return $this->model->query()
        ->where('status', 'accepted')
        ->whereNotNull('rfid')
        ->when($request->name, function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        })
        ->when($request->created_at, function ($query) use ($request) {
            $query->whereDate('created_at', $request->created_at);
        })
        ->paginate(10);

    }
}
