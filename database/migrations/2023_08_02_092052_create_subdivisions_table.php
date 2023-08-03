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
        Schema::create('subdivisions', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->foreignId('land_id')->index()->constrained('divisions')->default(1);
            $table->string('maeture')->nullable();
            $table->string('property_developer')->nullable();
            $table->string('estate_agent')->nullable();
            $table->string('lotisser')->nullable();
            $table->string('geometric_pratice')->nullable();
            $table->string('geometric')->nullable();
            $table->string('urbanist')->nullable();
            $table->string('controller')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subdivisions');
    }
};
