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
        Schema::create('cabinets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->on('regions')->nullable()->Index();
            $table->foreignId('division_id')->on('divisions')->nullable()->Index();
            $table->foreignId('sub_division_id')->on('sub_divisions')->nullable()->Index();
            $table->string('nom_cabinet')->index();
            $table->enum('type_cabinet',['geometre', 'notaire', 'lotisseur', 'maeture', 'promoteur_immobiliere', 'agent_immobiliere', 'urbaniste', 'controlleur']);
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notary_offices');
    }
};
