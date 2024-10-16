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
        Schema::create('range_types', function (Blueprint $table) {
            $table->id('range_id');
            $table->string('type')->unique();
            $table->timestamps();
        });

        $ranges = [
            ['type' => 'Melee'],
            ['type' => 'Ranged'],
        ];

        DB::table('range_types')->insert($ranges);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('range_types');
    }
};
