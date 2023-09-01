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
        Schema::create('sub_divisions', function (Blueprint $table) {
            $table->id();
           $table->uuid('uuid')->unique()->index();
            $table->string('code');
            $table->foreignId('division_id')->index()->constrained('divisions');
            $table->string('sub_division_name_en')->index();
            $table->string('sub_division_name_fr')->index();
            $table->tinyInteger('status')->nullable()->default(1);
            $table->float('total_surface_area',100,0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_divisions');
    }
};
