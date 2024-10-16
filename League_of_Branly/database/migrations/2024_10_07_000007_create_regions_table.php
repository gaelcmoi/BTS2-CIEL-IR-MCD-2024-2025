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
        Schema::create('regions', function (Blueprint $table) {
            $table->id('region_id');
            $table->string('name')->unique();
            $table->text('lore')->nullable();
            $table->timestamps();
        });
        $regions = [
            [
                'name' => 'Bandle City',
                'lore' => 'A mystical land of magic, home to many yordles.'
            ],
            [
                'name' => 'Bilgewater',
                'lore' => 'A port city teeming with pirates, sea monsters, and treasure hunters.'
            ],
            [
                'name' => 'Demacia',
                'lore' => 'A lawful kingdom known for its military might and noble warriors.'
            ],
            [
                'name' => 'Ionia',
                'lore' => 'A land of natural beauty and spiritual magic.'
            ],
            [
                'name' => 'Noxus',
                'lore' => 'An expansionist empire valuing strength above all.'
            ],
            [
                'name' => 'Piltover',
                'lore' => 'A city of progress, innovation, and hextech technology.'
            ],
            [
                'name' => 'Shadow Isles',
                'lore' => 'A land cursed by dark magic and inhabited by restless spirits.'
            ],
            [
                'name' => 'Shurima',
                'lore' => 'An ancient desert empire with a rich history and powerful magic.'
            ],
            [
                'name' => 'Targon',
                'lore' => 'A mountainous region home to celestial beings and their mortal followers.'
            ],
            [
                'name' => 'Freljord',
                'lore' => 'A harsh, winter land divided by warring tribes.'
            ],
            [
                'name' => 'Void',
                'lore' => 'A nightmarish dimension of alien horrors.'
            ],
            [
                'name' => 'Zaun',
                'lore' => 'An underground city rife with pollution, crime, and unchecked experimentation.'
            ],
            [
                'name' => 'Ixtal',
                'lore' => 'A secretive jungle realm mastering elemental magic.'
            ],
        ];
        DB::table('regions')->insert($regions);
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};