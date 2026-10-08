<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majors = [
            'RPL',
            'Multimedia',
            'TI',
            'Bisnis Digital',
            'TKJ'
        ];

        foreach ($majors as $major) {
            Major::create([
                'name' => $major
            ]);
        }
    }
}
