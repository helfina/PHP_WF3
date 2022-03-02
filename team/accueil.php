<?php
require_once "inc/header.inc.php";
$requeteJoueur = execute_requete("SELECT * FROM player LIMIT 5");
$content .= "<h2>Liste des produits</h2>";
$content .= "<p>Nombre de produits dans la boutique : ". $requeteJoueur->rowCount() ."</p>";

$content .= "<table class='table table-bordered table-info'>";
$content .= "<tr>";
$nombre_colonne = $requeteJoueur->columnCount();
//columnCount() : retourne le nombre de colonnes issues du jeu de résultat retourné par la requête ($r)

for( $i = 0; $i < $nombre_colonne; $i++ ){

    $titre = $requeteJoueur->getColumnMeta( $i );
    //getColumnMeta( $int ) : retourne des informations sur les colonnes (de la table) du jeu de résultat retourné par la requête
    //debug( $titre );

    $content .= "<th> $titre[name] </th>";
}
$content .= "</tr>";

while( $ligne = $requeteJoueur->fetch( PDO::FETCH_ASSOC ) ){

    $content .= "<tr>";
    // debug( $ligne );

    foreach( $ligne as $indice => $valeur ){

        if( $indice == 'photo' ){ //SI l'indice '$indice' (du tableau '$ligne' retourné par le fetch()) est égal à 'photo' ALORS, on affiche une cellule avec une balise <img> et dans l'attribut 'src', on y met la valeur correspondante '$valeur' qui représente l'adresse pour accéder à l'image en BDD

            $content .= "<td> <img src='$valeur' width='80'> </td>";
        }
        else{ //SINON, c'est que les indices sont différents de 'photo' et donc on affiche les valeurs dans des cellules simples

            $content .= "<td> $valeur </td>";
        }
    }

}
$content .= "</table>";
?>

<h1>Accueil</h1>

<nav class="navbar navbar-dark bg-dark ">
    <a href="<?= URL ?>joueurs.php" class="navbar-brand">Voir tous les joueurs</a>
    <a href="<?= URL ?>ajout_joueur.php?action=ajouter" class="navbar-brand">Ajoutez un Joueur</a>
</nav>

<section class="container">
    <div class="row">
        <?= $content;?>
    </div>
</section>