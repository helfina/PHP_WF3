<?php
//Fonction de debugage : (permet de faire un print_r() "amélioré");
function debug( $arg ){

    echo "<div style='background:#fda500; z-index:1000'>";

    $trace = debug_backtrace();
    //debug_backtrace(): Fonction interne de php qui retourne un array avec des infos de l'endroit où l'on fait appel à la fonction

    echo "<p>Debug demandé dans le fichier : ". $trace[0]['file'] ." à la ligne : " . $trace[0]['line'] . "</p>";
    // print "<pre>";
    //     print_r( $trace );
    // print "</pre>";

    print "<pre>";
    print_r( $arg );
    print "</pre>";

    echo "</div>";
}

// test pour voir les infos de debug_backtrace() :
// $test = ['toto', 'tata', 'titi'];
// debug( $test );

//---------------------------------------------------------
//fonction pour exécuter la requête :
function execute_requete( $req ){

    global $pdo; //global : permet de rappatrier la variable '$pdo' dans l'espace confiné de la fonction

    $pdostatement = $pdo->query( $req );

    return $pdostatement;
}

//---------------------------------------------------------
//Fonction userConnect() : SI l'internaute est connecté, on renvoie "true", sinon on renvoie "false"
function userConnect(){

    if( !isset( $_SESSION['membre'] ) ){ //SI la session/membre N'EXISTE PAS, c'est que l'on n'est pas connecté, et donc on renvoie "false

        return false;
    }
    else{ //SINON, c'est que session/membre existe et donc que l'on est connecté, on renvoie "true"

        return true;
    }
}
//---------------------------------------------------------
//Fonction adminConnect() :  SI l'admin est connecté, on renvoie "true", sinon on renvoie "false"
function adminConnect(){

    if( userConnect() && $_SESSION['membre']['statut'] == 1 ){ //SI l'utilisateur est connecté ET qu'il est admin, donc que son statut est égal à 1

        return true;
    }
    else{ //SINON, c'est que son statu est égal à zero, et donc on renvoi "false"

        return false;
    }
}
//---------------------------------------------------------



