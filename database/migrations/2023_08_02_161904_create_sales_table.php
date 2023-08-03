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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->float('sales_amount');
            $table->foreignId('user_id')->on('users')->nullable()->index();
            $table->string('sales_code')->nullable();
            $table->string('purchaser')->nullable();
            $table->enum('payment_type', ['cash','tranche'])->default('cash');
            $table->string('sales_type');
            $table->string('advance')->nullable();
            $table->string('balance')->nullable();
            $table->longText('observation')->nullable();
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
