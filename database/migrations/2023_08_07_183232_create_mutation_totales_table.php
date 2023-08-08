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
        Schema::create('mutation_totals', function (Blueprint $table) {
            $table->id();
            $table->string('mutation_total_number');
            $table->foreignId('titre_foncier_id')->nullable();
            $table->foreignId('certificate_prioprietes_id')->nullable();
            $table->string('CP_reference_number')->nullable();
            $table->string('CP_file_path')->nullable();
            $table->date('CP_validity')->nullable();
            $table->string('CU_reference_number')->nullable();
            $table->string('CU_file_path')->nullable();
            $table->string('reference_plan')->nullable();
            $table->string('plan_file_path')->nullable();
            $table->string('reference_acte_expidition')->nullable();
            $table->string('file_path_expidition')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutation_totals');
    }
};
