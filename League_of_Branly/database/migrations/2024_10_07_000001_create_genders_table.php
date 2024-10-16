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
        Schema::create('genders', function (Blueprint $table) {
            $table->id('gender_id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        $genders = [
            ['name' => 'Male'],
            ['name' => 'Female'],
            ['name' => 'Other'],
            ['name' => 'Unknown'],
        ];

        DB::table('genders')->insert($genders);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genders');
    }
};
