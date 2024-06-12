<?php

namespace App\Services;

use App\Models\CourseAssignment;
use App\Models\TaskSubmission;
use Illuminate\Http\Request;
use App\Enum\AnswerTypeEnum;
use App\Enum\TypeEnum;
use App\Http\Requests\SubmitTaskRequest;
use App\Models\SubmitTask;
use App\Services\Traits\UploadTrait;
use Validator;

class SubmitTaskService
{

    use UploadTrait;

    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $taskSubmission
     * @return array
     */
    public function store(SubmitTaskRequest $request, CourseAssignment $courseAssignment): array
    {
        $data = $request->validated();
        $data['file'] = $request->file('file')->store(TypeEnum::SUBMITTASK->value, 'public');
        $data['course_assignment_id'] = $courseAssignment->id;

        return $data;
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $submitTask
     * @return array
     */
    public function update(SubmitTaskRequest $request, SubmitTask $submitTask): array
    {
        $data = $request->validated();
        $this->remove($submitTask->file);
        $data['file'] = $request->file('file')->store(TypeEnum::SUBMITTASK->value, 'public');
        $data['course_assignment_id'] = $submitTask->courseAssignment->id;
        return $data;
    }
}
