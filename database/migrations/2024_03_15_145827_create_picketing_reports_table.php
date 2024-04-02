<?php

use App\Enum\PicketingStatusEnum;
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
        Schema::create('picketing_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('proof');
            $table->longText('description');
            $table->enum('status', [PicketingStatusEnum::PENDING->value, PicketingStatusEnum::ACCEPTED->value, PicketingStatusEnum::REJECTED->value])->default(PicketingStatusEnum::PENDING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('picketing_reports');
    }
};
