<?php

print '<pre>';
    print_r( $_POST );
print '</pre>';

if( $_POST ){ //Si il y a eu un post (donc un "submit"), c'est que l'on a valide le formulaire

    echo 'Prenom : ' . $_POST['prenom'] . '<br>';

    echo "Description : $_POST[description] <br>";
}

//$_POST est une superglobale de php et retournera donc un ARRAY et s'ecrira toujours en MAJUSUCLE
//Pour piocher des infos dans un array, il faut preciser entre crochets les indices du tableau, ici correspondant aux attributs name="" des inputs

    //$_POST['name'] ou le 'name' correspond a la valeur de l'attribut name="" des inputs. D'ou la necessite de bien renseigner cet attribut dans les inputs pour pouvoir recuperer les informations postees par l'utilisateur

//----------------------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire1</title>
</head>
<body>
    <hr>

    <form method="post" action="" enctype="multipart/form-data">
        <!-- Attributs de la balise <form>

            method="" : comment vont circuler les donnees (post ou get)
            action="" : represenete l'URL de destination lors de la validation du formulaire
            enctype="multipart/form-data" : INDISPENSABLE pour pouvoir uploader des fichiers
        -->

        <label for="prenom">Prenom</label><br>
        <input type="text" id="prenom" name="prenom"><br><br>
        <!-- NE SOURTOUT PAS OUBLIER L'ATTRIBUT name="" DANS LES INPUTS D'UN FORMULAIRE !!!!! -->

        <label for="desc">Description</label><br>
        <textarea name="description" id="desc" cols="30" rows="10"></textarea><br><br>

        <input type="submit" value="Valider">
        <!-- TOUJOURS UN INPUT type="submit" pour valider l'envoi du formulaire -->
    </form>

</body>
</html>