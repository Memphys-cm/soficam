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
            $table->decimal('sale_amount', 30, 2);
            $table->foreignId('user_id')->on('users')->nullable()->index();
            $table->string('sales_code')->unique()->nullable();
            $table->string('number_of_lots_sold')->nullable();
            $table->string('purchaser_name')->nullable();
            $table->text('document_path')->nullable();
            $table->string('number_of_lots_remaining')->nullable();
            // $table->string('public_utility_area')->nullable();
            $table->string('surface_for_sale')->nullable();
            $table->enum('payment_type', ['cash','tranche'])->default('cash');
            $table->string('sale_type');
            $table->string('price_per_m²');
            $table->foreignId('notary_id')->on('notaries')->nullable();
            $table->decimal('advance', 30, 2)->nullable()->default(0.00);
            $table->decimal('balance', 30, 2)->nullable()->default(0.00);
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
