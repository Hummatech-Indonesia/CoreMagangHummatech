<?php

use App\Enum\WarningLetterEnum;
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
        Schema::create('warning_letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('status' , [WarningLetterEnum::WARNING_LETTER_ONE->value , WarningLetterEnum::WARNING_LETTER_TWO->value ,WarningLetterEnum::WARNING_LETTER_THREE->value]);
            $table->date('date');
            $table->string('reference_number');
            $table->longText('reason');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warning_letters');
    }
};
