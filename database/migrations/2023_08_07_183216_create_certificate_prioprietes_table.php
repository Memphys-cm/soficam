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
        Schema::create('certificate_proprietes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('titre_foncier_id')->index();
            $table->string('certificate_proprietes_number');
            $table->foreignId('requestor_id')->index()->constrained('users');
            $table->float('price');
            $table->timestamp('validity')->default(now()->addMonths(3));
            $table->enum('certificate_proprietes_type',['personne_physique','personne_morale']);
            $table->enum('status',['pending_payment','expired','active']);
            $table->longText('certificate_propriete_reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_prioprietes');
    }
};
