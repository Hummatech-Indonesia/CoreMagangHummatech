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
        Schema::create('category_boards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('hummatask_team_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('status',['team_note','revision_note'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_boards');
    }
};
