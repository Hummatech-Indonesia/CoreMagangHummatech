<?php

namespace App\Services;

use App\Enum\TypeEnum;
use App\Services\Traits\UploadTrait;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;

class StudentService
{
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
     * @param StoreStudentRequest $request
     *
     * @return array|bool
     */
    public function store(StoreStudentRequest $request): array|bool
    {
        $data = $request->validated();
        unset($data['confirm_password']);
        // dd($data);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid() || $request->hasFile('cv') && $request->file('cv')->isValid() || $request->hasFile('self_statement') && $request->file('self_statement')->isValid() || $request->hasFile('parent_statement') && $request->file('parent_statement')->isValid()) {
            $data['avatar'] = $request->file('avatar')->store(TypeEnum::AVATAR->value, 'public');
            $data['cv'] = $request->file('cv')->store(TypeEnum::CV->value, 'public');
            $data['self_statement'] = $request->file('self_statement')->store(TypeEnum::SELFSTATEMENT->value, 'public');
            $data['parents_statement'] = $request->file('parents_statement')->store(TypeEnum::PARENTSSTATEMENT->value, 'public');
            return $data;
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
    public function update(Student $student, UpdateStudentRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $this->remove($student->avatar);
            $data['avatar'] = $request->file('avatar')->store(TypeEnum::AVATAR->value, 'public');
        } else {
            $data['avatar'] = $student->avatar;
        }

        return $data;
    }

    public function delete(Student $student)
    {
        $this->remove($student->avatar);
        $this->remove($student->cv);
        $this->remove($student->self_statement);
        $this->remove($student->parents_statement);
    }
}
