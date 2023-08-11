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
            $table->foreignId('block_id')->index()->constrained('blocks');
            $table->foreignId('titre_foncier_id')->index()->constrained('titre_fonciers');
            $table->integer('numero_du_lot')->nullable();
            $table->integer('surperficie_du_area')->nullable();
            $table->enum('statut_du_lot', ['batit', 'non_batit'])->nullable();
            $table->enum('type',['public','normale'])->deafult('normale');
            $table->string('numero_ccp')->nullable();
            $table->json('coordonnees')->nullable();
            $table->string('lot_affectation')->nullable();
            $table->foreignId('carbinet_id')->nullable();
            $table->string('notary_clerk')->nullable();
            $table->string('geometric_pratic')->nullable();
            $table->string('geometrician')->nullable();
            $table->date('date')->nullable();
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