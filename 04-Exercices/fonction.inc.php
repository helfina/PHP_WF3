<?php
// --------- EXO 1 -------------------
function calcul($fruit, $poids)
{
    switch ($fruit) {
        case 'pommes':
            $prix_kg = 2;
            break;
        case 'bananes':
            $prix_kg = 1;
            break;
        case 'cerises':
            $prix_kg = 4;
            break;
        case 'poires':
            $prix_kg = 3;
            break;
        default:
            echo 'erreur switch';
    }
    $prix = ($poids * $prix_kg) / 1000; // ici ma variable $prix ne s'affiche pas
    return "Les " . $fruit . " coutent " . $prix . " € pour un poids de " . $poids . " grammes";
}

// --------- EXO 2 -------------------
//echo calcul($_GET["fruit"], $_GET["poids"]);

// --------- EXO 3 -------------------
if(!empty($_POST['fruit']) && !empty($_POST['poids'])){
    echo calcul($_POST['fruit'],$_POST['poids']);
}

