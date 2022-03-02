<?php require_once "inc/init.inc.php"; ?>
<?php require_once "inc/header.inc.php"; ?>
<?php

print '<pre>';
    print_r( $_POST );
print '</pre>';

//Validation du formulaire :
if( !empty( $_POST['message'] ) ){ //SI le message N'EST PAS VIDE, c'est que l'on a renseigné un message 

    $pdo->exec("UPDATE player SET message = '$_POST[message]' WHERE id_player = $_GET[id] ");
    //Ici, on modifie la table 'player' et on modifie la colonne message avec la valeur postée par l'utilisateur A CONDITION que dans la colonne id_player, ce soit égale à l'id que l'on récupère dans l'URL (c'est à dire du joueur de courant)
}

//-----------------------------------------------
if(  isset( $_GET['id'] ) ){ //Si il existe une id passée dans l'URL

    $pdostatement = $pdo->query(" SELECT * FROM player WHERE id_player = $_GET[id] ");

    $joueur = $pdostatement->fetch(PDO::FETCH_ASSOC);

    // print '<pre>';
    //     print_r( $joueur );
    // print '</pre>';

    foreach( $joueur as $index => $value  ){

        if( $index == 'message' ){ //Si l'indice est égal à 'message'

            if( !empty( $value ) ){ //SI la valeur correspondante à l'indice message N'est pas vide
                
                $content .= "<p> $index : $value </p>";
            }
        }
        else{ //SINON, on affiche les indice et les valeurs pour les autres champs

            $content .= "<p> $index : $value </p>";
        }
    }
}
else{

    header('location:tous_les_joueurs.php');
    exit;
}

?>
<h1>FICHE JOUEUR</h1>

<?php echo $content; ?>

<hr>

<?php if( empty( $joueur['message']) ) { //SI le message est vide, on affiche le formulaire ?>

    <form method="post" action="tous_les_joueurs.php">
        <label>Message</label><br>
        <textarea name="message" ></textarea><br><br>

        <input type="submit" value="Réservé">
    </form>

<?php }else { //SINON
    
        echo "<span style='color: tomato;' >DEJA RESERVE !! </span>";  

    }
?>

<?php require_once "inc/footer.inc.php"; ?>