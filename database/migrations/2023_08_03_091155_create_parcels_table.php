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
            $table->integer('lot_no')->nullable();
            $table->integer('lot_area')->nullable();
            $table->string('lot_status')->nullable();
            $table->string('notary_office')->nullable();
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
