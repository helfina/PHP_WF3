<?php
/*
1 - Création base de données : "team"

CREATE DATABASE team;

USE team;

2 - Création d'une table : "player" (id_player, nom, prenom, age, poste (ENUM : attaquant /defenseur ), presentation, message (DEFAULT NULL) )

CREATE TABLE player(

    id_player INT(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(25) NOT NULL,
    prenom VARCHAR(25) NOT NULL,
    age INT(3) NOT NULL,
    poste ENUM('defenseur', 'attaquant') NOT NULL,
    presentation TEXT NOT NULL,
    message TEXT DEFAULT NULL

)ENGINE=InnoDB charset=UTF8;

----------------------------------------------------

3 - création d'une page : "accueil.php" 
	-> menu avec 2 liens :	
		- Un pour aller sur la page "ajout"
		- L'autre pour aller sur la page 'voir tous les joueurs'

	-> affichez les infos de 5 joueurs sur la page d'accueil

4 - création d'une page : "ajout_joueur.php"

	-> création formulaire pour insertion
	Enregistrement des données (formulaire)
		=> pensez aux controles des saisies :
			-> nom, prenom OBLIGATOIRE  (2 conditions)
			-> l'age doit etre un ENTIER et avoir 2 chiffres

5 - création d'une page : "tous_les_joueurs.php"

	-> affichage des joueurs dans 'l'ordre croissant'
	-> CHAQUE annonce doit pouvoir etre cliqué pour aller voir la "fiche du joueur"

	6 - création d'une page : "fiche_joueur.php"

		-> affichez les details du joueurs

	=> Sur "fiche_joueur.php" faites en sorte d'ajouter un formulaire avec un input permettant de laisser un message pour acheter/réservé le joueur

	-> insertion du message => donc modification (update) de la table

	-> SI il y a un message pour un joueur, il faut l'indiquer :

		Sur la page "tous_les_joueurs.php" indiqué que le joueur n'est pas libre

		Sur la page "fiche_joueur.php" : affichez un message "déjà acheté" et NE PLUS afficher le formulaire
*/