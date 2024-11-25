<?php

use App\Enum\ProjectAcceptStatus;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->constrained('divisions');
            $table->foreignId('mentor_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('project_name');
            $table->string('link');
            $table->text('description');
            $table->date('start_date')->default(Carbon::today());
            $table->date('end_date')->default(Carbon::tomorrow());

            $table->enum('type_project',allowed: [
                \App\Enum\PresentationTypeEnum::SOLO->value,
                \App\Enum\PresentationTypeEnum::MINI->value,
                \App\Enum\PresentationTypeEnum::PREMINI->value,
                \App\Enum\PresentationTypeEnum::BIG->value,
                \App\Enum\PresentationTypeEnum::INTERVIEW->value,
                \App\Enum\PresentationTypeEnum::LIVECODING->value
            ]);

            $table->enum('status',[
                ProjectAcceptStatus::ACCEPT->value,
                ProjectAcceptStatus::REJECTED->value,
                ProjectAcceptStatus::WAITING->value,
            ])->default(ProjectAcceptStatus::WAITING->value);

            $table->enum('status_project',[
                \App\Enum\TaskStatusEnum::PENDING->value,
                \App\Enum\TaskStatusEnum::INPROGRESS->value,
                \App\Enum\TaskStatusEnum::REVISION->value,
                \App\Enum\TaskStatusEnum::COMPLETED->value,
            ])->default(\App\Enum\TaskStatusEnum::PENDING->value);
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
