<?php

namespace App\Services;

use App\Enum\TypeEnum;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreTaskSubmissionRequest;
use App\Http\Requests\UpdateTaskSubmissionRequest;
use App\Models\TaskSubmission;
use App\Services\Traits\HasDownloadActionTrait;

class TaskSubmissionService
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
     * @param StoreTaskSubmissionRequest $request
     *
     * @return array|bool
     */
    public function store(StoreTaskSubmissionRequest $request): array|bool
    {
        $data = $request->validated();

        $data['file'] = $request->file('file')->store(TypeEnum::TASKSUBMISSION->value, 'public');
        return $data;
    }

    /**
     * Handle update data event to models.
     *
     * @param TaskSubmission $taskSubmission
     * @param UpdateTaskSubmissionRequest $request
     *
     * @return array|bool
     */
    public function update(TaskSubmission $taskSubmission, UpdateTaskSubmissionRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $this->remove($taskSubmission->file);
            $data['file'] = $request->file('file')->store(TypeEnum::TASKSUBMISSION->value, 'public');
        } else {
            $data['file'] = $taskSubmission->file;
        }

        return $data;
    }

    /**
     * Handle delete data event to models.
     *
     * @param TaskSubmission $taskSubmission
     * @return void
     */
    public function delete(TaskSubmission $taskSubmission): void
    {
        $this->remove($taskSubmission->file);
    }
}
