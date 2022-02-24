<?php require_once 'init.inc.php'; //inclusion du fichier init.inc.php ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon site</title>

    <!-- CDN CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- STYLE CSS PERSO -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= URL ?>index1.php">LOGO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= URL ?>index1.php">Accueil</a>
        </li>

        <?php if( !userConnect() ) : //Si l'utilisateur N'EST PAS connecté, on affihe les liens : connexion et inscription ?>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL ?>inscription.php">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL ?>connexion.php">Connexion</a>
          </li>

        <?php else : //SINON, c'est que l'on est connecté et donc on affiche les liens vers : profil et deconnexion ?>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL ?>profil.php">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL ?>connexion.php?action=deconnexion">Deconnexion</a>
            <!-- La deconnexion se fera sur le fichier connexion.php -->
          </li>

        <?php endif; ?>
  
        <?php if( adminConnect() ) : //SI l'admin EST CONNECTE, on affiche le menu du backoffice ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Backoffice
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>admin/gestion_produit.php">Gestion produit</a></li>
            <li><a class="dropdown-item" href="#">-</a></li>
            <li><a class="dropdown-item" href="#">-</a></li>
          </ul>
        </li>

        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>

    <div class="container" style="margin-bottom:500px">