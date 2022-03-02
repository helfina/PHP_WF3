<?php
require_once 'inc/header.inc.php';


if ($_POST) { //SI on valide le formulaire

    debug($_POST);

    //---------------------------------------------
    //Controles des saisies :
    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlentities(addslashes($value));
    }

    // !TODO faire la verif du select ---------------------------------------------
    if (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['city']) || empty($_POST['price'])) {

        $error .= "<p>Veuillez renseigner les champs obligatoires</p>";
    }

    //--------------------- Code postal ------------------------

    if (!empty($_POST['postal_code'])) {

        if (!is_numeric($_POST['postal_code'])) {

            $error .= "<p style='color:red;'>Vous devez saisir un code postal</p>";
        }

        if (strlen($_POST['postal_code']) != 5) {

            $error .= "<p style='color:red;'>Vous devez renseigner un code postal de 5 chiffres</p>";
        }
    }

    if (empty($error)) { //Si la variable '$error' est vide, c'est que le formulaire a été rempli correctement
        echo "ok";

        /* !TODO corriger l'erreur de syntaxe sql
            Warning: PDO::query(): SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 9 in C:\MAMP\www\PHP_WF3\EvalPHP\inc\functions.inc.php on line 26
        */

        execute_requete(" 
        
        INSERT INTO advert('title', 'description', 'postal_code', 'city', 'type', 'price')
                    VALUES(
                            '$_POST[title]',
                            '$_POST[description]',
                            '$_POST[postal_code]',
                            '$_POST[city]',
                            '$_POST[type]',
                            '$_POST[price]',
                    )
        ");

    }
}


?>
<h1 class="text-center">Ajout annonce</h1>

<main class="container">

    <form action="" method="post">
        <?= "<div class='text-center mt-3 mb-3 bg-danger'>" . $error . "</div>";  //Affichage des messages d'erreurs ?>

        <label for="title" class="form-label mt-3">Titre de l’annonce</label>
        <input type="text" name="title" id="title" class="form-control">

        <label for="description" class="form-label mt-3">Description de l’annonce</label>
        <input type="text" name="description" id="description" class="form-control">

        <label for="postal_code" class="form-label mt-3">Code Postal</label>
        <input type="number" name="postal_code" id="postal_code" class="form-control">

        <label for="city" class="form-label mt-3">Ville</label>
        <input type="text" name="city" id="city" class="form-control">

        <!--        <label for="" class="form-label">Type d'annonce</label>-->
        <select class="form-select mt-3" aria-label="Type d'annonce" name="type">
            <option selected>Votre type d'annonce</option>
            <option value="location">Location</option>
            <option value="vente">Vente</option>
        </select>

        <label for="price" class="form-label mt-3">Prix</label>
        <input type="number" name="price" id="price" class="form-control">

        <input type="submit" value=" Ajouter" class="btn btn-primary mt-3">

    </form>
</main>

<?php require_once "inc/footer.inc.php"; ?>
