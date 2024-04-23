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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignUuid('transaction_histories_id')->references('id')->on('transaction_histories')->cascadeOnDelete();
            $table->string('name');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('amount')->default(1);
            $table->foreignId('products_id')->nullable()->constrained()->nullOnDelete()->nullOnUpdate();
            $table->foreignId('courses_id')->nullable()->constrained()->nullOnDelete()->nullOnUpdate();
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
