<?php
session_start(); //permet de creer un fichier de session OU de l'ouvrir s'il existe déjà !

//CE FICHIER SERA ENREGISTRE COTE SERVEUR !!

//session_start() : se positionnera TOUJOURS EN HAUT ET EN PREMIER AVANT TOUT TRAITEMENT PHP et ou HTML

print '<pre>';
print_r( $_SESSION );
print '</pre>';

//Ici, j'alimente le fichier de session (qui est un Array)
$_SESSION['prenom'] = 'marco';
$_SESSION['nom'] = 'polo';

//Affichage des infos de la session :
echo $_SESSION['prenom'] . '<br>';
echo $_SESSION['nom'] . '<br>';

//Suppression d'une informations de la session: (ici, le nom)
unset( $_SESSION['nom'] );
//unset( $arg ) : permet de supprimer une variable ($arg) donc de vider une partie de la session

// session_destroy();
//session_destroy() : permet de détruire (supprimer) le fichier de session

//A SAVOIR : cette fonction est lu par l'interpréteur PHP, gardé en mémoire PUIS exécutée A LA FIN du script (c'est pourquoi, on peu afficher quand meme des infos de la session comme ci-dessous)

echo "J'affiche une info de la session, le prénom : $_SESSION[prenom] <br>";