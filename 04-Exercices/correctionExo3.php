<?php
// 3 - Créer un fichier formulaire.php et réaliser un formulaire permettant de selectionner (select) un fruit et saisir un poids.
// -> Affichez via la fonction calcul(), le resultat issue des infos du formulaire
// -> bonus : faites en sorte de garder le dernier fruit sélectionné et le dernier poids saisie dans le formulaire lorsque celui-ci est validé.

print '<pre>';
print_r( $_POST );
print '</pre>';

include "fonction.inc.php"; //Inclusion de la fonction

if( $_POST ){ //Si validation du formulaire

    echo calcul( $_POST['fruit'], $_POST['poids'] );
}

?>
<hr>
<form method="post">

    <label>Fruit</label><br>
    <select name="fruit" >
        <option value="pommes">Pomme</option>
        <option value="cerises">Cerise</option>
        <option value="bananes">Banane</option>
        <option value="poires">Poire</option>
    </select><br><br>

    <label>Poids</label><br>
    <input type="text" name="poids"><br><br>

    <input type="submit" value="Afficher">

</form>