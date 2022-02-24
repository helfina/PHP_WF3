<?php require_once 'inc/header.inc.php'; ?>
<?php

//Restriction d'accès à la page SI on est connecté :
if( userConnect() ){

    //redirection vers la page profil.php
    header('location:profil.php');
    exit;
}

//-----------------------------------------------------
if( $_POST ){ //SI on valide le formulaire
    
    //debug( $_POST );

    //Controles des saisies de l'internaute (il faudrait faire des controles pour TOUS les champs du formulaire )

    //Controle la taille du pseudo ( 3 et 15 caractères ):
    if( strlen( $_POST['pseudo'] ) < 3 || strlen( $_POST['pseudo'] ) > 15 ){
        //SI la taille du speudo est inférieur à 3 -OU QUE- la taille du pseudo est supérieur à 15, alors on affiche un msg d'erreur
            //strlen( $arg ) : fonction php qui retourne la taille d'une chaine (ici, $arg)

        $error .= "<div class='alert alert-danger'>Erreur taille pseudo (doit etre compris entre 3 et 15 caractères)</div>";
    }

    //Teste SI le pseudo est disponible : (on ne peut pas avoir 2 fois le meme pseudo car nous avons indiqué lors de la création de la BDD une clé UNIQUE pour le champ 'pseudo')
    $r = execute_requete(" SELECT pseudo FROM membre WHERE pseudo = '$_POST[pseudo]' ");
        //Sélectionne moi le pseudo dans la table membre A CONDITION que dans la colonne pseudo ce soit égal à la saisie de l'internaute

        //Meme chose que la ligne du dessus, sans passer par la fonction execute_requete :
        //$pdostatement = $pdo->query(" SELECT pseudo FROM membre WHERE pseudo = '$_POST[pseudo]' "); 
    //debug( $r ); //$r : représente le jeu de réusltat retournée par la requête sous forme d'objet PDOStatement

    if( $r->rowCount() >= 1 ){ //SI le résultat est supérieur ou égal à 1, c'est que le pseudo est déjà attribué car il aura trouvé un correspondance dans la table 'membre' et renverra donc une ligne de résultat

        $error .= "<div class='alert alert-danger'>Pseudo indisponible</div>";
    }
    //---------------------------------------------
    //Boucles sur toutes les saisies de l'internaute afin de les passer dans les fonctions addslashes() et htmlentities() :
    foreach( $_POST as $indice => $valeur ){

        $_POST[ $indice ] = htmlentities( addslashes( $valeur ) );
    }

    //---------------------------------------------
    //verification de l'expression du mdp  et Cryptage du mot de passe :
    $valeur_autorisee = "#^[a-zA-Z0-9._-]+$#";
        //debug( $valeur_autorisee );
        /*
            L'expression est contenu entre les #
            ^ représente le début de la chaine
            $ marque la fin de la chaine
            entre crochets, on retrouver la liste des caractères autorisés :
                a-z : alphabet minuscule
                A-Z : alphabet MAJUSUCLE
                0-9 : les chiffres
                . : point
                _ : underscore
                - : tiret
        */
    $test = preg_match( $valeur_autorisee, $_POST['mdp'] );
    //preg_match( arg1, arg2 ): permet d'effectuer une recherche de correspondance avec une expression rationnelle (ici, $valeur_autorisee)
        //arg1 : l'expression régulière 
        //arg2 : la chaine à controler
            // => valeur de retour : true ou false

    if( $test ){ //Si le mdp est en accord avec l'expression régulière attendu, alors c'est que le mdp est au bon format et DONC on va le crypter:

        $_POST['mdp'] = password_hash( $_POST['mdp'], PASSWORD_DEFAULT );
        //password_hash( arg1, arg2 );
            //arg1 : la chaine à crypter
            //arg2 : le mode de cryptage
            //debug( $_POST['mdp'] );
    }
    else{ //SINON, c'est que le mdp ne respecte pas le format attendu

        $error .= "<div class='alert alert-danger'>Le mot de passe n'est pas valide (caractères acceptés : a-z et 0-9) </div>";
    }

    //-----------------------------------------------------------
    //INSERTION
    if( empty( $error ) ){ //Si la variable $error est vide (c'est que le formulaire a été rempli correctement), alors on fait l'insertion 

        execute_requete(" INSERT INTO membre( pseudo, mdp, nom, prenom, email, sexe, adresse, ville, cp)
                            VALUES(
                                        '$_POST[pseudo]',  
                                        '$_POST[mdp]',  
                                        '$_POST[nom]',  
                                        '$_POST[prenom]',  
                                        '$_POST[email]',  
                                        '$_POST[sexe]',  
                                        '$_POST[adresse]',  
                                        '$_POST[ville]',  
                                        '$_POST[cp]'             
                                )
                    ");

        $content .= "<div class='alert alert-success'>Inscription validée <a href='". URL ."connexion.php'> Cliquez ici pour vous connecter </a> </div>";
    }
}
//---------------------------------------------------------------------
?>
<h1>INSCRIPTION</h1>

<?php echo $error; //affichage des messages d'error ?>

<?= $content; //affichage du contenu ?>

<form method="post">

    <!-- Penser à créer un <input> pour CHAQUE CHAMPS requis pour l'insertion en BDD -->
    <label for="pseudo">Pseudo</label><br>
    <input type="text" name="pseudo" id="pseudo"><br><br>

    <label for="mdp">Mot de passe</label><br>
    <input type="text" name="mdp" id="mdp"><br><br>

    <label for="prenom">Prénom</label><br>
    <input type="text" name="prenom" id="prenom"><br><br>

    <label for="nom">Nom</label><br>
    <input type="text" name="nom" id="nom"><br><br>

    <label for="email">Email</label><br>
    <input type="text" name="email" id="email"><br><br>

    <label>Civilite</label><br>
    <input type="radio" name="sexe" value="f"  > Femme<br>
    <input type="radio" name="sexe" value="m"> Homme<br><br>

    <label for="adresse">Adresse</label><br>
    <input type="text" name="adresse" id="adresse"><br><br>

    <label for="ville">Ville</label><br>
    <input type="text" name="ville" id="ville"><br><br>

    <label for="cp">Code postal</label><br>
    <input type="text" name="cp" id="cp"><br><br>
    
    <input type="submit" class="btn btn-secondary" value="S'inscrire">

</form>

<?php require_once 'inc/footer.inc.php'; ?>