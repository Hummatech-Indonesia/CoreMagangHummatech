<?php

namespace App\Services;

use App\Contracts\Interfaces\MentorDivisionInterface;
use App\Enum\TypeEnum;
use App\Models\Mentor;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreMentorRequest;
use App\Http\Requests\UpdateMentorRequest;
use App\Contracts\Interfaces\MentorInterface;
use App\Models\MentorDivision;

class MentorDivisionService
{
    use UploadTrait;

    private MentorInterface $mentor;
    private MentorDivisionInterface $mentorDivision;

    public function __construct(MentorInterface $mentor, MentorDivisionInterface $mentorDivision)
    {
        $this->mentor = $mentor;
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
     * Handle store data event to models.
     *
     * @param StoreSaleRequest $request
     *
     * @return array|bool
     */
    public function store(StoreMentorRequest $request, Mentor $mentor): array|bool
    {
        $data = $request->validated();

        foreach ($data['division_id'] as $division) {
            $datanew = [
                'division_id' => $division,
                'mentor_id' => $mentor->id,
            ];

            $this->mentorDivision->store($datanew);
        }



        return false;
    }

    /**
     * Handle update data event to models.
     *
     * @param Sale $sale
     * @param UpdateSaleRequest $request
     *
     * @return array|bool
     */
    public function update(Mentor $mentor, UpdateMentorRequest $request): array|bool
    {
        $data = $request->validated();
        $this->mentorDivision->delete($mentor->id);


        foreach ($data['division_id'] as $division) {
            $datanew = [
                'division_id' => $division,
                'mentor_id' => $mentor->id,
            ];

            $this->mentorDivision->store($datanew);
        }

        return false;
    }

    public function delete(Mentor $mentor)
    {
        $this->remove($mentor->image);
    }

}
