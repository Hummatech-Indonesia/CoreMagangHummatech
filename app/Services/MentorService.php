<?php

namespace App\Services;

use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreMentorRequest;
use App\Contracts\Interfaces\MentorInterface;
use App\Contracts\Interfaces\MentorStudentInterface;

class MentorService
{
    use UploadTrait;

    private MentorInterface $mentor;
    private MentorStudentInterface $mentorStudent;

    public function __construct(MentorInterface $mentor, MentorStudentInterface $mentorStudent)
    {
        $this->mentor = $mentor;
        $this->mentorStudent = $mentorStudent;
    }

    /**
     *
     */
    public function store(StoreMentorRequest $request, $mentor)
    {
        $data = $request->validated();
        foreach($data['student_id'] as $student) {
            $this->mentorStudent->store([
                'mentor_id' => $mentor->id,
                'student_id' => $student
            ]);
        }
    }

}
