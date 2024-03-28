<?php

namespace App\Services;

use App\Enum\TypeEnum;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreStudentTaskRequest;
use App\Http\Requests\UpdateStudentTaskRequest;
use App\Models\StudentTask;
use App\Services\Traits\HasDownloadActionTrait;

class StudentTaskService
{
    use UploadTrait, HasDownloadActionTrait;

    /**
     * Handle custom upload validation.
     *
     * @param string $disk
     * @param object $file
     * @param string|null $old_file
     * @return string
     */
    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    /**
     * Handle store data event to models.
     *
     * @param StoreStudentTaskRequest $request
     *
     * @return array|bool
     */
    public function store(StoreStudentTaskRequest $request): array|bool
    {
        $data = $request->validated();

        $data['file'] = $request->file('file')->store(TypeEnum::TASKANSWER->value, 'public');
        return $data;
    }

    /**
     * Handle update data event to models.
     *
     * @param StudentTask $studentTask
     * @param UpdateStudentTaskRequest $request
     *
     * @return array|bool
     */
    public function update(StudentTask $studentTask, UpdateStudentTaskRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $this->remove($studentTask->file);
            $data['file'] = $request->file('file')->store(TypeEnum::TASKANSWER->value, 'public');
        } else {
            $data['file'] = $studentTask->file;
        }

        return $data;
    }

    /**
     * Handle delete data event to models.
     *
     * @param StudentTask $studentTask
     * @return void
     */
    public function delete(StudentTask $studentTask): void
    {
        $this->remove($studentTask->file);
    }
}
