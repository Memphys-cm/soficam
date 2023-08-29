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
        Schema::table('titre_fonciers', function (Blueprint $table) {
            //
            $table->float('price, 10, 2')->nullable();
            $table->float('tax_amount, 10, 2')->nullable();
            $table->enum('status_tax',['payer','non_payer'])->default('non_payer');
            $table->date('date_tax')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('titre_fonciers', function (Blueprint $table) {
            //
        });
    }
};
