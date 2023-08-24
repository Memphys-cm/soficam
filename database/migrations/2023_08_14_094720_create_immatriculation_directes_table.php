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
        Schema::create('immatriculation_directes', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('localisation');
            $table->foreignId('titre_foncier_id')->index()->nullable();
            $table->foreignId('user_id')->index()->constrained('users');
            $table->string('numero_bordereau_transmission')->nullable;
            $table->string('status')->nullable();
            $table->string('StatusStyle')->nullable();
            $table->date('date_delivrance')->nullable();
            $table->json('comissions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('immatriculation_directes');
    }
};
