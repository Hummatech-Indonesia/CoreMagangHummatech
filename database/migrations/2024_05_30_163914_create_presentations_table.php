<?php

use App\Enum\{
    StatusPresentationEnum,
    PresentationTypeEnum
};
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
            $table->integer('urutan')->default(0);
            $table->foreignId('division_id')->constrained('divisions');
            $table->foreignId('mentor_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
            $table->date('planning_date_presentation');
            $table->enum('status_presentation' , [
                \App\Enum\StatusPresentationEnum::FINISH->value , //selesai
                \App\Enum\StatusPresentationEnum::NOTFINISH->value , //ditolak
                \App\Enum\StatusPresentationEnum::ONGOING->value , //accepted
                \App\Enum\StatusPresentationEnum::PENNDING->value, //ditunda
                \App\Enum\StatusPresentationEnum::WAITING->value //mengajukan
            ])
                ->default(\App\Enum\StatusPresentationEnum::WAITING);
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
