<?php
include "fonction.inc.php";

$fruits = array('pommes', 'cerises', 'poires', 'bananes');
$poids = array(100, 500, 1000, 2000, 5000);

print_r($fruits);
echo '<hr>';
print_r($poids);
echo '<hr>';

foreach ($fruits as $key => $valueFruits) {
    if ($valueFruits == 'cerises') {
        $cerise = $valueFruits;
    }
}

echo $cerise;
echo '<hr>';
foreach ($poids as $key => $valuePoids) {
    if ($valuePoids == 500) {
        $poid = $valuePoids;
    } else {
        $lePoid = $valuePoids;
    }
}

echo $poid;
echo '<hr>';
echo calcul($cerise, $poid);
echo '<hr>';

foreach ($poids as $key => $valuePoids) {
    echo calcul($cerise, $valuePoids) . "<br>";
}
echo '<hr><br><hr>';
foreach ($fruits as $key => $valueFruits) {
    foreach ($poids as $key => $valuePoids) {
        echo calcul($valueFruits, $valuePoids) . "<br>";
    }
    echo "<hr>";
}

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

<body class="container">
<h1>Exercice 4</h1>
<?php
echo '<hr><table class="table table-dark table-striped"><thead><tr><th scope="col">Fruits/Poids</th>';
foreach ($poids as $key => $valuePoids) {
    echo "<th scope='col'>".$valuePoids . "</th>";
}
echo '</tr></thead><tbody><tr>';
foreach ($fruits as $key => $valueFruits) {
    echo "<th scope='col'>".$valueFruits . "</th>";
    foreach ($poids as $key => $valuePoids) {
        echo "<td>" . calcul($valueFruits, $valuePoids) . "</td>";
    }
    echo "</tr>";
}
echo '</tbody></table><hr><br>';

?>
<!-- script bootstrap 5-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>

