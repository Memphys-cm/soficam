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
        Schema::create('titre_fonciers', function (Blueprint $table) {
            $table->id();
           $table->uuid('uuid')->unique()->index();
            $table->string('numero_titre_foncier')->index()->unique();
            $table->string('numero_conservation')->index()->nullable();
            $table->date('date_de_delivrance_du_TF');
            $table->string('numero_du_duplicata')->nullable();
            $table->foreignId('region_id')->index();
            $table->foreignId('division_id')->index();
            $table->foreignId('sub_division_id')->index();
            $table->string('groupement')->nullable();
            $table->string('lieu_dit')->nullable();
            $table->enum('zone',['urbain','rurale']);
            $table->string('numero_folio')->nullable();
            $table->string('volume')->nullable();
            $table->string('superficie_du_TF_mere');
            $table->string('superficie_vendue_du_TF_mere')->nullable();
            $table->string('superficie_restant_du_TF_mere')->nullable();
            $table->enum('etat_TF',['HYPOTHEQUE', 'DISPONIBLE', 'PRENOTE','SUSPENDU', 'RETRAIT', 'ANNULATION']);
            $table->enum('etat_terrain',['batit','non_batit']);
            $table->string('provenance_TF');
            $table->string('numero_bordereau_analytique')->nullable();
            $table->string('volume_du_bordereau_analytique')->nullable();
            $table->date('date_detablissement_du_bordereau_analytique')->nullable();
            $table->foreignId('geometre_id')->on('membre_du_cabinets')->nullable();
            $table->foreignId('notaire_id')->on('membre_du_cabinets')->nullable();
            $table->foreignId('conservateur_id')->on('users')->nullable();
            $table->string('numero_ccp')->nullable();
            $table->json('coordonnees')->nullable();
            $table->json('coordonnees_utm')->nullable();
            $table->string('limit_nord');
            $table->string('limit_sud');
            $table->string('limit_est');
            $table->string('limit_ouest');
            $table->string('recorded_by')->nullable();
            $table->string('nom_et_prenoms_de_largent_traitant')->nullable();
            $table->string('le_conservateur')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titre_fonciers');
    }
};
