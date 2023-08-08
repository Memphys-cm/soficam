<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('numero_certificate_proprietes')->default(Str::upper(Str::random(6)) . "" . now()->format('msu'));
            $table->foreignId('requestor_id')->on('users')->index();
            $table->float('price');
            $table->timestamp('validity')->default(now()->addMonths(3));
            $table->enum('type_de_personne',['physique','morale'])->default('physique');
            $table->enum('status',['pending_payment','expired','active'])->default('pending_payment');
            $table->longText('certificate_propriete_reason');
            $table->string('created_by')->nullable();
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
