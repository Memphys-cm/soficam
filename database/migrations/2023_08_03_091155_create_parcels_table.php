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
        
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lotissement_id')->on('lotissements')->nullable()->index();
            $table->foreignId('titre_foncier_id')->on('titre_fonciers')->index();
            $table->foreignId('block_id')->on('blocks')->nullable()->index();
            $table->integer('numero_du_lot')->nullable();
            $table->integer('surperficie_du_lot')->nullable();
            $table->enum('statut_du_lot', ['batit', 'non_batit'])->nullable();
            $table->enum('type',['public','normale'])->deafult('normale');
            $table->string('laffectation_du_lot')->nullable();
            $table->date('date_lotissement')->nullable();
            $table->foreignId('geometre_id')->on('membre_du_cabinets')->nullable();
            $table->foreignId('geometre_cabinet_id')->on('cabinets')->nullable();
            $table->string('numero_ccp')->nullable();
            $table->json('coordonnees_du_lot')->nullable();
            $table->date('date_renseignement_coordonnees')->nullable();
            $table->longText('commentaire_du_geometre')->nullable();
            $table->foreignId('notaire_id')->on('membre_du_cabinets')->nullable();
            $table->foreignId('cabinet_notaire_id')->on('cabinets')->nullable();
            $table->longText('letude_du_notaire')->nullable();
            $table->date('date_de_letude_notaire')->nullable();
            $table->longText('commentaire_du_notaire')->nullable();
            $table->enum('type_de_venter',['simple','mutation_totale'])->default('simple');
            $table->enum('superficie_a_vendre',['totale','partielle'])->nullable();
            $table->float('prix_du_m2',30,2)->nullable();
            $table->integer('superficie_vendu')->nullable();
            $table->integer('superficie_restant')->nullable();
            $table->enum('type_de_versement',['tranche','cash'])->nullable();
            $table->float('montant_de_la_vente',30,2)->nullable();
            $table->float('montant_versee',30,2)->nullable();
            $table->float('montant_restant',30,2)->nullable();
            $table->float('impot_sur_la_vente',30,2)->nullable();
            $table->date('date_de_vente')->nullable();
            $table->string('lagent_traitant')->nullable();
            $table->string('lauthorite_competente')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcels');
    }
};



// -> Releve Imo -> (transactional records -> titre_foncier) - CP details
// -> Releve Bien Imo -> (All assests, (lot, land_title) that a user has in a given locality)