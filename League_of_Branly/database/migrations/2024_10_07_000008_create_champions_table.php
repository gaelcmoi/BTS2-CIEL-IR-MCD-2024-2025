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
        Schema::create('champions', function (Blueprint $table) {
            $table->id('champion_id');
            $table->string('name')->unique();
            $table->string('title')->nullable();
            $table->text('lore')->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->unsignedBigInteger('resource_id')->nullable();
            $table->unsignedBigInteger('year_id')->nullable();
            $table->timestamps();

            $table->foreign('gender_id')
                    ->references('gender_id')
                    ->on('genders')
                    ->onDelete('set null');

            $table->foreign('resource_id')
                    ->references('resource_id')
                    ->on('resources')
                    ->onDelete('set null');

            $table->foreign('year_id')
                    ->references('year_id')
                    ->on('years')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champions');
    }
};
