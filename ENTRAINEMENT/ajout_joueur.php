<?php require_once "inc/init.inc.php"; ?>
<?php require_once "inc/header.inc.php"; ?>
<?php

if( $_POST ){ //SI on valide le formulaire

    print '<pre>';
        print_r( $_POST );
    print '</pre>';

    //---------------------------------------------
    //Controles des saisies :
    foreach( $_POST as $key => $value ){

        $_POST[$key] = htmlentities( addslashes( $value ) ); 
    }

    //---------------------------------------------
    //Champs 'nom' et 'prenom' OBLIGATOIRES :
    if( empty( $_POST['nom'] ) || empty($_POST['prenom']) ){ //SI l'input 'nom' OU 'linput 'prenom' est vide, alors on affihce un message d'erreur

        $error .= "<p style='color:red;'>Veuillez renseigner les champs obligatoires</p>";
    }
    
    //---------------------------------------------
    //Verification de l'age : entier et 2 chiffres
    if( !empty( $_POST['age'] ) ){ //SI l'input age N'EST PAS VIDE

        if( !is_numeric( $_POST['age']) ){ //SI l'age N'EST PAS un entier 

            $error .= "<p style='color:red;'>Vous devez saisir des chiffres</p>";
        }

        if( strlen( $_POST['age'] ) != 2 ){ //SI la taille de l'age est DIFFERENTE DE 2

            $error .= "<p style='color:red;'>Vous devez renseigner un age de 2 chiffres</p>";
        }
    }

    if( empty( $error) ){ //Si la variable '$error' est vide, c'est que le formulaire a été rempli correctement

        $pdo->exec("INSERT INTO player(nom, prenom, age, poste, presentation) 
        
                            VALUES( 
                                    '$_POST[nom]',
                                    '$_POST[prenom]',
                                    '$_POST[age]',
                                    '$_POST[poste]',
                                    '$_POST[presentation]'
                                ) 
                ");
    }
}

//--------------------------------------------------------------------------------
?>
<h1>Ajout joueur</h1>

<?php echo $error;  //Affichage des messages d'erreurs ?>

<form method="post">

    <label>Prenom</label><br>
    <input type="text" name="prenom"><br><br>

    <label>Nom</label><br>
    <input type="text" name="nom"><br><br>
    
    <label>Age (doit contenir 2 chiffres)</label><br>
    <input type="text" name="age"><br><br>

    <label>Poste</label><br>
   <select name="poste" >
       <option value="attaquant">Attaquant</option>
       <option value="defenseur">Défenseur</option>
   </select><br><br>
    
    <label>Présentation</label><br>
    <textarea name="presentation"></textarea><br><br>

    <input type="submit" value="Enregistrer">

</form>

<?php require_once "inc/footer.inc.php"; ?>
