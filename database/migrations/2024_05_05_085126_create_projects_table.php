<?php

use App\StatusProjectEnum;
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
            $table->foreignId('hummatask_team_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title');
            $table->longText('description');
            $table->string('link')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', [StatusProjectEnum::PENDING->value, StatusProjectEnum::ACCEPTED->value])->default(StatusProjectEnum::PENDING->value);
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
