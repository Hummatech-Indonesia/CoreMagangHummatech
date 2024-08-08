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

    public function countActiveOflline(): mixed
    {
        return $this->model->query()->where('acepted' , 1)->where('status' ,[StudentStatusEnum::ACCEPTED->value])->count();
    }

    public function countNonActiveOflline(): mixed
    {
        return $this->model->query()->where('acepted' , 0)->where('status' ,[StudentStatusEnum::ACCEPTED->value])->count();
    }

    public function countPending(): mixed
    {
        return $this->model->query()->where('status' , 'pending')->count();
    }

    public function countDecline(): mixed
    {
        return $this->model->query()->where('status' , 'decline')->count();

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
            ->where('status' ,'accepted')
            ->where('acepted' , 1)
            ->where('internship_type', 'online')->count();
    }
    public function countActiveOfflineStudents(): mixed
    {
        return $this->model->query()
            ->where('finish_date', '>', now())
            ->where('status' ,'accepted')
            ->where('acepted' , 1)
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

    public function getAttendanceByDivision(Request $request): mixed
    {
        return $this->model->query()
            ->whereNotNull('rfid')
            ->when($request->internship_type == InternshipTypeEnum::ONLINE->value, function ($query) {
                $query->where('internship_type', InternshipTypeEnum::ONLINE->value);
            })
            ->when($request->internship_type == InternshipTypeEnum::OFFLINE->value, function ($query) {
                $query->where('internship_type', InternshipTypeEnum::OFFLINE->value);
            })
            ->where('division_id', $request->division_id)
            ->withCount([
                'attendances' => function ($query) {
                    $query->whereDate('created_at', now());
                }
            ])

            ->with([
                'attendances' => function ($query) {
                    $query->whereDate('created_at', now());
                }
            ])
            ->where('status', StudentStatusEnum::ACCEPTED->value)
            ->orderByDesc('attendances_count')
            ->get();
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

    public function studentOfflineAttendance(Request $request): mixed
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
                'attendances' => function ($query) {
                    $query;
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
    public function listStudent(Request $request): mixed
    {
        $query = $this->model->query()
            ->whereNotIn('status', ['pending', 'banned']);

        $query->when($request->filled('name'), function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        });

        $query->when($request->filled('school'), function ($query) use ($request) {
            $query->where('school', 'LIKE', '%' . $request->school . '%');
        });

        $query->when($request->filled('acepted'), function ($query) use ($request) {
            $query->where('acepted', 'LIKE', '%' . $request->acepted . '%');
        });

        $query->when($request->filled('gender'), function ($query) use ($request) {
            $query->where('gender', 'LIKE', '%' . $request->gender . '%');
        });

        $students = $query->paginate(12);

        $students->appends($request->only(['name', 'school', 'acepted', 'status', 'gender']));

        return $students;
    }


    // public function listRfid(Request $request): mixed
    // {
    //     return $this->model->query()
    //     ->where('status', 'accepted')
    //     ->whereNotNull('rfid')
    //     ->when($request->name, function ($query) use ($request) {
    //         $query->where('name', 'LIKE', '%' . $request->name . '%');
    //     })
    //     ->when($request->created_at, function ($query) use ($request) {
    //         $query->whereDate('created_at', $request->created_at);
    //     })
    //     ->paginate(10);

    // }

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
    public function listStudentOffline(Request $request): mixed
    {
        return $this->model->query()
            ->where('internship_type', InternshipTypeEnum::OFFLINE->value)
            ->where('status', 'accepted')
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->when($request->school, function ($query) use ($request) {
                $query->where('school', 'LIKE', '%' . $request->school . '%');
            })
            ->when($request->acepted, function ($query) use ($request) {
                $query->where('acepted', 'LIKE', '%' . $request->acepted . '%');
            })
            ->when($request->gender, function ($query) use ($request) {
                $query->where('gender', 'LIKE', '%' . $request->gender . '%');
            })
            ->paginate(12);
    }

    /**
     * List Student Online
     *
     * @return mixed
     */
    public function listStudentOnline(Request $request): mixed
    {
        return $this->model->query()
            ->where('internship_type', InternshipTypeEnum::ONLINE->value)
            ->where('status', 'accepted')
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->when($request->school, function ($query) use ($request) {
                $query->where('school', 'LIKE', '%' . $request->school . '%');
            })
            ->when($request->acepted, function ($query) use ($request) {
                $query->where('acepted', 'LIKE', '%' . $request->acepted . '%');
            })
            ->when($request->gender, function ($query) use ($request) {
                $query->where('gender', 'LIKE', '%' . $request->gender . '%');
            })
            ->paginate(12);
    }

    /**
     * Get Student By Status Banned
     *
     * @return mixed
     */
    public function getstudentdeclined(Request $request): mixed
    {
        return $this->model->query()
            ->where('status', StudentStatusEnum::DECLINED->value)
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->paginate(10);
    }

    /**
     * Get Student By Status Banned
     *
     * @return mixed
     */
    public function getstudentbanned(Request $request): mixed
    {
        return $this->model->query()
            ->where('status', StudentStatusEnum::BANNED->value)
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->paginate(10);
    }

    /**
     * Get Student By Status Accepted
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getstudentmentorplacement(mixed $id,Request $request): mixed
    {
        return $this->model->query()
            ->where('internship_type', InternshipTypeEnum::ONLINE->value)
            ->where('status', 'accepted')
            ->whereNotIn('id', $id)
            ->when($request->name, function ($query) use ($request){
                $query->where('name', 'LIKE', '%' . $request->name. '%');
            })
            ->paginate(10);
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
            ->where('acepted' , '1')
            ->latest()
            ->paginate('6');
    }

    /**
     * Get Student for Division Placement
     *
     * @return mixed
     */
    public function getstudentdivisionplacement(Request $request): mixed
    {
        return $this->model->query()
            ->where('internship_type', InternshipTypeEnum::OFFLINE->value)
            ->where('status', 'accepted')
            ->where('division_id', null)
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->paginate(10);
    }

    /**
     * Get Edit Student Mentor Placement
     *
     * @param  mixed $id
     * @return mixed
     */
    public function geteditstudentmentorplacement(mixed $id, Request $request): mixed
    {
        return $this->model->query()
            ->where('internship_type', InternshipTypeEnum::ONLINE->value)
            ->where('status', 'accepted')
            ->whereIn('id', $id)
            ->when($request->name, function ($query) use ($request){
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->paginate(10);
    }

    /**
     * Get Edit Student Division Placement
     *
     * @return mixed
     */
    public function getstudentdivisionplacementedit(Request $request): mixed
    {
        return $this->model->query()
            ->where('internship_type', InternshipTypeEnum::OFFLINE->value)
            ->where('status', 'accepted')
            ->where('division_id', '!=', null)
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->paginate(10);
    }

    public function whereStudentDivision(mixed $id, Request $request): mixed
    {
        return $this->model->query()
            ->where('division_id', $id)
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->paginate(10);
    }


    public function whereRfidNull(Request $request): mixed
    {
        $request->session()->put('created_at', $request->created_at);

        $query = $this->model->query()
            ->whereNull('rfid')
            ->where('status' , 'accepted')
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            });

        if ($request->created_at) {
            $query->whereDate('created_at', $request->created_at);
        } elseif ($request->session()->has('created_at')) {
            $query->whereDate('created_at', $request->session()->get('created_at'));
        }

        $data = $query->paginate(10);

        return $data;
    }

    public function listRfid(Request $request): mixed
    {
        $request->session()->put('created_at', $request->created_at);

        $query = $this->model->query()
            ->where('status', 'accepted')
            ->whereNotNull('rfid')
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            });

        if ($request->created_at) {
            $query->whereDate('created_at', $request->created_at);
        } elseif ($request->session()->has('created_at')) {
            $query->whereDate('created_at', $request->session()->get('created_at'));
        }

        $data = $query->paginate(10);

        return $data;
    }

    public function ListAlumni(Request $request): mixed
    {
        return $this->model->query()->where('expired' , 'alumni')->get();
    }

    /**
     * getByMentor
     *
     * @param  mixed $request
     * @return mixed
     */
    public function getByMentor(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->internship_type == InternshipTypeEnum::ONLINE->value, function ($query) {
                $query->where('internship_type', InternshipTypeEnum::ONLINE->value);
            })
            ->when($request->internship_type == InternshipTypeEnum::OFFLINE->value, function ($query) {
                $query->where('internship_type', InternshipTypeEnum::OFFLINE->value);
            })
            ->whereRelation('mentorstudent', 'mentor_id', '=', $request->mentor_id)
            ->get();
    }

    /**
     * countByMentor
     *
     * @param  mixed $id
     * @return int
     */
    public function countByMentor(mixed $id): int
    {
        return $this->model->query()
            ->whereRelation('mentorstudent', 'mentor_id', '=', $id)
            ->count();
    }


    // public function whereRfidNull(Request $request): mixed
    // {
    //     return $this->model->query()
    //     ->whereNull('rfid')
    //     ->when($request->name, function ($query) use ($request) {
    //         $query->where('name', 'LIKE', '%' . $request->name . '%');
    //     })
    //     ->when($request->created_at, function ($query) use ($request) {
    //         $query->whereDate('created_at', $request->created_at);
    //     })
    //     ->paginate(10);
    // }


    // public function listRfid(Request $request): mixed
    // {
    //     return $this->model->query()
    //     ->where('status', 'accepted')
    //     ->whereNotNull('rfid')
    //     ->when($request->name, function ($query) use ($request) {
    //         $query->where('name', 'LIKE', '%' . $request->name . '%');
    //     })
    //     ->when($request->created_at, function ($query) use ($request) {
    //         $query->whereDate('created_at', $request->created_at);
    //     })
    //     ->paginate(10);

    // }

    public function first () : mixed
    {
        return $this->model->query()
        ->where('id',auth()->user()->student->id)
        ->first();
    }
}
