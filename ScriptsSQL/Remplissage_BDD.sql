USE pronosambo;

-- Nettoyage de la base
DELETE FROM palmares;
DELETE FROM combattants;
DELETE FROM matchs;
DELETE FROM competitions;
DELETE FROM utilisateurs;
DELETE FROM pronostiques;
ALTER TABLE pronostiques AUTO_INCREMENT=1;
ALTER TABLE combattants AUTO_INCREMENT=1;
ALTER TABLE matchs AUTO_INCREMENT=1;
ALTER TABLE competitions AUTO_INCREMENT=1;
ALTER TABLE utilisateurs AUTO_INCREMENT=1;

-- Insertion des données
INSERT INTO combattants (nom, prenom, age, date_naissance, poids, taille, pays,	classement,	image_lien)
VALUES ('Emelianenko', 'Fedor', 43, '1976-09-28', 110, 182, 'Russie', 1, 'fedor.jpg'),
	('Emelianenko','Aleksander', 38, '1981-08-02', 115, 193, 'Russie', 4, 'aleksander.jpg'),
	('Poutine', 'Vladimir', 67, '1952-10-07', 100, 170, 'Russie', 2, 'vladimir.jpg'),
	('Nurmagomedov', 'Khabib', 31, '1988-09-20', 70, 177, 'Russie', 3, 'khabib.jpg'),
	('Kharitonov', 'Serguei', 39, '1980-08-18', 112, 194, 'Russie', 6, 'serguei.jpg'),
    ('Fournier', 'Laure', 29, '1990-04-29', 55, 162, 'France', 1, 'laure.jpg'),
    ('Laurent', 'Louis', 32, '1987-03-15', 87, 187, 'France', 9, 'louis.jpg'),
    ('Schmitt', 'Charly', 33, '1985-12-13', 78, 178, 'France', 7, 'charly.jpg'),
    ('Herbreteau', 'Gabriel', 30, '1989-12-04', 105, 193, 'France', 10, 'gabriel.jpg');
	
	
INSERT INTO competitions (nom, description, pays, annee, nombre_participant, image_lien)
VALUES ('Championnat de Russie', 'Championnat de Russie a Saint-Petersburg', 'Russie', 2013, 87, 'compet5.png'),
	('Championnat du monde', 'Championnat du monde de sambo a Sochi', 'Russie', 2017, 115, 'compet3.png'),
	('Championnat de France', 'Championnat de France de Sambo a Annecy', 'France', 2018, 75, 'compet4.png'),
	('Championnat du monde', 'Championnat du monde de sambo a Seoul', 'Coree du Sud', 2019, 110, 'compet2.png'),
	('Coupe Europe', 'Coupe Europe de Sambo a Bratislava', 'Slovaquie', 2020, 95, 'compet1.png');
	
INSERT INTO palmares (id_combattant, id_competition, resultat)
VALUES (1, 1, 1),
	(1, 2, 3),
	(1, 4, 1),
	(2, 1, 5),
    (2, 4, 10),
	(3, 1, 2),
    (3, 4, 28),
    (4, 1, 7),
    (5, 4, 17),
    (6, 3, 1),
    (7, 3, 3),
    (8, 3, 1),
    (9, 3, 2);

INSERT INTO matchs (cote_c1, cote_nulle, cote_c2, est_termine, id_combattant_1, id_combattant_2, id_competition, score_c1, score_c2, date_match)
VALUES (1.01, 15, 17.13, TRUE, 1, 2, 5, -1, 0, '2019-11-11'),
    (1.42, 8, 3.3, FALSE, 3, 7, 5, null, null, '2019-11-15'),
    (2.15, 5, 1.97, FALSE, 4, 3, 5, null, null, '2019-12-21'),
    (3.34, 6, 1.65, FALSE, 9, 1, 5, null, null, '2020-01-14'),
    (null, null, null, TRUE, 3, 5, 2, 33, 5, '2019-11-05'),
    (null, null, null, TRUE, 3, 1, 1, 0, -1, '2019-10-30'),
    (null, null, null, TRUE, 6, 7, 3, 4, 11, '2019-10-25');

INSERT INTO utilisateurs (e_mail, nom, prenom, solde, login, password)
VALUES ('admin@admin.com', 'Admin', 'Admin', 40, 'Admin', 'Admin');

INSERT INTO pronostiques (id_match, id_utilisateur, mise, vote)
VALUES (1, 1, 10, 1);