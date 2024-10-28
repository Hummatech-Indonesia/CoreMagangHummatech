<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentSessionInterface;
use App\Models\Student;

class StudentSessionRepository extends BaseRepository implements StudentSessionInterface
{
    public function changeSession(mixed $data, int $session): bool
    {
        foreach ($data as $studentId) {
            Student::findOrFail($studentId)->update(['session' => $session]);
        }
        return true; // Mengembalikan nilai true jika semua update berhasil
    }

}
