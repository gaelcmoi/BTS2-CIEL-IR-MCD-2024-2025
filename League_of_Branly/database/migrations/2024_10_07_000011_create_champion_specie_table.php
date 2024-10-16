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
        Schema::create('champion_specie', function (Blueprint $table) {
            $table->id('champion_species_id');
            $table->unsignedBigInteger('champion_id');
            $table->unsignedBigInteger('specie_id');

            $table->foreign('champion_id')
                  ->references('champion_id')
                  ->on('champions')
                  ->onDelete('cascade');

            $table->foreign('specie_id')
                  ->references('specie_id')
                  ->on('species')
                  ->onDelete('cascade');

            $table->unique(['champion_id', 'specie_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champion_specie');
    }
};
