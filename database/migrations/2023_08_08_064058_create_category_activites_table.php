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
        Schema::create('category_activites', function (Blueprint $table) {
            $table->id();
           $table->uuid('uuid')->unique()->index();
            $table->string('annee_loi_fin')->nullable();
            $table->string('grand_section')->nullable();
            $table->string('nom_category')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_activites');
    }
};
