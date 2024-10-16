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
        Schema::create('positions', function (Blueprint $table) {
            $table->id('position_id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        $positions = [
            ['name' => 'Top'],
            ['name' => 'Jungle'],
            ['name' => 'Mid'],
            ['name' => 'Bot'],
            ['name' => 'Support'],
        ];

        DB::table('positions')->insert($positions);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
