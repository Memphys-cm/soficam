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
        Schema::table('immatriculation_directes', function (Blueprint $table) {
            $table->string('pv_administratif')->nullable();
            $table->string('pv_bornage')->nullable();
            $table->json('cni_files')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('immatriculation_directes', function (Blueprint $table) {
            $table->dropColumn('pv_administratif');
            $table->dropColumn('pv_bornage');
            $table->dropColumn('cni_files');
        });
    }
};
