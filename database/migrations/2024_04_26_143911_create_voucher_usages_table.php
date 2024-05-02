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
        Schema::create('voucher_usages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vouchers_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('transaction_histories_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('students_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->dateTime('used_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher_usages');
    }
};
