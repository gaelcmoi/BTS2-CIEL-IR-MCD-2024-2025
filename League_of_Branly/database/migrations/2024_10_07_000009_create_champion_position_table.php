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
        Schema::create('champion_position', function (Blueprint $table) {
            $table->id('champion_position_id');
            $table->unsignedBigInteger('champion_id');
            $table->unsignedBigInteger('position_id');

            $table->foreign('champion_id')
                  ->references('champion_id')
                  ->on('champions')
                  ->onDelete('cascade');

            $table->foreign('position_id')
                  ->references('position_id')
                  ->on('positions')
                  ->onDelete('cascade');
            $table->unique(['champion_id', 'position_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champion_position');
    }
};
