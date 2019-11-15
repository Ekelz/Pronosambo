CREATE DATABASE IF NOT EXISTS pronosambo;

USE pronosambo;

CREATE TABLE IF NOT EXISTS utilisateurs
(
	id_utilisateur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    e_mail VARCHAR(100),
    solde FLOAT,
	login VARCHAR(100),
	password VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS combattants
(
	id_combattant INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    age INT,
    date_naissance DATE,
	poids INT,
	taille INT,
    pays VARCHAR(50),
	classement INT,
	image_lien VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS competitions
(
	id_competition INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nom VARCHAR(255),
    description VARCHAR(255),
    pays VARCHAR(50),
    annee INT,
	nombre_participant INT,
	image_lien VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS palmares
(
	id_competition INT NOT NULL,
	id_combattant INT NOT NULL,
    resultat INT,
	FOREIGN KEY (id_combattant) REFERENCES combattants(id_combattant),
	FOREIGN KEY (id_competition) REFERENCES competitions(id_competition)
);

CREATE TABLE IF NOT EXISTS matchs
(
	id_match INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_combattant_1 INT NOT NULL,
	id_combattant_2 INT NOT NULL,
	id_competition INT NOT NULL,
	score_c1 INT,
	score_c2 INT,
	cote_c1 FLOAT,
	cote_c2 FLOAT,
	date_match DATE,
	cote_nulle FLOAT,
	est_termine BOOLEAN,
	FOREIGN KEY (id_combattant_1) REFERENCES combattants(id_combattant),
	FOREIGN KEY (id_combattant_2) REFERENCES combattants(id_combattant),
	FOREIGN KEY (id_competition) REFERENCES competitions(id_competition)
);

CREATE TABLE IF NOT EXISTS pronostiques
(
	id_pronostique INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_utilisateur INT NOT NULL,
	id_match INT NOT NULL,
    vote INT,
	mise INT,
	FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur),
	FOREIGN KEY (id_match) REFERENCES matchs(id_match)
);