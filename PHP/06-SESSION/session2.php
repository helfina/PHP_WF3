<?php
session_start();
//lorsque j'effectue un session_start(), la session n'est pas recréer car elle existe déjà grâce au session_start() déclenché dans le fichier session1.php

print '<pre>';
	print_r( $_SESSION );
print '</pre>';

//Affichage du prenom enregistre en session:
echo $_SESSION['prenom'];

//Ce fichier n'a rien a voir avec le fichier session1.php, nous n'avons pas fait d'inclusion, il pourrait se nommer n'importe comment, se trouver dans un autre dossiesr, les informations seraient TOUJOURS accessible via la superglobale $_SESSION !!!
//C'est tout l'interet et la pusisance des sessions !