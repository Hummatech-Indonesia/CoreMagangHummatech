<?php

use App\Enum\StatusHummaTeamEnum;
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
        Schema::create('hummatask_teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('image')->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('category_project_id')->default('1')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('division_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('slug');
            $table->enum('status', [StatusHummaTeamEnum::PENDING->value, StatusHummaTeamEnum::ACTIVE->value, StatusHummaTeamEnum::EXPIRED->value])->default(StatusHummaTeamEnum::PENDING->value);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hummatask_teams');
    }
};
