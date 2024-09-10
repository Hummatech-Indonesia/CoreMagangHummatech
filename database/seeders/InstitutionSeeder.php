<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $institutions = [
            'Politeknik Negeri Jember',
            'Politeknik Negeri Madiun',
            'Politeknik Negeri Malang',
            'SMK 17 Agustus 1945 Muncar',
            'SMK Al Azhar Sempu',
            'SMK Antartika 1 Sidoarjo',
            'SMK Babussalam Pagelaran',
            'SMK Muhammadiyah 1 Genteng',
            'SMK Muhammadiyah 6 Rogojampi',
            'SMK Muhammadiyah 9 Gambiran',
            'SMK Negeri 1 Blega',
            'SMK Negeri 1 Boyolangu',
            'SMK Negeri 1 Dlanggu',
            'SMK Negeri 1 Gending',
            'SMK Negeri 1 Kepanjen',
            'SMK Negeri 1 Kraksaan',
            'SMK Negeri 1 Lumajang',
            'SMK Negeri 1 Mejayan',
            'SMK Negeri 1 Probolinggo',
            'SMK Negeri 1 Purwosari', 
            'SMK Negeri 12 Malang', 
            'SMK Negeri 2 Kraksaan',
            'SMK Negeri 2 Mataram',
            'SMK Negeri 2 Surabaya',
            'SMK Negeri 2 Trenggalek',
            'SMK Negeri 3 Pamekasan',
            'SMK Negeri 4 Bojonegoro',
            'SMK Negeri 4 Malang',
            'SMK Negeri 6 Jember',
            'SMK Negeri 6 Malang',
            'SMK Negeri 8 Jember',
            'SMK Negeri 9 Malang',
            'SMK PGRI 2 Ponorogo',
            'SMK PGRI 3 Malang',
            'SMK PGRI Singosari',
            'SMK PGRI Wlingi',
            'SMK Telkom Shandy Putra Malang',
            'SMK Wali Songo Bululawang',
            'SMK Widyaagama Malang',
            'SMKS An Nahdiliyah'
        ];

        foreach ($institutions as $institution) {
            Institution::factory()->create(['name' => $institution]);
        }
    }
}
