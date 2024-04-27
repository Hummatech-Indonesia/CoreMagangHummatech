<?php

namespace Database\Seeders;

use App\Enum\TypeVoucherEnum;
use App\Models\Voucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voucher::create([
            'presentase' => 25,
            'code_voucher' => 'MAGANG2024',
            'quota' => 50,
            'type' => TypeVoucherEnum::QUOTA->value,
            'start_date' => now(),
            'end_date' => now()->addDays(60),
        ]);
    }
}
