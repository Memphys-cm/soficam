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
        Schema::create('titre_foncier_operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('titre_foncier_id')->index();
            $table->string('numero_bordereau_analytique')->nullable();
            $table->string('volume_du_bordereau_analytique')->nullable();
            $table->date('date_detablissement_du_bordereau_analytique')->nullable();
            $table->enum('designation_des_operations',[
                'morcellement', 'retrait_indivision','mutation_totale','mutation_par_deces', 'prenotation_judiciaire',
                'inscription_dhypothecaire_partielle_ou_total', 'suspension_des_effets_du_TF',
                'nullite_du_TF', 'retrait_du_TF', 'rectificatif', 'radiation_hypothecaire',
                'radiation_de_la_prenotation_judiciaire'
            ]);
            $table->enum('differenciation_des_operations',['simple','force','par_voie_notariee','par_voie_judiciaire','par_voie_administrative']);
            $table->string('intervenants')->nullable();
            $table->string('designations_des_actes_delivres');
            $table->string('references_des_actes');
            $table->date('date')->nullable();
            $table->date('date_enregistrement_a_la_conversation');
            $table->longText('commentaires')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titre_foncier_operations');
    }
};
