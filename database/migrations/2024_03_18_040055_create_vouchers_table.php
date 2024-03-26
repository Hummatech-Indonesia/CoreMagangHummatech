<?php

use App\Enum\TypeVoucherEnum;
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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code_voucher');
            $table->string('presentase');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('type' , [TypeVoucherEnum::QUOTA->value , TypeVoucherEnum::UNLIMITED->value]);
            $table->string('quota')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
