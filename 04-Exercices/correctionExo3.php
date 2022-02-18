
<?php

require_once "fonction.inc.php";//inclusion du fichier 'header.inc.php' qui est dans un dossier 'inc'
//echo $_POST['fruit'];

// ici c'est la condition pour le champ de poids saisi. Cette condition est lié au  code php de la ligne 45 
//<input type="text" name="poids" id="poids" value="<?php echo $poids_saisi; 
////l'objective est de afficher le dernier choix saisi pour le dernier utilisateur

if( !empty($_POST['poids']) ) {
    $poids_saisi = $_POST['poids'];
}
else {
    $poids_saisi = '';
}
//ici c'est la condition pour le champs fruit saisi. Cette condition est lié au code php de la ligne 39 au 42
// <?php if($fruit_saisi == 'pommes') echo 'selected';
//l'objective est de afficher le dernier choix saisi pour le dernier utilisateur
if( !empty($_POST['fruit']) ) {
    $fruit_saisi = $_POST['fruit'];
}
else {
    $fruit_saisi = '';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lienPHP</title>
</head>
<body>

<form method="POST" action="formulaire.php">

    <label for="fruit">Choisir un fruit</label>

    <select name="fruit" id="fruit">
        <option value="pommes" <?php if($fruit_saisi == 'pommes') echo 'selected'; ?> >pommes</option>
        <option value="poires" <?php if($fruit_saisi == 'poires') echo 'selected'; ?>>poires</option>
        <option value="bananes" <?php if($fruit_saisi == 'bananes') echo 'selected'; ?>>bananes</option>
        <option value="cerises" <?php if($fruit_saisi == 'cerises') echo 'selected'; ?>>cerises</option>
    </select>
    <br>

    <label for="poids">poids</label>
    <input type="text" name="poids" id="poids" value="<?php echo $poids_saisi; ?>">

    <input type="submit" value="OK">

</form>


<?php

// ici c pour afficher la phrase et le calcule et on lance le calcule que si les champs fruit et poids sont remplis.
if( !empty($_POST['fruit']) && !empty($_POST['poids']) ) {
    echo '<br>' . calcul($_POST['fruit'], $_POST['poids']) ;
}
else {
    echo "je n'ai pas encore rempli le formulaire";
}

?>


</body>
</html>

