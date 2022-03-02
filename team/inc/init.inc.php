<?php
session_start(); //Création/ouverture fichier de session
//PREMIERE LIGNE DE CODE, se positionne toujours en premier avant tout traitements php

//----------------------------------------------------
//Connexion à la BDD 'boutique' :
$pdo = new PDO('mysql:host=localhost;dbname=team', 'root', 'root', array(PDO:: ATTR_ERRMODE=>PDO::ERRMODE_WARNING ) );

//----------------------------------------------------
//definition d'une constante :
define( 'URL', "http://php_wf3.test/team/");
//Correspond à l'URL de notre site

//----------------------------------------------------
//Definition des variables :
$content = ''; // variable prévue pour recevoir du contenu
$error = ''; // variable prévue pour recevoir les messages d'erreurs

//----------------------------------------------------
//Inclusion des fonctions :
require_once "function.inc.php";
