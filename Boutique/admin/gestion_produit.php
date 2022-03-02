<?php require_once "../inc/header.inc.php"; ?>
<?php
//Restriction de l'accès à la page :
if( !adminConnect() ){ //SI l'admin N'EST PAS connecté, alors on le redirige vers la page de connexion

    header("location:../connexion.php");
    exit;
}
//-------------------------------------------------------
//SUPPRESSION
debug( $_GET );

if( isset($_GET['action']) && $_GET['action'] == 'suppression' ){ //SI il y a une 'action' dans l'URL ET que cette 'action' est égale à 'suppression'

    //Suppression de la photo:
    // 1 - récupération de la colonne 'photo' BDD
    $r = execute_requete(" SELECT photo FROM produit WHERE id_produit = $_GET[id_produit] ");

    $photo_a_supprimer = $r->fetch( PDO::FETCH_ASSOC );
    debug( $photo_a_supprimer );

    $chemin_photo_a_supprimer = str_replace( 'http://localhost', $_SERVER['DOCUMENT_ROOT'], $photo_a_supprimer['photo'] );
    debug( $chemin_photo_a_supprimer );

    //str_replace( arg1, arg2, arg3 )! fonction de php qui permet de remplacer des occurences dans une chaines
    //arg1 : la chaine que l'on souhaite remplacer
    //arg2 : la chaine de remplacement
    //arg3 : la chaine sur laquelle on veut effectuer les changements

    /*Ici, je remplace : 'http://localhost'
                    par : $_SERVER['DOCUMENT_ROOT'] <=> "C:/xampp/htdocs"
                    dans : $photo_a_supprimer['photo'] (l'adresse de la photo récupérée en BDD)
    */

    if( !empty( $chemin_photo_a_supprimer ) && file_exists( $chemin_photo_a_supprimer ) ){

        unlink( $chemin_photo_a_supprimer );
        //unlink( $arg ) : permet de supprimer un fichier (ici, $arg corresopnd au chemin du fichier à supprimer)
    }

    //La portion de code ci dessous (la suppression : DELETE) DOIT IMPERATIVEMENT se trouver APRES la gestion de la suppression de la photo car si on supprime avant le produit en BDD, on ne pourrait plus récupérer l'adresse de la photo en base.

    execute_requete(" DELETE FROM produit WHERE id_produit = $_GET[id_produit] ");
    //SUPPRESSION dans la table 'produit' A CONDITION que dans la colonne 'id_produit' soit égale à l'id que l'on récupère dans l'URL (que l'on a envoyée lors du click sur la corbeille)
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
            debug($_SERVER['DOCUMENT_ROOT']);
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

if( isset($_GET['action']) && $_GET['action'] == 'affichage' ){
    //SI il y a une 'action' dans l'URL ET QUE cette 'action' est égale à 'affichage', alors on affiche la liste des produits !

    //EXERCICE : Affichez le nombre de produits et la liste des produits sous forme de tableau et faites en sorte d'affichez l'image :
    $r = execute_requete(" SELECT * FROM produit ");

    $content .= "<h2>Liste des produits</h2>";
    $content .= "<p>Nombre de produits dans la boutique : ". $r->rowCount() ."</p>";

    $content .= "<table class='table table-bordered'>";
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
                                <a href='?action=suppression&id_produit=$ligne[id_produit]' onclick='return( confirm(\"Voulez-vous supprimer le produit $ligne[titre]\") )' >supp</a>
                            </td>";
        $content .= "<td>
                                <a href='?action=modification&id_produit=$ligne[id_produit]'>
                                    modif
                                </a>
                            </td>";
        $content .= "</tr>";
    }
    $content .= "</table>";
}

//---------------------------------------------------------------
?>

    <h1>GESTION DES PRODUITS</h1>

    <!-- 2 liens pour gérer soit l'affichage des produits soit le formulaire d'ajout -->
    <a href="?action=ajout">Ajout Produit</a><br>
    <a href="?action=affichage">Affichage Produit</a><hr>

<?= $error; //affichage des erreurs ?>

<?= $content; //affichage du contenu ?>

