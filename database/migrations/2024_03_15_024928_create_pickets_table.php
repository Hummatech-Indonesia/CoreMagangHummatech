<?php

use App\Enums\DayEnum;
use App\Enum\TimeEnum;
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
        Schema::create('pickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('day' , [DayEnum::MONDAY->value ,DayEnum::TUESDAY->value , DayEnum::WEDNESDAY->value , DayEnum::THURSDAY->value ,DayEnum::FRIDAY->value]);
            $table->enum('tim' , [TimeEnum::MORNING->value , TimeEnum::AFTERNOON->value]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickets');
    }
};
