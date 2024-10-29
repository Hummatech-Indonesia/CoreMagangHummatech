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
        Schema::create('hummatask_teams_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('presentation_id')->references('id')->on('presentations');
            $table->foreignId('member_id')->constrained('users');
            $table->enum('status',[\App\Enum\StatusMemberTeam::Member->value,\App\Enum\StatusMemberTeam::Leader->value]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hummatask_teams_members');
    }
};
