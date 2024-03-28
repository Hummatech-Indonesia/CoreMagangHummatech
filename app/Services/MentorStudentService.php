<?php

namespace App\Services;

use App\Enum\TypeEnum;
use App\Models\Mentor;
use App\Models\Student;
use App\Services\Traits\UploadTrait;
use App\Contracts\Interfaces\MentorInterface;
use App\Http\Requests\UpdateMentorStudentRequest;
use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Contracts\Interfaces\MentorStudentInterface;

class MentorStudentService
{
    use UploadTrait;

    private MentorInterface $mentor;
    private MentorDivisionInterface $mentorDivision;
    private MentorStudentInterface $mentorStudent;

    public function __construct(MentorInterface $mentor, MentorDivisionInterface $mentorDivision, MentorStudentInterface $mentorStudent)
    {
        $this->mentor = $mentor;
        $this->mentorStudent = $mentorStudent;
        $this->mentorDivision = $mentorDivision;
    }

    use UploadTrait;

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
     * Handle update data event to models.
     *
     * @param Sale $sale
     * @param UpdateSaleRequest $request
     *
     * @return array|bool
     */
    public function store(Student $student, UpdateMentorStudentRequest $request): array|bool
    {
        $data = $request->validated();

        $newData = [
            'student_id' => $student->id,
            'mentor_id' => $data['mentor_id'],
        ];

        return $newData;
    }
    public function update(Student $student, UpdateMentorStudentRequest $request): array|bool
    {
        $data = $request->validated();


        $this->mentorStudent->delete($student->id);

        $newData = [
            'student_id' => $student->id,
            'mentor_id' => $data['mentor_id'],
        ];

        return $newData;
    }

    public function delete(Mentor $mentor)
    {
        $this->remove($mentor->image);
    }

}
