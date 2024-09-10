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
        Schema::create('conservations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->index();
             $table->string('code');
             $table->foreignId('division_id')->index()->constrained('divisions');
             $table->string('conservation_name_en')->index();
             $table->string('conservation_name_fr')->index();
             $table->tinyInteger('status')->nullable()->default(1);
             $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conservations');
    }
};
