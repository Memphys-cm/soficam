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
        Schema::create('activites', function (Blueprint $table) {
            $table->id();
           $table->uuid('uuid')->unique()->index();
            $table->foreignId('category_activite_id')->index();
            $table->string('nom_activite');
            $table->enum('type_de_facturation',['value','percentage','per_m2']);
            $table->float('value',30,2);
            $table->float('value_minimale',30,2)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activites');
    }
};
