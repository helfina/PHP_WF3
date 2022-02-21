<?php
print '<pre>';
	print_r( $_GET );
	print '<hr>';
	print_r( $_COOKIE );
print '</pre>';

//-----------------------------
if( isset( $_GET['pays'] ) ){ //SI il existe la clé 'pays' dans l'URL, c'est que l'on a forcément cliqué sur un lien
	
	$pays = $_GET['pays']; //Ici, on récupère  la valeur passée dans l'URL (fr, it , es , en) et on l'a stocke dans la variable $pays
		//echo $pays;
}
elseif( isset( $_COOKIE['langue_choisie']) ){ //SI il existe un cookie nommé 'langue_choisie'

	$pays = $_COOKIE['langue_choisie']; //Ici, on récupère la valeur du cookie et on la transmet à la variable '$pays'
}
else{ //SINON, c'est que c'est la premières fois que l'on arrive sur la page et donc que l'on a pas encore cliqué sur un lien. Par défaut, on donne la valeur 'fr' à la variable '$pays'

	$pays = 'fr';
}

//------------------------------
//var_dump( time() ); //retourne le timestamp (= nombre de secondes depuis le 1er janvier 1970)

$un_an_en_seconde = 365*24*60*60; //duree ens econde pour 1 année
//365jrs * 24h * 60min * 60sec
	//echo $un_an_en_seconde;

$un_an_plus_tard = time() + $un_an_en_seconde; //Représente la date 1an plus tard par rapport à l'instant T
	//echo $un_an_plus_tard;

setcookie( 'langue_choisie', $pays, $un_an_plus_tard ); //Ici, je crée dans tous les cas puisqu'ici, nous ne sommes pas dans une condition

	//UN COOKIE SERA ENREGISTRE COTE CLIENT !!! (sur votre pc)

//setcookie( arg1, arg2, arg3 );
	//arg1 : nom du cookie
	//arg2 : valeur du cookie
	//arg3 : date d'expiration du cookie

//------------------------------
switch( $pays ){ //Ici, on compare a valeur de '$pays' et en fonction de sa valeur, on crée une variable '$titre' avec le texte correpondant à la langue cliquée et on l'affiche dans la balise <h1>

	case 'fr':  $titre = "Bonjour la France";  break;
	case 'it':  $titre = "Buongiorno Italia";  break;
	case 'es':  $titre = "Hola Espana";  break;
	case 'en':  $titre = "Hello England";  break;
}
//-------------------------------------------------------------------------
?>

<h1> <?php echo $titre; //affichage de la variable $'titre' ?> </h1>

<ul>
	<li><a href="?pays=fr">France</a></li>
	<li><a href="?pays=it">Italie</a></li>
	<li><a href="?pays=es">Espagne</a></li>
	<li><a href="?pays=en">Angleterre</a></li>
</ul>