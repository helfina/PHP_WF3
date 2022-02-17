<?php
include "fonction.inc.php";
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

    <title>Exercice PHP</title>

    <!--    css bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--    <link rel="stylesheet" href="css/compta.css">-->
</head>

<body>
<h1>Exercice 3</h1>
<form method="post" action="" enctype="multipart/form-data" class="form-control">

    <select name="fruit" id="">
        <option value="pommes"><?php if(!empty($_POST['fruit'])){
                                            echo htmlspecialchars($_POST['fruit']);
                                        }
                               ?>
        </option>
        <option value="pommes">pommes</option>
        <option value="poires">poires</option>
        <option value="cerises">cerises</option>
        <option value="bananes">bananes</option>
    </select>
    <label for="poids"></label>
    <input type="number" name="poids" placeholder="
        <?php
        if (!empty($_POST['poids'])) {
            echo $_POST['poids'];
        } ?>
    ">
    <input type="submit" value="Valider">

</form>
<!-- script bootstrap 5-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>

