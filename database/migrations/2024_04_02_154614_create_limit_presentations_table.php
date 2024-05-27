<?php

use App\Enum\DayEnum;
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
        Schema::create('limit_presentations', function (Blueprint $table) {
            $table->id();
            $table->string('limits')->default(0);
            $table->enum('day' , [DayEnum::SUNDAY->value , DayEnum::MONDAY->value , DayEnum::TUESDAY->value ,DayEnum::WEDNESDAY->value ,DayEnum::THURSDAY->value , DayEnum::FRIDAY->value , DayEnum::SATURDAY->value]);
            $table->foreignId('mentor_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('limit_presentations');
    }
};
