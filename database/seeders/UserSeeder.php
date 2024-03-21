<?php

namespace Database\Seeders;

use App\Enum\RolesEnum;
use App\Models\Division;
use App\Models\Mentor;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Pkl Hummatechh',
            'email' => 'pkl@hummatech.com',
            'password' => bcrypt('magang2024')
        ])->assignRole(RolesEnum::ADMIN);
        Division::factory()->create([
            'name' => 'Web Technology',
        ]);
        $student = Student::factory()->create([
            'name' => 'ABDUL KADER',
            'email' => 'abdulkader0126@gmail.com',
            'address' => 'Alamat Dummy',
            'avatar' => 'avatar.jpg',
            'birth_date' => '2000-01-01',
            'birth_place' => 'Tempat Lahir Dummy',
            'major' => 'rpl',
            'identify_number' => '1234567890',
            'phone' => '081234567890',
            'acepted' => '1',
            'status' => 'accepted',
            'rfid' => '8827738788',
            'division_id' => 1,
            'school' => 'SMKN 1 KRAKSAAN',
            'parents_statement' => 'Pernyataan Orang Tua Dummy',
            'self_statement' => 'Pernyataan Diri Dummy',
            'school_address' => 'Alamat Sekolah Dummy',
            'school_phone' => '02112345678',
            'gender' => 'female',
            'start_date' => '2024-01-01',
            'finish_date' => '2024-12-31',
            'class' => '12',
            'cv' => 'cv.jpg',
            'password' => 'password',
            'internship_type' => 'offline'
        ]);
        $studentoffline = Student::factory()->create([
            'name' => 'AHMAD JAILANI',
            'email' => 'ahmad@gmail.com',
            'address' => 'Alamat Dummy',
            'avatar' => 'avatar.jpg',
            'birth_date' => '2000-01-01',
            'birth_place' => 'Tempat Lahir Dummy',
            'major' => 'rpl',
            'identify_number' => '1234567890',
            'phone' => '081234567890',
            'acepted' => '1',
            'status' => 'accepted',
            'rfid' => '8827738788',
            'division_id' => 1,
            'school' => 'SMKN 1 KRAKSAAN',
            'parents_statement' => 'Pernyataan Orang Tua Dummy',
            'self_statement' => 'Pernyataan Diri Dummy',
            'school_address' => 'Alamat Sekolah Dummy',
            'school_phone' => '02112345678',
            'gender' => 'female',
            'start_date' => '2024-01-01',
            'finish_date' => '2024-12-31',
            'class' => '12',
            'cv' => 'cv.jpg',
            'password' => 'password',
            'internship_type' => 'offline'
        ]);

        User::factory()->create([
            'name' => $student->name,
            'email' => $student->email,
            'password' => $student->password,
            'student_id' => $student->id
        ])->assignRole(RolesEnum::ONLINE);
        User::factory()->create([
            'name' => $studentoffline->name,
            'email' => $studentoffline->email,
            'password' => $studentoffline->password,
            'student_id' => $studentoffline->id
        ])->assignRole(RolesEnum::OFFLINE);
        $mentor = Mentor::factory()->create([
            'name' => 'Test Mentor',
            'email' => 'mentor@example.com',
            'division_id' => 1
        ]);

        $user = User::factory()->create([
            'name' => 'Test Mentor',
            'email' => 'mentor@example.com',
            'mentors_id' => $mentor->id,
        ]);

        $user->assignRole(RolesEnum::MENTOR);
    }
}
