<?php

use App\Enum\ReportStudentEnum;
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
        Schema::create('report_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('image');
            $table->longText('description');
            $table->enum('status' ,[ReportStudentEnum::ACCEPTED->value, ReportStudentEnum::DECLINED->value,ReportStudentEnum::PENDING->value])->default(ReportStudentEnum::PENDING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_students');
    }
};
