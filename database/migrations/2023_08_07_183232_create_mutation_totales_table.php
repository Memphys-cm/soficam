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
        Schema::create('mutation_totales', function (Blueprint $table) {
            $table->id();
            $table->string('numero_mutation_totale');
            $table->foreignId('titre_foncier_id')->nullable();
            $table->foreignId('certificate_prioprietes_id')->nullable();
            $table->foreignId('service_id')->on('services')->nullable()->index();
            $table->date('validite_CP')->nullable();
            $table->string('numero_reference_CP')->nullable();
            $table->string('numero_reference_CU')->nullable();

            $table->foreignId('geometre_id')->constrained('membre_du_cabinets')->nullable();
            $table->string('numero_reference_plan')->nullable();
            $table->foreignId('etat_cession_id')->on('etat_cessions')->nullable()->index();
            $table->longText('commantaires_geometre')->nullable();
            $table->string('numero_reference_quittance_etat_cession')->nullable();
            $table->enum('statut_geometre',['pending_payment','ongoing','completed','pending'])->default('pending');

            $table->foreignId('notaire_id')->constrained('membre_du_cabinets')->nullable();
            $table->foreignId('parcel_id')->on('parcels')->nullable()->index();
            $table->string('numero_reference_acte_expidition')->nullable();
            $table->enum('statut_notaire',['ongoing','completed','pending'])->default('pending');
            $table->longText('commantaires_notaire')->nullable();

            $table->foreignId('conservateur_id')->on('users')->nullable()->index();
            $table->float('prix',30,2);
            $table->string('numero_reference_quittance_ordre_versement')->nullable();
            $table->foreignId('bordereau_analytique_id')->on('bordereau_analytiques')->nullable()->index();
            $table->enum('statut_conservateur',['pending_payment','ongoing','completed','pending'])->default('pending');
            $table->longText('commantaires_conservateur')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutation_totals');
    }
};
