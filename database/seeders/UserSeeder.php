<?php

namespace Database\Seeders;

use App\Enum\RolesEnum;
use App\Models\Division;
use App\Models\Mentor;
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

        User::factory()->create([
            'name' => 'Test User Siswa Offline',
            'email' => 'siswa_offline@example.com',
        ])->assignRole(RolesEnum::OFFLINE);

        User::factory()->create([
            'name' => 'Test User Siswa Online',
            'email' => 'siswa_online@example.com',
        ])->assignRole(RolesEnum::ONLINE);
        Division::factory()->create([
            'name' => 'Web Technology',
        ]);
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
