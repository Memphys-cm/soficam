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
        Schema::create('fake_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('qualification');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('conservation_id');
            $table->string('titre_foncier');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('profession')->nullable();
            $table->string('motifs')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('localisation')->nullable();
            $table->string('identifiant')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->foreign('conservation_id')->references('id')->on('conservations');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fake_certificates');
    }
};
