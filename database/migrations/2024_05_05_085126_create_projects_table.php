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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->text('description');
            $table->date('start_date')->default(Carbon::today());
            $table->date('end_date')->default(Carbon::tomorrow());
            $table->enum('type_project',[
                \App\Enum\PresentationTypeEnum::SOLO->value,
                \App\Enum\PresentationTypeEnum::MINI->value,
                \App\Enum\PresentationTypeEnum::PREMINI->value,
                \App\Enum\PresentationTypeEnum::BIG->value,
                \App\Enum\PresentationTypeEnum::INTERVIEW->value,
                \App\Enum\PresentationTypeEnum::LIVECODING->value
            ]);
            $table->enum('status_project',[
                \App\Enum\ProjectAcceptStatus::ACCEPT->value,
                \App\Enum\ProjectAcceptStatus::REJECTED->value,
                \App\Enum\ProjectAcceptStatus::WAITING->value
            ])->default(\App\Enum\ProjectAcceptStatus::WAITING->value);
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
