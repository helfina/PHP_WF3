<?php
require_once "inc/header.inc.php";
//SI il y a une 'action' dans l'URL ET QUE cette 'action' est égale à 'affichage', alors on affiche la liste des produits !

//EXERCICE : Affichez le nombre de produits et la liste des produits sous forme de tableau et faites en sorte d'affichez l'image :
$r = execute_requete(" SELECT * FROM player ");

$content .= "<h2>Liste des produits</h2>";
$content .= "<p>Nombre de produits dans la boutique : ". $r->rowCount() ."</p>";

$content .= "<table class='table table-bordered table-info'>";
$content .= "<tr>";
$nombre_colonne = $r->columnCount();
//columnCount() : retourne le nombre de colonnes issues du jeu de résultat retourné par la requête ($r)

for( $i = 0; $i < $nombre_colonne; $i++ ){

    $titre = $r->getColumnMeta( $i );
    //getColumnMeta( $int ) : retourne des informations sur les colonnes (de la table) du jeu de résultat retourné par la requête
    //debug( $titre );

    $content .= "<th> $titre[name] </th>";
}
$content .= "<th>Suppression</th>"; //Ici, je rajoute manuellement une colonne supression
$content .= "<th>Modification</th>"; //Ici, je rajoute manuellement une colonne modification
$content .= "</tr>";

while( $ligne = $r->fetch( PDO::FETCH_ASSOC ) ){

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
    //Ici on créer pour chaque ligne une cellule avec un lien cliqable pour déclencher la suppression d'un produit. Pour cela nous faisons passer dans l'URL une action de suppression ET l'id du produit de la ligne
    $content .= "<td>
                                <a href='?action=suppression&id_player=$ligne[id_player]' onclick='return( confirm(\"Voulez-vous supprimer le produit $ligne[nom]\") )' >supp</a>
                            </td>";
    $content .= "<td>
                                <a href='?action=modification&id_player=$ligne[id_player]'>
                                    modif
                                </a>
                            </td>";
    $content .= "</tr>";
}
$content .= "</table>";

?>

<h1>Tous les Joueur</h1>
<section class="container">
    <?= $content; ?>

</section>