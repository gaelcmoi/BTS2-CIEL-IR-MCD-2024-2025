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
        Schema::create('champion_region', function (Blueprint $table) {
            $table->id('champion_region_id');
            $table->unsignedBigInteger('champion_id');
            $table->unsignedBigInteger('region_id');

            $table->foreign('champion_id')
                  ->references('champion_id')
                  ->on('champions')
                  ->onDelete('cascade');

            $table->foreign('region_id')
                  ->references('region_id')
                  ->on('regions')
                  ->onDelete('cascade');
            $table->unique(['champion_id', 'region_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champion_region');
    }
};
