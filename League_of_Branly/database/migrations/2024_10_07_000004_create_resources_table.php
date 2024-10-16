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
        Schema::create('resources', function (Blueprint $table) {
            $table->id('resource_id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        $resources = [
            ['name' => 'Mana'],
            ['name' => 'Energy'],
            ['name' => 'Fury'],
            ['name' => 'Heat'],
            ['name' => 'Ferocity'],
            ['name' => 'Shield'],
            ['name' => 'Bloodthirst'],
            ['name' => 'Flow'],
            ['name' => 'Courage'],
            ['name' => 'None'],
        ];

        DB::table('resources')->insert($resources);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
