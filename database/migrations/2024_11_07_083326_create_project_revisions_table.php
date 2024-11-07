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
        Schema::create('project_revisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('revision_id')->constrained('project_revisions');
            $table->text('revision');
            $table->enum('status', [
                \App\Enum\RevisionStatusEnum::Todo->value,
                \App\Enum\RevisionStatusEnum::InProgress->value,
                \App\Enum\RevisionStatusEnum::Completed->value,
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_revisions');
    }
};
