<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        $sql = <<<SQL
INSERT INTO champions (name, title, lore, gender_id, resource_id, year_id)
VALUES 
('Zoe', 'The Aspect of Twilight', 'Zoe is a cosmic messenger of Targon...', 2, 1, (SELECT year_id FROM years WHERE year = 2017)),
('Bard', 'The Wandering Caretaker', 'Bard travels through realms beyond...', 3, 1, (SELECT year_id FROM years WHERE year = 2015)),
('Rengar', 'The Pridestalker', 'Rengar is a ferocious vastayan...', 1, 5, (SELECT year_id FROM years WHERE year = 2012)),
('Gnar', 'The Missing Link', 'Gnar is a primitive yordle...', 1, 3, (SELECT year_id FROM years WHERE year = 2014)),
('Rek''Sai', 'The Void Burrower', 'Rek''Sai is a predator from the Void...', 2, 3, (SELECT year_id FROM years WHERE year = 2014)),
('Senna', 'The Redeemer', 'Senna is a tragic hero...', 2, 1, (SELECT year_id FROM years WHERE year = 2019)),
('Zac', 'The Secret Weapon', 'Zac is a Zaun-born golem...', 1, 10, (SELECT year_id FROM years WHERE year = 2013)),
('Kennen', 'The Heart of the Tempest', 'Kennen is an energetic yordle...', 1, 2, (SELECT year_id FROM years WHERE year = 2010)),
('Vladimir', 'The Crimson Reaper', 'Vladimir is a hemomancer...', 1, 7, (SELECT year_id FROM years WHERE year = 2010)),
('Ornn', 'The Fire Below the Mountain', 'Ornn is the Freljordian spirit...', 1, 1, (SELECT year_id FROM years WHERE year = 2017));

-- Champion positions
INSERT INTO champion_position (champion_id, position_id)
VALUES 
((SELECT champion_id FROM champions WHERE name = 'Zoe'), 3),
((SELECT champion_id FROM champions WHERE name = 'Bard'), 5),
((SELECT champion_id FROM champions WHERE name = 'Rengar'), 2),
((SELECT champion_id FROM champions WHERE name = 'Gnar'), 1),
((SELECT champion_id FROM champions WHERE name = 'Rek''Sai'), 2),
((SELECT champion_id FROM champions WHERE name = 'Senna'), 5),
((SELECT champion_id FROM champions WHERE name = 'Senna'), 4),
((SELECT champion_id FROM champions WHERE name = 'Zac'), 2),
((SELECT champion_id FROM champions WHERE name = 'Zac'), 1),
((SELECT champion_id FROM champions WHERE name = 'Kennen'), 1),
((SELECT champion_id FROM champions WHERE name = 'Kennen'), 3),
((SELECT champion_id FROM champions WHERE name = 'Vladimir'), 3),
((SELECT champion_id FROM champions WHERE name = 'Vladimir'), 1),
((SELECT champion_id FROM champions WHERE name = 'Ornn'), 1);

-- Champion ranges
INSERT INTO champion_range (champion_id, range_id)
VALUES 
((SELECT champion_id FROM champions WHERE name = 'Zoe'), 2),
((SELECT champion_id FROM champions WHERE name = 'Bard'), 2),
((SELECT champion_id FROM champions WHERE name = 'Rengar'), 1),
((SELECT champion_id FROM champions WHERE name = 'Gnar'), 2),
((SELECT champion_id FROM champions WHERE name = 'Gnar'), 1),
((SELECT champion_id FROM champions WHERE name = 'Rek''Sai'), 1),
((SELECT champion_id FROM champions WHERE name = 'Senna'), 2),
((SELECT champion_id FROM champions WHERE name = 'Zac'), 1),
((SELECT champion_id FROM champions WHERE name = 'Kennen'), 2),
((SELECT champion_id FROM champions WHERE name = 'Vladimir'), 2),
((SELECT champion_id FROM champions WHERE name = 'Ornn'), 1);

-- Champion regions
INSERT INTO champion_region (champion_id, region_id)
VALUES 
((SELECT champion_id FROM champions WHERE name = 'Zoe'), 9),
((SELECT champion_id FROM champions WHERE name = 'Bard'), 1),
((SELECT champion_id FROM champions WHERE name = 'Bard'), 2),
((SELECT champion_id FROM champions WHERE name = 'Bard'), 3),
((SELECT champion_id FROM champions WHERE name = 'Rengar'), 13),
((SELECT champion_id FROM champions WHERE name = 'Gnar'), 10),
((SELECT champion_id FROM champions WHERE name = 'Rek''Sai'), 11),
((SELECT champion_id FROM champions WHERE name = 'Rek''Sai'), 8),
((SELECT champion_id FROM champions WHERE name = 'Senna'), 7),
((SELECT champion_id FROM champions WHERE name = 'Senna'), 2),
((SELECT champion_id FROM champions WHERE name = 'Zac'), 12),
((SELECT champion_id FROM champions WHERE name = 'Kennen'), 4),
((SELECT champion_id FROM champions WHERE name = 'Vladimir'), 5),
((SELECT champion_id FROM champions WHERE name = 'Ornn'), 10);

-- Champion species
INSERT INTO champion_specie (champion_id, specie_id)
VALUES 
((SELECT champion_id FROM champions WHERE name = 'Zoe'), 10),
((SELECT champion_id FROM champions WHERE name = 'Bard'), 7),
((SELECT champion_id FROM champions WHERE name = 'Rengar'), 3),
((SELECT champion_id FROM champions WHERE name = 'Gnar'), 2),
((SELECT champion_id FROM champions WHERE name = 'Gnar'), 3),
((SELECT champion_id FROM champions WHERE name = 'Gnar'), 11),
((SELECT champion_id FROM champions WHERE name = 'Rek''Sai'), 4),
((SELECT champion_id FROM champions WHERE name = 'Senna'), 1),
((SELECT champion_id FROM champions WHERE name = 'Senna'), 5),
((SELECT champion_id FROM champions WHERE name = 'Zac'), 6),
((SELECT champion_id FROM champions WHERE name = 'Kennen'), 2),
((SELECT champion_id FROM champions WHERE name = 'Vladimir'), 1),
((SELECT champion_id FROM champions WHERE name = 'Ornn'), 12),
((SELECT champion_id FROM champions WHERE name = 'Ornn'), 13);
SQL;

        DB::unprepared($sql);
    }

    public function down()
    {
        DB::table('champion_specie')->truncate();
        DB::table('champion_region')->truncate();
        DB::table('champion_range')->truncate();
        DB::table('champion_position')->truncate();
        DB::table('champions')->truncate();
    }
};