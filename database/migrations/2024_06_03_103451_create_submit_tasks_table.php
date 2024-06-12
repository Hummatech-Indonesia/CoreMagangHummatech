<?php

use App\Enum\SubmitTaskStatusEnum;
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
        Schema::create('submit_tasks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('course_assignment_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('file');
            $table->enum('status', [SubmitTaskStatusEnum::AGREE->value, SubmitTaskStatusEnum::REJECT->value, SubmitTaskStatusEnum::PENDING->value])->default(SubmitTaskStatusEnum::PENDING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submit_tasks');
    }
};
