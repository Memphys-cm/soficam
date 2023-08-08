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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_code')->default(Str::upper(Str::random(7)) . "" . now()->format('msu'));
            $table->string('receipt_qr_code')->nullable();
            $table->string('receipt_url')->nullable();
            $table->foreignId('sale_id')->on('sales')->nullable()->index();
            $table->foreignId('receveur_id')->on('users')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
