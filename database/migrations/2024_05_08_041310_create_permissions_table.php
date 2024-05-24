<?php

use App\Enum\PermissionEnum;
use App\Enum\StatusApprovalPermissionEnum;
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
        Schema::create('student_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('status', ['izin', 'sakit']);
            $table->text('description');
            $table->string('proof');
            $table->enum('status_approval', [StatusApprovalPermissionEnum::AGREE->value, StatusApprovalPermissionEnum::REJECT->value, StatusApprovalPermissionEnum::PENDING->value])->default(StatusApprovalPermissionEnum::PENDING->value);
            $table->date('start');
            $table->date('end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
