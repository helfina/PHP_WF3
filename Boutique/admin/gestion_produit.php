<?php require_once "../inc/header.inc.php"; ?>
<?php
//Restriction de l'accès à la page :
if( !adminConnect() ){ //SI l'admin N'EST PAS connecté, alors on le redirige vers la page de connexion

    header("location:../connexion.php");
    exit;
}

//-----------------------------------------------------
//Gestion des produits : INSERTION
if( !empty( $_POST ) ){ //SI le formulaire a été validé et qu'il N'EST PAS vide

    debug( $_POST );

    //Controles sur les saisies (il faudrait faire pour chaque input)
    //EXERCICE : Faites en sorte d'afficher un message d'erreur si la référence postée existe déjà :
    $r = execute_requete("SELECT reference FROM produit WHERE reference = '$_POST[reference]' ");
    //ICi, on sélectionne la référence de la table 'produit' A CONDITION que dans la colonne 'reference', ce soit égale à ce que l'utilisateur a saisi

    if( $r->rowCount() >= 1 ){ //SI le jeu de résultat (ici, $r) retourné par la requête est supérieur ou égal à 1, c'est que la référence a été trouvé en BDD et donc on aura une ligne de résultat que me retourne la methode rowCount()

        $error .= "<div class='alert alert-danger'>Référence indisponible </div>";
    }

    //-----------------------------------------------------
    //On passe toutes les infos postées par l'admin dans les fontions addslashes() et htmlentities()
    foreach( $_POST as $index => $value ){

        $_POST[ $index ] = htmlentities( addslashes( $value ) );
    }

    //-----------------------------------------------------
    //GESTION de la photo
    debug( $_FILES );
    //debug( $_SERVER );

    if( !empty( $_FILES['photo']['name'] ) ){ //SI le nom de la photo dans $_FILES N'EST PAS VIDE, c'est que l'on a téléchargé un fichier

        //Ici, je renomme la photo (avec la ref)
        $nom_photo = $_POST['reference'] .'_'. $_FILES['photo']['name'];
        //$_POST['reference'] corresopnd à la référence saisie par l'admin
        //$_FILES['photo']['name'] correspond au nom du fichier téléchargé
        //debug( $nom_photo );

        //Chemin pour accéder à la photo (à insérer en BDD)
        $photo_bdd = URL ."photo/" . $nom_photo;
        //constante URL <=> http://php_wf3.test/Boutique/
        //debug( $photo_bdd );

        // http://localhost/PHP/boutique/photo/11_photo.png

        //Chemin où l'on souhaite enregistrer notre fichier "physique" de la photo
        $photo_dossier = $_SERVER['DOCUMENT_ROOT'] . "/Boutique/photo/" . $nom_photo;
//       debug($_SERVER['DOCUMENT_ROOT']);
        //debug( $photo_dossier );
        //$_SERVER : superglobale de php qui retourne des infos sur le serveur courant
        //$_SERVER['DOCUMENT_ROOT']  <=> C:/MAMP/www

        // C:/MAMP/www/PHP/boutique/photo/photo.png

        //Enregistrement (du fichier physique) de la photo dans le dossier 'photo' de notre serveur
        copy( $_FILES['photo']['tmp_name'], $photo_dossier );
        //copy( arg1, arg2 );
        //arg1 : chemin du fichier source
        //arg2 : chemin de destination
    }
    else{ //SINON, c'est que l'on a pas télécharger de fichier et donc on affiche un message d'erreur

        $error .= "<div class='alert alert-danger'> Vous n'avez pas uploader de photo</div>";
    }


    //-----------------------------------------------------
    if( empty( $error ) ){ //SI la variable $error est vide, on fait une insertion

        execute_requete(" 
        
        INSERT INTO produit( reference, categorie, titre, description, couleur, taille, sexe, photo, prix, stock )
                    VALUES(
                            '$_POST[reference]',
                            '$_POST[categorie]',
                            '$_POST[titre]',
                            '$_POST[description]',
                            '$_POST[couleur]',
                            '$_POST[taille]',
                            '$_POST[sexe]',
                            '$photo_bdd',
                            '$_POST[prix]',
                            '$_POST[stock]'
                    )
        ");
    }

}

//---------------------------------------------------------------
//AFFICHAGE DES PRODUITS : (TOUJOURS après l'insertion pour pouvoir voir le dernier produit inséré, meme si ici, on séparé l'afficahge de l'ajout)
debug( $_GET );

if( isset($_GET['action']) && $_GET['action'] == 'affichage' ){
    //SI il y a une 'action' dans l'URL ET QUE cette 'action' est égale à 'affichage', alors on affiche la liste des produits !

    echo "AFFICHAGE DES PRODUITS";
    //EXERCICE : Affichez le nombre de produits et la liste des produits sous forme de tableau et faites en sorte d'affichez l'image :
    $photo = execute_requete("select photo from produit where photo is not null ");
    debug($photo);
    while ($photo){
         echo "<img src='. $photo .' alt='img'>";
    }

}

//---------------------------------------------------------------
?>

    <h1>GESTION DES PRODUITS</h1>

    <!-- 2 liens pour gérer soit l'affichage des produits soit le formulaire d'ajout -->
    <a href="?action=ajout">Ajout Produit</a><br>
    <a href="?action=affichage">Affichage Produit</a><hr>

<?= $error; //affichage des erreurs ?>

<?php if( isset($_GET['action']) && $_GET['action'] == 'ajout' ) :  //SI il existe une 'action' dansa l'URL ET QUE cette 'action' est égal à 'ajout', alors on affiche le formulaire ?>

    <form method="post" enctype="multipart/form-data">
        <!-- enctype="multipart/form-data" : cet attribut est OBLIGATOIRE lorsque l'on souhaite uplaoder des fichiers et les récupérer via $_FILES -->

        <label>Référence</label><br>
        <input type="text" name="reference" ><br>

        <label>Catégorie</label><br>
        <input type="text" name="categorie" ><br>

        <label>Titre</label><br>
        <input type="text" name="titre" ><br>

        <label>Description</label><br>
        <input type="text" name="description" ><br>

        <label>Couleur</label><br>
        <input type="text" name="couleur" ><br>

        <label>Taille</label><br>
        <select name="taille" >
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select><br><br>

        <label>Civilite</label><br>
        <input type="radio" name="sexe" value="m" checked >Homme<br>
        <input type="radio" name="sexe" value="f">Femme<br><br>

        <label>Photo</label><br>
        <input type="file" name="photo" ><br>

        <label>Prix</label><br>
        <input type="text" name="prix" ><br>

        <label>Stock</label><br>
        <input type="text" name="stock" ><br><br>

        <input type="submit" value="valider" class="btn btn-secondary">
    </form>

<?php endif; ?>
<?php require_once "../inc/footer.inc.php"; ?>