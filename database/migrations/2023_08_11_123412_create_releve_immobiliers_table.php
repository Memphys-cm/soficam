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
        Schema::create('releve_immobiliers', function (Blueprint $table) {
            $table->id();
            $table->string('releve_number');
            $table->foreignId('requestor_id')->index()->constrained('users');
            $table->float('price');
            $table->timestamp('validity')->default(now()->addMonths(3));
            $table->enum('releves_type',['personne_physique','personne_morale']);
            $table->enum('type',['immobilier','bien_immobilier']);
            $table->enum('status',['pending_payment','expired','active'])->default('pending_payment');
            $table->longText('releve_reason');
            $table->string('recorded_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('releve_immobiliers');
    }
};
