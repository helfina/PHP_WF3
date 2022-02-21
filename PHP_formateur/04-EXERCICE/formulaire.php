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

//---------------------------------------------------------------------
// -> bonus : faites en sorte de garder le dernier fruit sélectionné et le dernier poids saisie dans le formulaire lorsque celui-ci est validé.

if( isset( $_POST['poids'] ) ){ //SI l'internaute a renseigne un poids( c'est que $_POST['poids'] EXISTE) alors on récupère le poids saisi et on le stock dans une variable '$poids_choisi'

    $poids_choisi = $_POST['poids'];
}
else{ //SINON, c'est que l'on arrive sur la page la première fois et donc que l'on a pas encore validé le formulaire donc pas de poids renseigne. Je crée une variable nommée de la même manière que dans la condition 'if' avec en valeur 'rien' ..

    $poids_choisi = '';
}

//------------------------------------------------------------
//partie <select>
if( isset( $_POST['fruit'] ) && $_POST['fruit'] == 'bananes' ){ //SI $_POST['fruit'] EXISTE (c'est que l'on a validé le formulaire) ET QUE la valeur sélectionnée soit égale à 'banane', alors je crée une variable avec en valeur 'selected'

    $banane_choisie = "selected";
}
else{ //SINON, on crée cette même variable avec du 'vide'

    $banane_choisie = '';
}

//Meme chose que la condition ci-dessus en version ternaire pour les autres fruits :
$pomme_choisie = ( isset( $_POST['fruit'] ) && $_POST['fruit'] == 'pommes' ) ? 'selected' : '';
$cerise_choisie = ( isset( $_POST['fruit'] ) && $_POST['fruit'] == 'cerises' ) ? 'selected' : '';
$poire_choisie = ( isset( $_POST['fruit'] ) && $_POST['fruit'] == 'poires' ) ? 'selected' : '';

?>
<hr>
<form method="post">

    <label>Fruit</label><br>
    <select name="fruit">
        <option value="pommes" <?= $pomme_choisie ?> >Pomme</option>    
        <option value="cerises" <?= $cerise_choisie ?> >Cerise</option>    
        <option value="bananes" <?= $banane_choisie ?>  >Banane</option>    
        <option value="poires" <?= $poire_choisie ?> >Poire</option>    
    </select><br><br>

    <label>Poids</label><br>
    <input type="text" name="poids" value="<?php echo $poids_choisi ?>"><br><br>

    <input type="submit" value="Afficher">

</form>



