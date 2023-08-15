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
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['pending_payment', 'active', 'inactive']);
            $table->foreignId('titre_foncier_id')->on('titre_fonciers')->index();
            $table->enum('type_charge',['prenote','hypotheque','suspendu'])->default('prenote');
            $table->foreignId('requestor_id')->on('users')->nullable();
            $table->float('prix',30,2);
            $table->longText('commantaires');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charges');
    }
};
