<?php
/* EXERCICE : 
	1 - Faire un formulaire où vous allez renseigner : la ville, le code_postal et l'adresse
	2 - Afficher votre adresse de la façon suivante : 
		"J'habite au 15 rue Moussorgski à Paris 75018"
	2.1 - Gérer les erreurs lorsque l'on arrive sur la page
	3 - Afficher toutes les informations du post via une boucle (foreach())
*/
print '<pre>';
	print_r( $_POST );
print '</pre>';

if( $_POST ){ //Si on valide le formulaire

	echo "J'habite au $_POST[adresse] a $_POST[ville] dans le $_POST[cp] <br>";

	echo 'J\'habite au '. $_POST['adresse'] . ' a '. $_POST['ville'] . ' dans le '. $_POST['cp'] . '<br>';

	foreach( $_POST as $index => $value ){

		echo "$index : $value <br>";
	}
}

?>
<hr>
<form method="post">

	<label for="ville">Ville</label><br>
	<input type="text" name="ville" id="ville" ><br><br>

	<label for="adresse">Adresse</label><br>
	<input type="text" name="adresse" id="adresse" ><br><br>

	<label for="cp">Code postal</label><br>
	<input type="text" name="cp" id="cp" ><br><br>

	<input type="submit" value="Afficher">
</form>



