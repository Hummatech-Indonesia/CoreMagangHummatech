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
            $table->timestamps();
            $table->foreignId('vouchers_id')->references('id')->on('vouchers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('students_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('used_at');
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
