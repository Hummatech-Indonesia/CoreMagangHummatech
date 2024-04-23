<?php

namespace App\Services;

use App\Enum\TypeEnum;
use App\Http\Requests\StoreStudentChallengeRequest;
use App\Http\Requests\UpdateStudentChallengeRequest;
use App\Models\StudentChallenge;
use App\Services\Traits\UploadTrait;
use App\Services\Traits\HasDownloadActionTrait;

class StudentChallengeService
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
     * @param StoreStudentChallengeRequest $request
     *
     * @return array|bool
     */
    public function store(StoreStudentChallengeRequest $request): array|bool
    {
        $data = $request->validated();

        $data['file'] = $request->file('file')->store(TypeEnum::CHALLENGEANSWER->value, 'public');
        return $data;
    }

    /**
     * Handle update data event to models.
     *
     * @param StudentChallenge $studentChallenge
     * @param UpdateStudentChallengeRequest $request
     *
     * @return array|bool
     */
    public function update(StudentChallenge $studentChallenge, UpdateStudentChallengeRequest $request): array|bool
    {
        $data = $request->validated();

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $this->remove($studentChallenge->file);
            $data['file'] = $request->file('file')->store(TypeEnum::CHALLENGEANSWER->value, 'public');
        } else {
            $data['file'] = $studentChallenge->file;
        }

        return $data;
    }

    /**
     * Handle delete data event to models.
     *
     * @param StudentChallenge $studentChallenge
     * @return void
     */
    public function delete(StudentChallenge $studentChallenge): void
    {
        $this->remove($studentChallenge->file);
    }
}
