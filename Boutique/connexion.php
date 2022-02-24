<?php require_once "inc/header.inc.php"; ?>
<?php

//debug( $_GET );
//DECONNEXION : le script de la deconnexion se positionne AVANT la redirection de la restriction sinon, ELLE NE SERAIT PAS INTERPRETEE par l'interpréteur php à cause du "exit" présent lors de la redirection donc nous aurions déjà quitté le fichier

if( isset($_GET['action']) && $_GET['action'] =="deconnexion" ){ //SI il EXISTE une 'action' dans l'URL ET QUE cette 'action' est égale à 'deconnexion', alors on détruit le fichier de session

    session_destroy(); //détruit le fichier de session

    //unset( $_SESSION['membre'] ); //supprimera la session/membre (et donc entrainera la deco)
}

//--------------------------------------------------------
//restriction d'accès à la page connexion SI on est connecté :
if( userConnect() ){

    //redirection vers la page profil.php
    header('location:profil.php');
    exit;
}

//------------------------------------------------
if( $_POST ){ //SI on a validé le formulaire

    //debug( $_POST );

    //Comparaison du pseudo posté et celui en BDD :
    $r = execute_requete(" SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' ");
        //Ici, on récupère TOUTES les infos provenant de la table 'membre' A CONDITION que dans la colonne pseudo, ce soit égale à la saisie de l'internaute 

    if( $r->rowCount() >= 1 ){ //SI il y a une correspondance dans la table 'membre', c'est que le jeu de résultat retourné par la requête ($r) a renvoyé 1 ligne de résultat et donc, c'est que le pseudo existe dans la BDD

        //Récupération du mdp de la BDD :
        $membre = $r->fetch( PDO::FETCH_ASSOC );
            //debug( $membre ); 

        if( password_verify( $_POST['mdp'], $membre['mdp'] ) ){
            //password_verify( arg1, arg2 ); retourne true ou false et permet de comparer une chaine à une chaine cryptée
                //arg1 : le mot de passe saisie par l'utilisateur
                //arg2 : chaine cryptée par la fonction password_hash(), ici le mdp en BDD

            //Insertion des infos ($membre) de l'utilisateur qui se connecte dans le fichier session
            $_SESSION['membre'] = $membre;
                debug( $_SESSION ); 

            //redirection vers la page profil
            header('location:profil.php');
            exit; //exit; permet de quitter A CET ENDROIT PRECIS le script courant et donc de ne pas interpréter le code qui suit cette instruction.
        }
        else{ //SINON, c'est que le mot de passe est incorrect

            $error .= "<div class='alert alert-danger'>Erreur MDP</div>";
        }
    }
    else{ //SINON, c'est que le pseudo est incorrect

        $error .= "<div class='alert alert-danger'>Erreur Pseudo</div>";
    }
}

//---------------------------------------------------------------------------
?>
<h1>CONNEXION</h1>

<?php echo $error; //affichage des messages d'erreurs ?>

<form method="post">

    <label>Pseudo</label><br>
    <input type="text" name="pseudo" placeholder="Votre pseudo"><br><br>

    <label>Mot de passe</label><br>
    <input type="text" name="mdp" placeholder="Votre mot de passe"><br><br>

    <input type="submit" value="Se connecter" class="btn btn-secondary">

</form>

<?php require_once "inc/footer.inc.php"; ?>