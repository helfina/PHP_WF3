<?php
//Création/ouverture du fichier de session
session_start();
//PREMIRE LIGNE DE CODE, se positionne en haut et en premier avant tout traitements php
//------------------------------------------------------------
//Connexion à la BDD : 'boutique'
$pdo  = new PDO('mysql:host=localhost;dbname=wf3_php_intermediaire_gaelle', 'root', 'root' , array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING ) );

//------------------------------------------------------------
//definition d'une constante :
define( 'URL', "http://php_wf3.test/EvalPHP/");
//correspond à l'URL de la racine de notre site

//------------------------------------------------------------
//definition des variables :
$content = ''; //variable prévue pour recevoir du contenu
$error = ''; //variable prévue pour recevoir les messages d'erreurs

//------------------------------------------------------------
//Inclusion des fonctions :
require_once "functions.inc.php";

