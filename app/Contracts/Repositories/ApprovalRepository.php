<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ApprovalInterface;
use App\Contracts\Interfaces\LimitInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Enum\InternshipTypeEnum;
use App\Models\Student;
use Illuminate\Http\Request;

class ApprovalRepository extends BaseRepository implements ApprovalInterface
{
    private StudentInterface $student;
    private LimitInterface $limit;
    public function __construct(Student $student, StudentInterface $studentInterface, LimitInterface $limit)
    {
        $this->model = $student;
        $this->student = $studentInterface;
        $this->limit = $limit;

    }

    public function where(): mixed
    {
        return $this->model->query()->where('status' , 'pending')->get();
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }

    public function ListStudentOffline(Request $request): mixed
    {
        return $this->model->query()
        ->where('status' , 'pending')
        ->where('internship_type', InternshipTypeEnum::OFFLINE->value)
        ->when($request->name, function ($query) use ($request){
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        })
        ->paginate(10);
    }

    public function ListStudentOnline(Request $request): mixed
    {
        return $this->model->query()
        ->where('status' , 'pending')
        ->where('internship_type', InternshipTypeEnum::ONLINE->value)
        ->when($request->name, function ($query) use ($request){
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        })
        ->paginate(10);
    }


}
