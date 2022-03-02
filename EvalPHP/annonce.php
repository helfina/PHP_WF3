<?php
require_once "inc/header.inc.php";
if(  isset( $_GET['id'] ) ){
    $requeteAnnonce = execute_requete(" SELECT * FROM advert WHERE id = $_GET[id] ");
    $annonce = $requeteAnnonce->fetch( PDO::FETCH_ASSOC );
    debug( $annonce );

//créer 2 liens : (file d'ariane)
    //l'un pour permettre de retourner à l'accueil
    //l'autre pour retourner à la catégorie précédente
    $content .= "<a href='index.php'> Accueil </a> / ";
    $content .= "<a href='annonces.php'> Toutes les annonces </a> / ";

}else{

    header('Location:index.php');
    exit;
}
?>

<h1 class="text-center">Annonce <?= $annonce['title']?> </h1>
<main class="container">
    <?= $content; //affichage du contenu ?>
    
    <section class="mt-3">
        <h2><?= $annonce['title']?></h2>
        <p>Description du bien : <?= $annonce['description']?> </p>
        <p>Code Postal: <?= $annonce['postal_code']?> </p>
        <p>Ville : <?= $annonce['city']?> </p>
        <p>Type : <?= $annonce['type']?> </p>
        <p>Prix :<?= $annonce['price']?> </p>
    </section>
    
    
    <?php

    if ( !empty($annonce['reservation_message'])){



    ?>
    <form action="" method="post" class="form-floating">
        <?= "<div class='text-center mt-3 mb-3 bg-danger'>" . $error . "</div>";  //Affichage des messages d'erreurs ?>

        <textarea class="form-control" placeholder="Votre Message" id="floatingTextarea"></textarea>
        <label for="floatingTextarea">Votre message</label>

        <input type="submit" value=" Je réserve" class="btn btn-primary mt-3">

    </form>
        <?php
    }
        ?>
</main>
<?php
require_once "inc/footer.inc.php";
?>