<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentSessionInterface;
use App\Models\Student;

class StudentSessionRepository extends BaseRepository implements StudentSessionInterface
{
    public function changeSession(mixed $data, int $session): bool
    {
        $studentIds = explode(',', $data[0]);
        // dd($studentIds);
        // dd($studentIds);
        foreach ($studentIds as $studentId) {
            Student::findOrFail(trim($studentId))->update(['session' => $session]);
        }
        return true; // Mengembalikan nilai true jika semua update berhasil
    }


}
