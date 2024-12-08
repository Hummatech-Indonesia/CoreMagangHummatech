
<?php

use App\Models\ProjectRevision;
use App\Models\Student;
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
        Schema::create('assigned_task_project_students', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('student_id')->constrained('students');
            // $table->foreignId('presentation_id')->constrained('presentations');
            $table->foreignIdFor(ProjectRevision::class)->constrained('project_revisions');
            $table->foreignIdFor(Student::class)->constrained('students');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assigned_task_project_students');
    }
};
