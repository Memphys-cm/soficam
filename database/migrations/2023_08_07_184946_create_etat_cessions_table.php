<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpOffice\PhpSpreadsheet\Worksheet\Table\TableStyle;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('etat_cessions', function (Blueprint $table) {
            $table->id();
           $table->uuid('uuid')->unique()->index();
            $table->string('reference_etat_cession')->default(Str::upper(Str::random(6)) . "" . now()->format('msu'));
            $table->enum('type_personne',['morale','physique'])->default('physique');
            $table->enum('type_operation',['bornage','morcellement','mutation_totale', 'retrait_indivision','immatriculation_direct','concession']);
            $table->enum('zone',['terrain_urbain','terrain_rurale']);
            $table->foreignId('titre_foncier_id')->nullable();
            $table->foreignId('geometre_id')->on('users')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('sub_division_id');
            $table->string('lieu_dit')->nullable();
            $table->float('superficie_en_m2',20,2);
            $table->float('cout',30,2);
            $table->float('frais_suplementaires',30,2);
            $table->float('cout_etat_cession',30,2);
            $table->enum('status', ['pending_payment','paid','cancelled','completed'])->default('pending_payment');
            $table->longText('commentaires')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etat_cessions');
    }
};

