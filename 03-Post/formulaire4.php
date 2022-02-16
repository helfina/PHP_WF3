<?php
/* EXERCICE :
	1 - Faire un formulaire où vous allez renseigner : la ville, le code_postal et l'adresse
	2 - Afficher votre adresse de la façon suivante :
		"J'habite au 15 rue Moussorgski à Paris 75018"
	2.1 - Gérer les erreurs lorsque l'on arrive sur la page
	3 - Afficher toutes les informations du post via une boucle (foreach())
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire4</title>
</head>
<body>
<h1>Formulaire 4</h1>

<a href="formulaire5.php"> Aller sur le formulaire 5 </a><hr>
<hr>

<form method="post" action="formulaire5.php" enctype="multipart/form-data">

    <label for="address">Address</label><br>
    <input type="text" id="address" name="address"><br><br>

    <label for="cp">Code postal</label><br>
    <input type="number" id="cp" name="cp"><br><br>

    <label for="ville">Ville</label><br>
    <input type="text" id="ville" name="ville"><br><br>

    <input type="submit" value="Valider">
</form>

</body>
</html>