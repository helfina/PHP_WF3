<?php require_once "inc/init.inc.php"; ?>
<?php require_once "inc/header.inc.php"; ?>
<?php

$pdostatement = $pdo->query(" SELECT * FROM player ORDER BY nom ASC ");

$content .='<table border="2">';

    while( $joueur = $pdostatement->fetch(PDO::FETCH_ASSOC) ){

        // print '<pre>';
        //     print_r( $joueur );
        // print '</pre>';

        $content .='<tr>';

            foreach( $joueur as $index => $value ){

                if( $index != 'message' && $index != "id_player"  ){ //Si l'indice est différent de 'message' et de 'id_player' on affiche les valeurs dans des cellules

                    $content .= "<td> $value </td>";

                }
                elseif( $index == 'message'){ //SINON SI l'indice est égale à message

                    if( !empty( $value ) ) { //Si le message N'EST PAS VIDE, on affiche une cellule avec 'reservation'

                        $content .= "<td> <span style='color: green;'>DEJA RESERVE</span> </td>";    
                    }
                    else{ //SINON, on affiche une cellule 'disponible'

                        $content .= "<td> <span style='color: grey;'>Disponible</span> </td>";    
                    }
                }
            }
            $content .= "<td> <a href='fiche_joueur.php?id=$joueur[id_player]'> Voir la fiche </a> </td>";

        $content .='</tr>';
    }

$content .='</table>';

//------------------------------------------------------------------------
?>
<h1>TOUS LES JOUEURS</h1>

<?= $content ?>

<?php require_once "inc/footer.inc.php"; ?>