<?php if( isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification') ) :  //SI il existe une 'action' dans l'URL ET QUE cette 'action' est égal à 'ajout' OU à 'modification', alors on affiche le formulaire

    if( isset( $_GET['id_produit']) ){ //Si il existe 'id_produit' dans l'URL, c'est qeu l'on est dans le cadre d'une modification

        //Récupération des infos du produit à modifier, pour pré remplir le formulaire
        $r = execute_requete("SELECT * FROM produit WHERE id_produit = $_GET[id_produit] ");

        //exploitation des données :
        $article_actuel = $r->fetch( PDO::FETCH_ASSOC );
        //debug( $article_actuel );
    }
    //---------------------------------------------------
    if( isset( $article_actuel['reference'] ) ){ //SI il existe $article_actuel['reference'] c'est que l'on est dans le cadre d'une modification et la condition précédente aura été exécutée

        $reference = $article_actuel['reference']; //On stocke dans une variable la valeur récupérée en BDD que l'on affichera dans l'attribut value="" de l'input correspondant (ici, reference)
    }
    else{ //SINON, c'est que je ne suis pas dans le cadre d'une modification (donc d'un ajout !) alors je stocke du "vide" dans la même variable qui sera affiché dans l'attribut value="" de l'input correspondant (ici, reference)

        $reference = "";
    }
    //version ternaire :
    $categorie = ( isset($article_actuel['categorie']) ) ? $article_actuel['categorie'] : "";
    $titre = ( isset($article_actuel['titre']) ) ? $article_actuel['titre'] : "";
    $description = ( isset($article_actuel['description']) ) ? $article_actuel['description'] : "";
    $couleur = ( isset($article_actuel['couleur']) ) ? $article_actuel['couleur'] : "";
    $prix = ( isset($article_actuel['prix']) ) ? $article_actuel['prix'] : "";
    $stock = ( isset($article_actuel['stock']) ) ? $article_actuel['stock'] : "";

    //Gestion de la taille (select/option) :
    if( isset($article_actuel['taille'] ) && $article_actuel['taille'] == "S" ){

        $taille_s = "selected";
    }
    else{
        $taille_s = "";
    }

    $taille_m = (isset( $article_actuel['taille']) && $article_actuel['taille'] == 'M') ? 'selected' : '';
    $taille_l = (isset( $article_actuel['taille']) && $article_actuel['taille'] == 'L') ? 'selected' : '';
    $taille_xl = (isset( $article_actuel['taille']) && $article_actuel['taille'] == 'XL') ? 'selected' : '';

    //-------------------
    //Gestion de la civilite : (input:radio)
    if( isset($article_actuel['sexe']) && $article_actuel['sexe'] == 'f' ){

        $sexe_m = "";
        $sexe_f = 'checked';
    }
    else{

        $sexe_m = "checked";
        $sexe_f = '';
    }
    // $sexe_m = (isset( $article_actuel['sexe']) && $article_actuel['sexe'] == 'm') ? 'checked' : '';
    // $sexe_f = (isset( $article_actuel['sexe']) && $article_actuel['sexe'] == 'f') ? 'checked' : '';

    //-------------------------------
    //Gestion de la photo (input:file):
    if( isset( $article_actuel['photo'] ) ){

        $info_photo = "<i>Vous pouve uploader une nouvelle photo</i>";

        $info_photo .= "<img src='$article_actuel[photo]' width='100' alt=''><br>";

        $info_photo .= "<input type='hidden' name='photo_actuelle' value='$article_actuel[photo]'>";
        //Ici, nous avons créé un <input type='hidden'> (input "caché") avec en value l'adresse de la photo récupérée en BDD pour pouvoir la récupérer lors de la modification dans le cas où l'on ne télécharge pas de nouvelle photo
    }
    else{

        $info_photo = '';
    }

    ?>

    <form method="post" enctype="multipart/form-data">
        <!-- enctype="multipart/form-data" : cet attribut est OBLIGATOIRE lorsque l'on souhaite uplaoder des fichiers et les récupérer via $_FILES -->

        <label>Référence</label><br>
        <input type="text" name="reference" value="<?= $reference ?>" ><br>

        <label>Catégorie</label><br>
        <input type="text" name="categorie" value="<?= $categorie ?>"><br>

        <label>Titre</label><br>
        <input type="text" name="titre" value="<?= $titre ?>"><br>

        <label>Description</label><br>
        <input type="text" name="description" value="<?= $description ?>"><br>

        <label>Couleur</label><br>
        <input type="text" name="couleur" value="<?= $couleur ?>"><br>

        <label>Taille</label><br>
        <select name="taille" >
            <option value="S" <?= $taille_s ?> >S</option>
            <option value="M" <?= $taille_m ?> >M</option>
            <option value="L" <?= $taille_l ?> >L</option>
            <option value="XL" <?= $taille_xl ?> >XL</option>
        </select><br><br>

        <label>Civilite</label><br>
        <input type="radio" name="sexe" value="m" <?= $sexe_m ?> >Homme<br>
        <input type="radio" name="sexe" value="f" <?= $sexe_f ?> >Femme<br><br>

        <label>Photo</label><br>
        <input type="file" name="photo"><br>

        <?php echo $info_photo; //Affichage de la photo (SI modification) ?>

        <label>Prix</label><br>
        <input type="text" name="prix" value="<?= $prix ?>"><br>

        <label>Stock</label><br>
        <input type="text" name="stock" value="<?= $stock ?>"><br><br>

        <input type="submit" value="<?= ucfirst( $_GET['action'] ); ?>" class="btn btn-secondary">
        <!-- Afficahge de la valeur de  l'action passée dans l'URL (ici, soit 'ajout', soit 'modification') dans l'attribut value='' de l'input submit.
        ucfirst() : fonction php qui permet de passer la première lettre en majusucle -->
    </form>

<?php endif; ?>

<?php require_once "../inc/footer.inc.php"; ?>