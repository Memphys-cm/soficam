<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('sales_code')->default(Str::upper(Str::random(7)) . "" . now()->format('msu'));
            $table->float('sales_amount', 10, 2);
            $table->float('sales_amount_tax_excluded', 10, 2)->nullable();
            $table->float('tva_amount', 10, 2)->nullable();
            $table->float('sales_discount', 10, 2)->nullable();
            $table->float('advanced_amount', 10, 2)->nullable();
            $table->float('remaining_amount', 10, 2)->nullable();
            $table->string('sales_type');
            $table->foreignId('user_id')->on('users')->nullable()->index();
            $table->foreignId('receveur_id')->on('users')->nullable()->index();
            $table->foreignId('service_id')->on('users')->index()->nullable();
            $table->enum('payment_status',['pending_payment','totally_paid','partially_paid'])->default('pending_payment');
            $table->enum('payment_method',['mtn_mobile_money','orange_money','cash','cheque','bank_transfer'])->default('cash');
            $table->longText('commentaires')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
