<?php

use App\Models\TaskSubmission;
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
        Schema::create('task_submissions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('task_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->text('description')->nullable();
            $table->text('file')->nullable();
            $table->enum('status', TaskSubmission::getStatuses()->toArray())->nullable();
            $table->text('comment')->nullable();
            $table->unsignedTinyInteger('rating')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_submissions');
    }
};
