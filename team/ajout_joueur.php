<?php
require_once "inc/header.inc.php";
if (!empty($_POST)){
    debug( $_POST );
    $r = execute_requete("SELECT nom,prenom FROM player WHERE nom = '$_POST[nom]' and prenom = '$_POST[prenom]'");
    if( $r->rowCount() >= 1 ){ //SI le jeu de résultat (ici, $r) retourné par la requête est supérieur ou égal à 1, c'est que la référence a été trouvé en BDD et donc on aura une ligne de résultat que me retourne la methode rowCount()

        $error .= "<div class='alert alert-danger'>nom et prenom indisponible </div>";
    }
    //-----------------------------------------------------
    //On passe toutes les infos postées par l'admin dans les fontions addslashes() et htmlentities()
    foreach( $_POST as $index => $value ){
        $_POST[ $index ] = htmlentities( addslashes( $value ) );

        // TODO  revoir la condition
        if ($_POST[ $index ] == $_POST[ 'age' ] && is_numeric($value) && $length >=2 ){
            $length = strlen($value);
            debug($value);

        }else{
            $error .= "<div class='alert alert-danger'>l age doit contenir 2 chiffre</div>";
        }


    }
    if( empty( $error ) ){ //SI la variable $error est vide, on fait une insertion

//        execute_requete("
//
//        INSERT INTO player( nom, prenom, age, post, presentation, message)
//                    VALUES(
//                            '$_POST[nom]',
//                            '$_POST[prenom]',
//                            '$_POST[age]',
//                            '$_POST[post]',
//                            '$_POST[presentation]',
//                            '$_POST[message]'
//                    )
//        ");
    }
}
?>
<h1>Ajouter un joueur</h1>
<section class="container">
    <?= $error;?>
<form action="" method="post" class="row">
    <label for="nom">nom</label>
    <input type="text" name="nom" id="nom" class="form-control">

    <label for="prenom">prenom</label>
    <input type="text" name="prenom" id="prenom" class="form-control">

    <label for="age">age</label>
    <input type="number" name="age" id="age" class="form-control">

    <label for="post">post</label>
    <input type="text" name="post" id="post" class="form-control">

    <label for="presentation">presentation</label>
    <input type="text" name="presentation" id="presentation" class="form-control">

    <label for="message">message</label>
    <input type="text" name="message" id="message" class="form-control">

    <input type="submit" value="<?= ucfirst( $_GET['action'] ); ?>" class="btn btn-primary">
</form>
</section>