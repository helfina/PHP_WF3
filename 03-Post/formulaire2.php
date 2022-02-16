<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire2</title>
</head>
<body>

<h1>Formulaire 2</h1>

<a href="formulaire3.php"> Aller sur le formulaire 3 </a><hr>

<form method="post" action="formulaire3.php">
    <!-- Les traitements php de ce formulaire se feront sur le fichier formulaire3.php car nous l'avons precise dan l'attribut action='' de la balise <form> -->

    <label for="pseudo">Pseudo *</label><br>
    <input type="text" name="pseudo" id="pseudo"><br><br>

    <label for="email">Email *</label><br>
    <input type="text" name="email" id="email"><br><br>

    <input type="submit" value="Envoyer">
</form>

</body>
</html>