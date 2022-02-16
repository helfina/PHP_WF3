<h1> Formulaire 5 </h1>

<a href="formulaire4.php">Retour vers le formulaire 4</a>
<hr>

<?php
echo $valid = (
               !empty($_POST['address']) &&
               !empty($_POST['ville']) &&
               !empty($_POST['cp'])
               ) ?
                    "J'habite au " . $_POST['adresse'] . " à " . $_POST['ville'] . " " . $_POST['cp'] . "<br>" :
                    " tout les  champs sont obligatoire <br>";

if (!empty($_POST['address']) &&
    !empty($_POST['ville']) &&
    !empty($_POST['cp'])){
    echo "J'habite au " . $_POST['address'] . " à " . $_POST['ville'] . " " . $_POST['cp'] . "<br>";
}else{
   echo "tout les  champs sont obligatoire <br>";

}

foreach ($_POST as $key => $value) {
    echo $key . " : " . $value. "<br>";
}

