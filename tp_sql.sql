/* 1. Création d'une table */
CREATE TABLE champions (
    champion_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR NOT NULL,
    title VARCHAR,
    lore TEXT,
    resource_id INT,
    year_id INT,
    gender_id INT,
    popularity INT,
    FOREIGN KEY (region_id) REFERENCES genders(gender_id)
    FOREIGN KEY (range_id) REFERENCES resources(resource_id)
    FOREIGN KEY (specie_id) REFERENCES genders(gender_id)
);

/* 2. Modification d'une table */
ALTER TABLE champions
ADD COLUMN popularity INT;

/* 3. Insertion de données */
INSERT INTO champions (name, title, lore, gender_id, resource_id, year_id) VALUES ('Fiddlesticks', 'The Ancient Fear', 'Something has awoken in Runeterra. Something ancient. Something terrible. The ageless horror known as Fiddlesticks stalks the edges of mortal society, drawn to areas thick with paranoia where it feeds upon terrorized victims. Wielding a jagged scythe, the haggard, makeshift creature reaps fear itself, shattering the minds of those unlucky enough to survive in its wake. Beware the sounding of the crow, or the whispering of the shape that appears almost human... Fiddlesticks has returned.', 1, 1, 1);
INSERT INTO champion_range (range_id) VALUES (2);
INSERT INTO regions (region_id,name) VALUES (14,'Runeterra');
INSERT INTO champion_specie (specie_id) VALUES (9);

/* 4. Récupération de tous les champions */
SELECT *
FROM champions
ORDER BY name ASC;

/* 5. Recherche de champions par nom */
SELECT *
FROM champions
WHERE name LIKE '%ar%';

/* 6. Modification d'un enregistrement */
UPDATE champions
SET popularity = CAST(1 + (RANDOM() % 10) AS INT;

/* 7. Suppression d'un enregistrement */
DELETE FROM champions
WHERE nom = 'Fiddlesticks';

/* 8. Jointure avec les positions */

/* 9. Groupement par ressource */
SELECT ressource, COUNT(*) AS nombre_champions
FROM champions
GROUP BY ressource;

/* 10. Champions par région */
SELECT *
FROM champions
WHERE region = 'Runeterra';

/* 11. Champions multi-régions */

/* 12. Requête complexe : Champions polyvalents */

/* BONUS? */
