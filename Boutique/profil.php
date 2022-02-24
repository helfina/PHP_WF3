<?php require_once 'inc/header.inc.php'; ?>
<?php

//restriction d'accès à la page
if( !userConnect() ){ //SI l'utilisateur N'EST PAS connecté

    //redirection vers la page de connexion
    header('location:connexion.php');
    exit; //exit; permet de quitter le script courant
}

//---------------------------------------------------------
//SI l'admin est connecte, on affiche un titre pour le préciser :
if( adminConnect() ){

    $content .= "<h2 style='color:tomato;'> ADMINISTRATEUR </h2>";
}

//---------------------------------------------------------
//debug( $_SESSION );

//Ici, on récupère le pseudo de la personne connecté grâce au fichier de session que l'on a remplis lors de la connexion et on l'affiche dans la balise <h2>
$pseudo = $_SESSION['membre']['pseudo'];

$content .= '<h3>Vos infos personnelles</h3>';

$content .= "<p>Votre prénom : ". $_SESSION['membre']['prenom'] ."</p>";
$content .= "<p>Votre nom : ". $_SESSION['membre']['nom'] ."</p>";
$content .= "<p>Votre email : ". $_SESSION['membre']['email'] ."</p>";

$content .= "<p>Votre adresse : ". $_SESSION['membre']['adresse'] ." ". $_SESSION['membre']['cp'] ." à ". $_SESSION['membre']['ville'] ."</p>";

//-------------------------------------------------------------------
?>
<h1>PAGE PROFIL</h1>

<h2>Bonjour <?= $pseudo //affichage de la variable $pseudo ?> </h2>

<?php echo $content; //affichage du contenu ?>

<?php require_once 'inc/footer.inc.php'; ?>