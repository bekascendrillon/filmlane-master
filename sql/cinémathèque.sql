-- Créer la base de données
drop database if exists cinematheque;

CREATE DATABASE cinematheque;

-- Sélectionner la base de données
USE cinematheque;

-- Créer une table
CREATE TABLE Realisateur (
    Id_rea INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom_rea VARCHAR(50) NOT NULL,
    prenom_rea VARCHAR (50) NOT NULL,
    date_naiss_rea date NOT NULL,
    nationalite_rea varchar(50) NOT NULL,
    biographie_rea text
);


CREATE TABLE Film (
    Id_film int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    titre varchar(100) NOT NULL,
    duree varchar(5) NOT NULL,
    date_sortie date NOT NULL,
    version varchar(50) NOT NULL,
    genre varchar (50) NOT NULL,
    critique text NOT NULL,
    Id_rea INT NOT NULL,
    foreign key (Id_rea) references Realisateur (Id_rea) 
);


CREATE TABLE Acteur (
    Id_acteur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom_acteur varchar (50) NOT NULL,
    prenom_acteur varchar (50) NOT NULL,
    date_naiss_acteur date NOT NULL,
    nationalite_acteur varchar(50) NOT NULL,
    biographie_acteur text NOT NULL
);


CREATE TABLE Evenement (
    ID_even int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom_even varchar(100) NOT NULL ,
    type_even varchar(50) NOT NULL,
    date_even date NOT NULL,
    lieu varchar(100) NOT NULL,
    description_even longtext NOT NULL
);


CREATE TABLE Utilisateur (
  Id_user INT PRIMARY KEY NOT NULL,
  nom_user VARCHAR(50) NOT NULL AUTO_INCREMENT,
  mot_de_passe VARCHAR (255) NOT NULL,
  email varchar(100) NOT NULL
); 


CREATE TABLE Debat (
    Id_debat INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    sujet varchar(100) NOT NULL,
    description_debat text NOT NULL,
    date_debut date NOT NULL,
    date_fin date NOT NULL
);


CREATE TABLE Avis(
    Id_avis INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    contenu text NOT NULL,
    Id_film int NOT NULL,
    Id_user int NOT NULL,
    foreign key (Id_film) references Film (Id_film),
    foreign key (Id_user) references Utilisateur (Id_user)
);


CREATE TABLE Role ( 
    Id_film INT NOT NULL,
    Id_acteur INT NOT NULL,
    nom_role varchar(50)NOT NULL,
    prix_obtenu varchar(100) NOT NULL,
    foreign key (Id_film) references Film (Id_film),
    foreign key (Id_acteur) references Acteur (Id_acteur)
);

CREATE TABLE ParticipationDebat (
    Id_user INT NOT NULL,
    Id_debat INT NOT NULL,
    point_de_vue longtext NOT NULL,
    foreign key(Id_user) references Utilisateur(Id_user),
    foreign key(Id_debat) references Debat(Id_debat)
);


CREATE TABLE ParticipationEven (
    Id_even INT NOT NULL,
    Id_user INT NOT NULL,
    foreign key(Id_even) references Evenement(Id_even),
    foreign key (Id_user) references Utilisateur(Id_user)
);

