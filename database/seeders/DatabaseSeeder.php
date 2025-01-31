<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\QueuePresentation;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     RemoveImage::class,
        //     RoleSeeder::class,
        //     UserSeeder::class,
        //     CategoryProjectSeeder::class,
        //         # =========================== Hapus seeder dibawah kalau udah mode production =========================== #
        //         // VoucherSeeder::class,
        //         // CourseSeeder::class,
        //     InstitutionSeeder::class,
        // ]);
        foreach(Division::get() as $division) {
            QueuePresentation::query()
                ->create([
                    'division_id' => $division->id,
                    'queue' => 1
                ]);
        }
    }
}
