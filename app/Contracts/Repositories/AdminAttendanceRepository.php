<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AdminAttendanceInterface;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminAttendanceRepository extends BaseRepository implements AdminAttendanceInterface
{
    public function __construct(Student $student)
    {
        $this->model = $student;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function search($internship, Request $request): mixed
    {
        $query = $this->model->query();

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
}
