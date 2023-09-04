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
            $table->uuid('uuid')->unique()->index()->nullable();
            $table->string('reference')->nullable();
            $table->string('localisation')->nullable();
            $table->string('superficie')->nullable();
            $table->foreignId('region_id')->index();
            $table->foreignId('division_id')->index();
            $table->foreignId('sub_division_id')->index();
            $table->foreignId('sub_division_id')->index();
            $table->string('zone')->nullable();
            $table->string('etat_terrain')->nullable();
            $table->float('superficie')->nullable();
            $table->string('volume')->nullable();
            $table->string('folio')->nullable();
            $table->string('numero_cp')->nullable();
            $table->foreignId('titre_foncier_id')->index()->nullable();
            $table->string('numero_bordereau_transmission')->nullable();
            $table->string('next_step')->nullable();
            $table->string('statut')->nullable();
            $table->string('StatutStyle')->nullable();
            $table->date('date_delivrance')->nullable();
            $table->json('comissions')->nullable();

            $table->foreignId('service_id')->on('services')->index()->nullable();
            $table->foreignId('cotation_user_id')->on('users')->index()->nullable();
            $table->string('observation_cotation')->nullable();
            $table->date('date_cotation')->nullable();
            $table->enum('status_cotation', ['no_done','pending','done'])->default('no_done');

            $table->float('montant_ordre_versement')->nullable();
            $table->string('numero_ordre_versement')->nullable();
            // $table->float("superficie_ordre_versement")->nullable();
            $table->string('numero_arrete_ordre_versement')->nullable();
            $table->date('date_ordre_versement')->nullable();
            $table->enum('status_ordre_versement', ['no_done','pending','done'])->default('no_done');

            $table->string('status_avis_publique')->nullable();
            $table->date('date_avis_publique')->nullable();
            $table->date('date_avis_publique_signe')->nullable();
            $table->date('date_debut_certificat_d_affichage')->nullable();
            $table->date('date_fin_certificat_d_affichage')->nullable();

            $table->date('date_convocation')->nullable();
            $table->string('status_convocation')->nullable();

            $table->foreignId('geometre_id')->on('users')->index()->nullable();
            $table->date('date_geometre_enregistrer')->nullable();
            $table->date('pv_enregistrer')->nullable();
            $table->date('dossier_technique_complet')->nullable();
            $table->date('dossier_jumelage')->nullable();
            $table->date('transmission_csdaf')->nullable();
            $table->date('dossier_administratif_complet')->nullable();
            $table->date('dossier_technique_enregistrer')->nullable();
            $table->foreignId('etat_cession_id')->on('etat_cessions')->index()->nullable();
            $table->date('etat_cession')->nullable();
            $table->date('etat_cession_payer')->nullable();

            $table->date('date_publication_dossier_vise')->nullable();
            $table->date('date_signature_bulletin')->nullable();
            $table->json('coordonnees')->nullable();
            $table->string('limit_nord')->nullable();
            $table->string('limit_sud')->nullable();
            $table->string('limit_est')->nullable();
            $table->string('limit_ouest')->nullable();
            $table->date('dossier_technique_created')->nullable();
            $table->date('descente_terrain')->nullable();
            $table->date('transmission_dos_tech_csdaf')->nullable();
            $table->date('transmission_delegue_departemental')->nullable();
            $table->date('transmission_delegue_regional')->nullable();
            $table->date('date_calendrier_descente')->nullable();
            $table->string('service')->nullable();

            $table->date('date_dossier_signe_csr_cadastre')->nullable();
            $table->date('date_dossier_transmi_au_Mindcaf')->nullable();
            $table->date('date_dossier_complet_transmi_CSRegional_mindcaf')->nullable();
            $table->date('date_dossier_vise_en_attente_publication')->nullable();

            $table->foreignId('service_dossier_complet_id')->on('services')->index()->nullable();
            $table->foreignId('user_dossier_complet_id')->on('users')->index()->nullable();
            $table->longText('observation_dossier_complet')->nullable();
            $table->date('date_dossier_complet_vise_coter')->nullable();

            $table->string('numero_redevance_fonciere')->nullable();
            $table->date('ordre_redevance_fonciere')->nullable();
            $table->float('montant_ordre_redevance_fonciere')->nullable();

            $table->foreignId('cadre_id')->on('users')->index()->nullable();
            $table->longText('observation_cotation_cadre')->nullable();
            $table->date('date_cotation_cadre')->nullable();
            $table->date('coter_csrcadastre')->nullable();
            $table->date('dos_tech_transmis_drm')->nullable();
            $table->date('dos_compl_csrdaf')->nullable();
            $table->date('cotation_compl_csrdaf')->nullable(); 
            $table->string('numero_serie')->nullable();

            
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
