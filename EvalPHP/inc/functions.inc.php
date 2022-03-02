<?php

//fonction debugage : (permet de faire un print_r() "amélioré)
function debug( $arg ){

echo "<div style='background:#fda500; z-index:1000; padding: 20px;' >";

    $trace = debug_backtrace();
    //debug_backtrace() : fonction interne de php qui retourne un array avec des infos de l'endroit où l'on fait appel à la fonction

    echo "<p>Debug demandé dans le fichier : ". $trace[0]['file'] ." à la ligne : ". $trace[0]['line'] ."</p>";

    echo "<pre>";
            print_r( $arg );
        echo "</pre>";

    echo "</div>";
}

//---------------------------------------------------------
//fonction pour exécuter la requête :
function execute_requete( $req ){

    global $pdo; //global : permet de rappatrier la variable '$pdo' dans l'espace confiné de la fonction

    $pdostatement = $pdo->query($req);

    return $pdostatement;
}

