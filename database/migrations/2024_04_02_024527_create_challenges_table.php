<?php

use App\ChallengeEnum;
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
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_id')->constrained('mentors');
            $table->string('title');
            $table->longText('description');
            $table->enum('level', [ChallengeEnum::EASY->value , ChallengeEnum::NORMAL->value , ChallengeEnum::HARD->value]);
            $table->date('start_date');
            $table->date('deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};
