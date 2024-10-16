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
        Schema::create('years', function (Blueprint $table) {
            $table->id('year_id');
            $table->integer('year')->unique();
            $table->timestamps();
        });

        $years = [];
        for ($year = 2009; $year <= date('Y'); $year++) {
            $years[] = ['year' => $year];
        }

        DB::table('years')->insert($years);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('years');
    }
};
