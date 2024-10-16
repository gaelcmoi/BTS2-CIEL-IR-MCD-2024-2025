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
        Schema::create('species', function (Blueprint $table) {
            $table->id('specie_id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        $species = [
            ['name' => 'Human'],
            ['name' => 'Yordle'],
            ['name' => 'Vastaya'],
            ['name' => 'Void Creature'],
            ['name' => 'Undead'],
            ['name' => 'Golem'],
            ['name' => 'Celestial'],
            ['name' => 'Darkin'],
            ['name' => 'Demon'],
            ['name' => 'Aspect'],
            ['name' => 'Magically Altered'],
            ['name' => 'Spirit'],
            ['name' => 'God-Warrior'],
            ['name' => 'Iceborn'],
            ['name' => 'Brackern'],
            ['name' => 'Minotaur'],
            ['name' => 'Troll'],
            ['name' => 'Unknown'],
        ];

        DB::table('species')->insert($species);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('species');
    }
};
