<?php

namespace App\Services;

use App\Models\CourseAssignment;
use App\Models\TaskSubmission;
use Illuminate\Http\Request;
use App\Enum\AnswerTypeEnum;
use App\Enum\TypeEnum;
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
    public function store(Request $request, CourseAssignment $courseAssignment): array
    {
        switch ($courseAssignment->type) {
            case AnswerTypeEnum::FILE->value:
                $rules = [
                    'file' => 'required|file',
                ];
                $messages = [
                    'file.required' => 'Gambar wajib di isi',
                    'file.' => 'Gambar harus valid'
                ];
                break;
            case AnswerTypeEnum::IMAGE->value:
                $rules = [
                    'file' => 'required|image',
                ];
                $messages = [
                    'file.required' => 'Gambar wajib di isi',
                    'file.image' => 'Gambar harus valid'
                ];
                break;
            case AnswerTypeEnum::LINK->value:
                $rules = [
                    'link' => 'required|url:http,https',
                ];
                $messages = [
                    'link.required' => 'Link wajib di isi',
                    'link.url' => 'Link harus valid'
                ];
                break;
        }
        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->validated();
        if ($courseAssignment->type != AnswerTypeEnum::LINK->value) {
            $data['file'] = $request->file('file')->store(TypeEnum::SUBMITTASK->value, 'public');
        }
        else {
            $data['link'] = $request->link;
        }
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
    public function update(Request $request, SubmitTask $submitTask): array
    {
        switch ($submitTask->courseAssignment->type) {
            case AnswerTypeEnum::FILE->value:
                $rules = [
                    'file' => 'required|file',
                ];
                $messages = [
                    'file.required' => 'Gambar wajib di isi',
                    'file.' => 'Gambar harus valid'
                ];
                break;
            case AnswerTypeEnum::IMAGE->value:
                $rules = [
                    'file' => 'required|image',
                ];
                $messages = [
                    'file.required' => 'Gambar wajib di isi',
                    'file.image' => 'Gambar harus valid'
                ];
                break;
            case AnswerTypeEnum::LINK->value:
                $rules = [
                    'link' => 'required|url:http,https',
                ];
                $messages = [
                    'link.required' => 'Link wajib di isi',
                    'link.url' => 'Link harus valid'
                ];
                break;
        }
        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->validated();
        if ($submitTask->courseAssignment->type != AnswerTypeEnum::LINK->value) {
            $this->remove($submitTask->file);
            $data['file'] = $request->file('file')->store(TypeEnum::SUBMITTASK->value, 'public');
        }
        else {
            $data['link'] = $request->link;
        }
        $data['course_assignment_id'] = $submitTask->courseAssignment->id;

        return $data;
    }
}
