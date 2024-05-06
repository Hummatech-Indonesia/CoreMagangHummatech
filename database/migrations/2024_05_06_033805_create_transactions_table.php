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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->char('reference', 50);
            $table->char('merchant_ref', 50);
            $table->string('payment_method');
            $table->string('payment_name');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('callback_url');
            $table->string('return_url');
            $table->string('pay_code');
            $table->string('pay_url')->nullable();
            $table->integer('amount');
            $table->integer('total_fee');
            $table->enum('status', [TransactionStatusEnum::PENDING->value, TransactionStatusEnum::PAID->value, TransactionStatusEnum::EXPIRED->value, TransactionStatusEnum::CANCELLED->value, TransactionStatusEnum::FAILED->value, TransactionStatusEnum::REFUND->value, TransactionStatusEnum::UNPAID->value]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
