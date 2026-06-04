<?php

use App\Enum\MajorStudentEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->enum('major', [MajorStudentEnum::MULTIMEDIA->value, MajorStudentEnum::RPL->value, MajorStudentEnum::TI->value, MajorStudentEnum::BISNIS_DIGITAL->value, MajorStudentEnum::TKJ->value])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->enum('major', [MajorStudentEnum::MULTIMEDIA->value, MajorStudentEnum::RPL->value, MajorStudentEnum::TI->value])->change();
        });
    }
};
