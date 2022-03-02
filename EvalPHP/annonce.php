<?php
require_once "inc/header.inc.php";
if(!empty( $_POST['reservation_message'] ) ){
    //debug($_POST);
    execute_requete("UPDATE advert SET reservation_message = '$_POST[reservation_message]' WHERE id = $_GET[id]");
}

    if(  isset( $_GET['id'] ) ){
    $requeteAnnonce = execute_requete(" SELECT * FROM advert WHERE id = $_GET[id] ");
    $annonce = $requeteAnnonce->fetch( PDO::FETCH_ASSOC );
    //debug( $annonce );

    //file d'ariane
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

    if (empty($annonce['reservation_message'])){ ?>
    <form action="" method="post" class="form-floating">
        <?= "<div class='text-center mt-3 mb-3 bg-danger'>" . $error . "</div>";  //Affichage des messages d'erreurs ?>

        <textarea class="form-control" name="reservation_message" placeholder="Votre Message" id="reservation_message"></textarea>
        <label for="reservation_message">Votre message</label>

        <input type="submit" value=" Je réserve" class="btn btn-primary mt-3">

    </form>
        <?php
            }else{ ?>
            <p><?= $annonce['reservation_message']?></p>
    <?php }
        ?>
</main>
<?php
require_once "inc/footer.inc.php";
?>