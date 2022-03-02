<?php
require_once "init.inc.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- balises meta -->
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Gaelle kerforne "> <!-- pour dire qui a créé la page -->
    <meta name="description" content="cours html-css">

    <!-- favicon pour le title-->
    <link rel="shortcut icon" href="images/favicon.jpg" type="image/x-icon" sizes="16x16">
    <title>Evaluation PHP </title>

    <!-- style  -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



</head>

<body>
<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= URL ?>index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>ajoutAnnonce.php?action=ajouter">Ajouter une annonce</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>annonces.php">Consulter toutes les annonces</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>