<?php
/*
	-- 1 -- Creation d'une BDD : 'dialogue'

		CREATE DATABASE dialogue;
		USE dialogue;

	-- 2 -- Création d'une table : 'commentaire' (id_commentaire, pseudo, message, date_enregistrement)

		CREATE TABLE commentaire(
			id_commentaire INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			pseudo VARCHAR(20) NOT NULL,
			message TEXT NOT NULL,
			date_enregistrement DATETIME NOT NULL
		) ENGINE=InnoDB;
*/
// 3 - Connexion à la BDD :
$pdo = new PDO("mysql:host=localhost;dbname=dialogue", "root", "", array( PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING ) );
    //var_dump( $pdo );

// 4 - Création d'un formulaire avec les champs adéquats (pseudo, message):
?>

<form method="post">

    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo"><br><br>

    <label for="message">Message</label><br>
    <textarea name="message" id="message" cols="30" rows="10"></textarea><br><br>

    <input type="submit" value="Poster" >
</form>
<hr>

<?php
// print '<pre>';
//     print_r( $_POST );
// print '</pre>';

// 5 - Insertion des messages postés dans la BDD
if( $_POST ){
    
    //echo "Pseudo poste : $_POST[pseudo] <br>";
    //echo 'Message poste : ' . $_POST['message'] . "<br>";

    //Insertion (pas sécurisée)
    // $pdo->query(" 
    //     INSERT INTO commentaire( pseudo, message, date_enregistrement ) 
    //                     VALUES('$_POST[pseudo]', '$_POST[message]', NOW() ) 
    // ");
        //NOW() : fonction SQL qui permet de retourner la date et l'heure courante

    //------------------------------------------
    //addslashes() : permet d'accepter les apostrophes :
    $_POST['message'] = addslashes( $_POST['message'] );
       // echo $_POST['message'] .'<br>';

    //htmlentities() : permet de convertir les caractères spéciaux en entites html
    $_POST['message'] = htmlentities( $_POST['message'] );
    //     echo $_POST['message'] .'<br>';

    //htmlspecialchars() : permet de convertir les caractères spéciaux en entites html
    //$_POST['message'] = htmlspecialchars( $_POST['message'] );
    //     echo $_POST['message'] .'<br>';

    //strip_tags() : permet de supprimer les balises HTML et PHP
    //$_POST['message'] = strip_tags( $_POST['message'] );
        //echo $_POST['message'] .'<br>';

    //Insertion : préparation de la requête :
    $pdostatement = $pdo->prepare(" 
    
            INSERT INTO commentaire( pseudo, message, date_enregistrement )

                VALUES( :pseudo, :message, NOW() )
    ");
    //var_dump( $pdostatement );

        //justification des marqueurs :
        $pdostatement->bindValue( ':pseudo', $_POST['pseudo'], PDO::PARAM_STR );
        $pdostatement->bindValue( ':message', $_POST['message'], PDO::PARAM_STR );

    //exécution de la requête préparée: 
    $pdostatement->execute();

    //---------------------------------------------------
    //Exemple de failles :
    // $pdo->exec(" INSERT INTO commentaire( pseudo, date_enregistrement, message ) 
    //                             VALUES( '$_POST[pseudo]', NOW(), '$_POST[message]' )
    //         ");

    //     //faille css :
    //     //<style> body{display:none;} </style>

    //     //faille SLQ :
    //     //ok'); DELETE FROM commentaire;(
}

//-------------------------------------------------------
// 6 - Affichage des messages :
// 6.1 - Recuperation des donnees en BDD :
$pdostatement = $pdo->query(" SELECT * FROM commentaire ORDER BY id_commentaire DESC ");
//Ici, on recupere TOUTES les informations provenant de la table 'commentaire' ORDONNEES par id_commentaire dans l'odre DECROISSANT, donc le dernier sear affiche en premier

//Affichage du nombre de commentaires :
echo "Il y a ". $pdostatement->rowCount() .' commentaires <br>';

//6.2 - Affichages des commentaires
while( $commentaire = $pdostatement->fetch( PDO::FETCH_ASSOC ) ){

    // print '<pre>';
    //     print_r( $commentaire );
    // print '</pre>';

    echo "<div style='border:1px solid'>";

        echo "<p> $commentaire[pseudo] - le $commentaire[date_enregistrement]</p>";
        echo "<p>$commentaire[message]</p>";
    
        echo "</div>";
}


echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";