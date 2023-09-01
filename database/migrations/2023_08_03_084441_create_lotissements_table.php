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
           $table->uuid('uuid')->unique()->index();
            $table->string('code');
            $table->foreignId('titre_foncier_id')->index()->constrained('titre_fonciers')->default(1);
            $table->foreignId('geometre_id')->constrained('membre_du_cabinets')->nullable();
            $table->foreignId('geometre_cabinet_id')->on('cabinets')->nullable();
            $table->string('maeture')->nullable();
            $table->string('promoteur_immobiliere')->nullable();
            $table->string('lotisseur')->nullable();
            $table->string('agent_immobiliere')->nullable();
            $table->string('geometric')->nullable();
            $table->string('urbaniste')->nullable();
            $table->string('controlleur')->nullable();
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
