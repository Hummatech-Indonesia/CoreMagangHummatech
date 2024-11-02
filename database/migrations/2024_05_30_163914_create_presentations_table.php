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
            $table->string('project_name')->nullable();
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('type_project',[
                PresentationTypeEnum::SOLO->value,
                PresentationTypeEnum::MINI->value,
                PresentationTypeEnum::PREMINI->value,
                PresentationTypeEnum::BIG->value,
                PresentationTypeEnum::INTERVIEW->value,
                PresentationTypeEnum::LIVECODING->value
            ]);
            $table->enum('status_presentation' , [
                StatusPresentationEnum::FINISH->value , //selesai
                StatusPresentationEnum::NOTFINISH->value , //ditolak
                StatusPresentationEnum::ONGOING->value , //accepted
                StatusPresentationEnum::PENNDING->value, //ditunda
                StatusPresentationEnum::WAITING->value //mengajukan
            ])
                ->default(StatusPresentationEnum::WAITING);
            $table->date('planning_date_presentation');
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
