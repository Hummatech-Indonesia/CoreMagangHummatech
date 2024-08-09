<?php

use App\Enum\StudentStatusEnum;
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
            $table->enum('status', [StudentStatusEnum::ALUMNUS->value, StudentStatusEnum::ACCEPTED->value, StudentStatusEnum::DECLINED->value, StudentStatusEnum::PENDING->value, StudentStatusEnum::BANNED->value])->default(StudentStatusEnum::PENDING->value)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->enum('status', [StudentStatusEnum::ALUMNUS->value, StudentStatusEnum::ACCEPTED->value, StudentStatusEnum::DECLINED->value, StudentStatusEnum::PENDING->value, StudentStatusEnum::BANNED->value])->default(StudentStatusEnum::PENDING->value)->change();
        });
    }
};
