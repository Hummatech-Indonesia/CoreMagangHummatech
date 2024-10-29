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
            $table->string('project_name')->nullable();
            $table->foreignId('mentor_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
                StatusPresentationEnum::FINISH->value ,
                StatusPresentationEnum::NOTFINISH->value ,
                StatusPresentationEnum::ONGOING->value ,
                StatusPresentationEnum::PENNDING->value,
                StatusPresentationEnum::WAITING->value
            ])
                ->default(StatusPresentationEnum::WAITING);
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
