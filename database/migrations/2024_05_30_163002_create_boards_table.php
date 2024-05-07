<?php

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
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->enum('label', ['frontend', 'backend', 'fullstack', 'ui/ux'])->nullable();
            $table->enum('priority', ['biasa', 'penting', 'mendesak'])->nullable();
            $table->enum('status', ['baru', 'dikerjakan', 'selesai'])->nullable();
            $table->foreignId('student_project_id')->nullable()->constrained();
            $table->foreignId('category_board_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boards');
    }
};
