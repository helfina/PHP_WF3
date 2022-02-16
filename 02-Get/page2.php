<h1>Page 2</h1>

<a href="page1.php">Retour page 1</a>

<?php
//$_GET represente URL, il s'agit d'une superglobale de php et il faut absolument l'ecrire en MAJUSCULE sinon ca retournera une erreur

print '<pre>';
print_r( $_GET );
print '</pre>';

if( !empty( $_GET ) ){ //SI $_GET N'EST PAS VIDE, c'est qu'il y a sdes infos passees dans l'URL et donc on affiche les valeurs passees.

    echo "Parametre 1 : " . $_GET['article'] . '<br>';
    echo "Parametre 2 : " . $_GET['couleur'] . '<br>';

    echo "Parametre 3 : $_GET[prix] <br>";
}

/*
Pour faire passer des informations dans l'URL, il faut commencer par un "?" et ensuite une 'clé' suivi du symbole '=' et de la valeur correspondante. SI l'on souhaite passer plusieurs infos dans l'URL, il suffit de les séparer par un "&"

    page2.php?article=jean&couleur=rouge&prix=123
<=>
    fichier.php?cle=valeur&cle1=valeur1&cle2=valeur2

Pour récupérer les valeurs passées dans l'URL, il faut préciser la clé entre crochets avec la superglobale $_GET, car toutes les superglobales de PHP renvoient des arrays !!
*/



