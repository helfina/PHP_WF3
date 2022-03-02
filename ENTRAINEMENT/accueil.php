<?php require_once "inc/init.inc.php" ?> 
<?php require_once "inc/header.inc.php" ?> 
<?php

$pdostatement = $pdo->query(" SELECT * FROM player ORDER BY id_player DESC LIMIT 5 ");

$content .= "<table border='1'>";
    while( $joueur = $pdostatement->fetch( PDO::FETCH_ASSOC) ){ //Parcours la ligne SUIVANTE (fech() )du jeu de résultat retournée par la requête

        // print '<pre>';
        //     print_r( $joueur );
        // print '</pre>';
        $content.= "<tr>";

            foreach( $joueur as $indice => $value ){

                if( $indice != 'id_player' && $indice !='message'){ //SI l'indice est différent de 'id_player' ou de 'message', alors on affiche la valeur

                    $content .= "<td> $value </td>";
                }
            }
        $content.= "</tr>";
    }
$content .= "</table>";

?>
<h1>ACCUEIL</h1>

<?php echo $content; //affichage du contenu ?>

<?php require_once "inc/footer.inc.php" ?>   
