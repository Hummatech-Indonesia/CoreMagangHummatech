<?php

namespace Database\Seeders;

use App\Models\CategoryProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryProject::create([
            'name' => 'solo project',
        ]);
        CategoryProject::create([
            'name' => 'premini project',
        ]);
        CategoryProject::create([
            'name' => 'mini project',
        ]);
        CategoryProject::create([
            'name' => 'big project',
        ]);
    }
}
