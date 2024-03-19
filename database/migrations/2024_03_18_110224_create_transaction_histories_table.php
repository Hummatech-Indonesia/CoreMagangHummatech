<?php

use App\Enum\TransactionStatusEnum;
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
        Schema::create('transaction_histories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->string('transaction_id');
            $table->string('reference');
            $table->string('payment_code');
            $table->string('payment_name');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('amount')->nullable()->default(0);
            $table->dateTime('issued_at')->useCurrent();
            $table->dateTime('expired_at')->useCurrent();
            $table->text('checkout_url');
            $table->enum('status', [TransactionStatusEnum::PENDING->value, TransactionStatusEnum::PAID->value, TransactionStatusEnum::EXPIRED->value, TransactionStatusEnum::CANCELLED->value])->nullable()->default(TransactionStatusEnum::PENDING->value);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_histories');
    }
};
