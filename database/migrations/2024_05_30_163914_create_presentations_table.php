<?php

use App\Enum\StatusPresentationEnum;
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
        Schema::create('presentations', function (Blueprint $table) {
            $table->id();
            $table->string('start_date');
            $table->string('end_date');
            $table->string('schedule_to');
            $table->foreignId('hummatask_team_id')->nullable()->constrained();
            $table->enum('status_presentation' , [StatusPresentationEnum::FINISH->value , StatusPresentationEnum::NOTFINISH->value , StatusPresentationEnum::ONGOING->value , StatusPresentationEnum::PENNDING->value])->nullable();
            $table->text('callback')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presentations');
    }
};
