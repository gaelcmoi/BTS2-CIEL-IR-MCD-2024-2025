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
        Schema::create('champion_range', function (Blueprint $table) {
            $table->id('champion_range_id');
            $table->unsignedBigInteger('champion_id');
            $table->unsignedBigInteger('range_id');

            $table->foreign('champion_id')
                  ->references('champion_id')
                  ->on('champions')
                  ->onDelete('cascade');

            $table->foreign('range_id')
                  ->references('range_id')
                  ->on('range_types')
                  ->onDelete('cascade');

            $table->unique(['champion_id', 'range_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champion_range');
    }
};
