<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\JournalInterface;
use App\Enum\InternshipTypeEnum;
use App\Enum\StatusJournalEnum;
use App\Models\Journal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JournalRepository extends BaseRepository implements JournalInterface
{
    public function __construct(Journal $journal)
    {
        $this->model = $journal;
    }

    /**
     * get by student
     *
     * @param  mixed $request
     * @return mixed
     */
    public function getByStudents(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->internship_type == InternshipTypeEnum::ONLINE->value, function ($query) {
                $query->whereRelation('student', 'internship_type', InternshipTypeEnum::ONLINE->value);
            })
            ->when($request->internship_type == InternshipTypeEnum::OFFLINE->value, function ($query) {
                $query->whereRelation('student', 'internship_type', InternshipTypeEnum::OFFLINE->value);
            })
            ->when($request->division_id, function ($query) use ($request) {
                $query->whereRelation('student', 'division_id', $request->division_id);
            })
            ->whereDate('created_at', now())
            ->get();
    }


    /**
     *
     * get by students
     * @param array
     * @return mixed
     *
     */
    public function getByStudentIds(array $student_ids): mixed
    {
        return $this->model->query()
            ->whereIn('student_id', $student_ids)
            ->whereDate('created_at', now())
            ->get();
    }

    public function getjournal()
    {
        return $this->model->query()->get();
    }

    public function get(): mixed
    {
        return $this->model->query()->where('student_id', auth()->user()->student->id)->latest()->paginate(10);
    }

    public function store(array $data): mixed
    {
        $data['student_id'] = auth()->user()->student->id;
        $data['status'] = StatusJournalEnum::FILLIN->value;
        return $this->model->query()->create($data);
    }

    public function where(): mixed
    {
        return $this->model->query()
            ->where('student_id', auth()->user()->student->id)
            ->where('created_at', '>=', now()->startOfDay())
            ->where('created_at', '<=', now()->endOfDay())
            ->first();
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete($id);
    }

    public function whereStudent(mixed $id): mixed
    {
        return $this->model->query()->where('student_id', $id)->get();
    }

    public function whereStudentAndDate($studentId, $date)
    {
        return $this->model->query()
        ->where('student_id', $studentId)
        ->whereDate('created_at', $date)
        ->get();
    }

    public function search(Request $request): mixed
    {
        $query = $this->model->query();

        $query->when($request->student_id, function ($query) use ($request) {
            $query->where('student_id', $request->student_id);
        });

        $query->when($request->name, function ($query) use ($request) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->name . '%');
            });
        });

        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        return $query;
    }

    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }

    public function CountJournalFillin()
    {
        return $this->model->query()
        ->where('status' , 'fillin')
        ->where('student_id' , auth()->user()->student->id)
        ->count();
    }
    public function CountJournalNotFillin()
    {
        return $this->model->query()
        ->where('student_id' , auth()->user()->student->id)
        ->where('status' , 'notfilling')
        ->count();
    }
}
