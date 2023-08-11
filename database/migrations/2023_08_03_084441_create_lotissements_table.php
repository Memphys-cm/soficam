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
        Schema::create('lotissements', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('titre_foncier_id')->index()->on('titre_fonciers')->default(1);
            $table->foreignId('maeture_id')->on('membre_du_cabinets')->nullable();
            $table->foreignId('lotisseur_id')->on('membre_du_cabinets')->nullable();
            $table->foreignId('promoteur_immobiliere_id')->on('membre_du_cabinets')->nullable();
            $table->foreignId('agent_immobiliere_id')->on('membre_du_cabinets')->nullable();
            $table->foreignId('urbaniste_id')->on('membre_du_cabinets')->nullable();
            $table->foreignId('controlleur_id')->on('membre_du_cabinets')->nullable();
            $table->foreignId('geometre_id')->on('membre_du_cabinets')->nullable();
            $table->longText('commentaires')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotissements');
    }
};
