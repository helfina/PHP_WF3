<?php
// 4 - Créer un fichier array.php :
// 	4.1 - Déclarer un tableau avec tous les fruits : pommes, cerises, poires, bananes
$tab_fruit = array( 'pommes', 'cerises', 'poires', 'bananes' );

// 	4.2 - Déclarer un tableau avec tous les poids suivants : 100, 500, 1000, 2000, 5000
$tab_poids = [100, 500, 1000, 2000, 5000];

// 		4.3 - Affichez les 2 tableaux (faire un print_r() !!! )
print "<pre>";
    print_r( $tab_fruit );
    print_r( $tab_poids );
print "</pre>";

// 	4.4 - Sortir le fruit 'cerise' avec le poids 500 via les tableaux créés pour les transmettre à la fonction calcul() et ainsi obtenir le prix
include "fonction.inc.php";

echo calcul( $tab_fruit[1], $tab_poids[1] );

// 	4.5 - Sortir TOUS les prix pour les cerises avec tous les poids (boucle)
echo "<hr>";

foreach( $tab_poids as $poids ){

    echo calcul( $tab_fruit[1], $poids );
}

echo "<hr>";

for( $i = 0; $i < sizeof( $tab_poids ); $i++ ){

    echo calcul( $tab_fruit[1], $tab_poids[$i]  );
}

// 	4.6 - Sortir tous les prix pour tous les fruits avec tous les poids (boucles imbriquées)

foreach( $tab_fruit as $fruit ){

    echo "<h2> $fruit </h2>";

    foreach( $tab_poids as $poids ){

        echo calcul( $fruit, $poids );
    }
}

echo "<hr>";
//----------------------------------------------
for( $i = 0 ; $i < count($tab_fruit); $i++ ){

    echo "<h4>$tab_fruit[$i]</h4>";

    for( $j =0; $j < sizeof( $tab_poids ); $j++ ){

        echo calcul( $tab_fruit[$i], $tab_poids[$j] );
    }
}

// 		4.7 - faire un affichage dans un tableau ('<table>') pour un affichage plus 'propre'
// 			les titres des colonnes seront les poids
// 			les titres des lignes seront les fruits










echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";