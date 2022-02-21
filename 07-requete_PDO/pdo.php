<?php
//SQL : 4 requêtes à savoir :

// CRUD :

// Create 	=> requête INSERT (insertion en bdd)
// Read 	=> requête SELECT (lire/récupérer les infos en bdd)
// Update 	=> requête UPDATE (modification en bdd)
// Delete 	=> requête DELETE (suppression en bdd)

//----------------------------------------------------------------------------------

/*	PDO : PHP DATA OBJECT : Représente une connexion entre PHP et un serveur de base de données.

=> EXEC() :

	=> INSERT, UPDATE, DELETE :
		exec() est utilisé pour la formulation de requêtes ne retournant pas de résulat !
		exec() renvoi le nombre de lignes affectées par la requêtes

	Valeur de retour :
		ECHEC : false
		SUCCES : 1 (ce nombre varie selon le nombre d'enregisrement affecté par la requête)

//-------------------------------------------------------------------
=> QUERY() :

	=> SELECT : Au contraire d'exec(), query() est utilisé pour la formulation de requêtes retournant un ou plusieurs résultats.

	Valeur de retour :
		ECHEC : false
		SUCCES : PDOStatement (objet)

//-------------------------------------------------------------------
=> PREPARE() puis EXECUTE() :

	SELECT, INSERT, UPDATE, DELETE :

		prepare() : permet de préparer sans exécuter
		execute() : permet d'exécuter la requête préparée

	Valeur de retour :
		prepare() : renvoie TOUJOURS un PDOStatement (objet)
		execute() : ECHEC : false
					SUCCES : Objet PDOStatement

=> Les requêtes préparées sont à préconiser si vous exécuter plusieurs fois la même requête et ainsi éviter de répéter le cycle (analyse/interprétation/exécution)
=> Les requêtes préparées sont souvent utilisées pour assainir les données (ex : prepare() / bindValue() / execute() )

exemple : pourquoi requêtes préparées :

	select * from employes; => 3cycles (analyse/interprétation/exécution)
	select * from employes; => 3cycles
	select * from employes; => 3cycles
	select * from employes; => 3cycles => 12 cycles

	prepare : $req = select * from employes; => 2cycles (analysée et interprétée)

		-> execute($req); 1cycle (exécution)
		-> execute($req); 1cycle
		-> execute($req); 1cycle
		-> execute($req); 1cycle => 6 cycles
*/

//-------------------------------------------------------------------
echo "<h2> Connexion à la BDD </h2>";

$pdo = new PDO("mysql:host=localhost;dbname=entrepriseCourSql", "root", "root", array( PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8" ) );

//pour les MAC, il faudra penser a préciser (ou pas) le serveur localhost:8080, 8888 et le mdp 'root'

//Ici, l'objet '$pdo' représente la connexion à la BDD 'entreprise'

var_dump( $pdo );

//Arguments de PDO:
//arg1 : serveur+BDD
//arg2 : identifiant
//arg3 : mdp
//arg4 : options (ici, la gestion/affichage des erreurs et encodage UTF8)

print '<pre>';
print_r( get_class_methods( $pdo ) );
//get_class_methods( $pdo ) : permet d'afficher la liste des méthodes disponible sur l'objet
print '</pre>';

//-------------------------------------------------------------------
//-------------------------------------------------------------------
echo "<h2> EXEC() / INSERT / UPDATE / DELETE </h2>";

//INSERTION :
// $resultat = $pdo->exec("

// 				INSERT INTO employes(prenom, nom, salaire, sexe, date_embauche, service)

// 							VALUES('jean', 'jacques', 1234, 'm', '2020-01-01', 'informatique')

// 			");
// //Ici, on fait une insertion dans la table 'employes pour les champs (prenom, nom, salaire...) AVEC les valeurs correspondant dans le bon ordre !!

// //On applique la méthode exec() VIA l'objet '$pdo' (qui représente la connexion à la BDD) pour intéragir avec la BDD, ici en faisant une requête d'insertion.

// echo "Nombre d'enregistrement affecté par la requête : $resultat <br>";

// echo "Dernier id généré : " . $pdo->lastInsertId() . '<br>';

//-------------------------------------------------------------------
//MODIFICATION :
$pdo->exec(" UPDATE employes SET salaire = 4444 WHERE id_employes = 991 ");

//Ici, je modifie la table 'employes' et plus précisément la colonne 'salaire' A CONDITION que dans la colonne 'id_employes' ce soit égal à 991

//-------------------------------------------------------------------
//SUPPRESSION :
$pdo->exec(" DELETE FROM employes WHERE id_employes = 991 ");
//Ici, je supprime dans la table 'employes', A CONDITION que dans la colonne 'id_employes' ce soit égal à 991

//RAPPEL : LES REQUETES DELETE SONT IRREVERSIBLES !! Pensez bien à la condition 'WHERE'

//-------------------------------------------------------------------
echo "<h2> QUERY() / SELECT / FETCH() </h2>";

$pdostatement = $pdo->query(" SELECT * FROM employes WHERE prenom = 'Julien' ");
//Ici, je sélectionne TOUTES (*) les informations provenant de la table 'employes' A CONDITION que dans la colonne 'prenom' ce soit égal à 'Julien'

var_dump($pdostatement); //Object PDOStatement

print '<pre>';
print_r( get_class_methods( $pdostatement ) );
print '</pre>';

//-------------------------------------
$julien = $pdostatement->fetch( PDO::FETCH_ASSOC );

//fetch() : permet de récupérer la ligne SUIVANTE d'un jeu de résultats ! Et donc de pouvoir exploiter les données qui sont retournées sous forme de tableaux associatifs

//Le parametre 'PDO::FETCH_ASSOC' de la méthode fetch() permet d'indéxer le tableau (retourner par le fetch) avec les champs de la table 'employes'

print '<pre>';
print_r( $julien );
print '</pre>';

echo "<p>Bonjour, je suis $julien[prenom] $julien[nom] du service $julien[service]. </p>";

//-------------------------------------------------------------------
echo "<h2> QUERY() / SELECT / FETCH() / WHILE() </h2>";

$pdostatement = $pdo->query(" SELECT * FROM employes ");
//Ici, je récupère toutes les infos de la table 'employes'
//var_dump($pdostatement);

echo "<p>Nombre d'employes : " . $pdostatement->rowCount() . "</p>";
//rowCount() : permet de compter le nombre de lignes de résultat retournées par la requête

while( $content = $pdostatement->fetch( PDO::FETCH_ASSOC ) ){
//TANT QU'il y a une ligne de résultat (retournée par le fetch, qui retourne la ligne SUIVANTE du jeu de résultat), on l'affiche

    // print '<pre>';
    // 	print_r( $content );
    // print '</pre>';

    echo "<p> $content[prenom] $content[nom] </p>";
}

//Ici, il y a UN SEUL array POUR CHAQUE enregistrement (par employé)

//Avec fetch() :
//Requête qui retourne plusieurs résultats => boucle
//Requête qui ne retourne QU'UN SEUL resultat => PAS DE BOUCLE
//Requête qui ne retourne UN résultat MAIS qui peut potentiellement en retourner plusieures => boucle

//-------------------------------------------------------------------------------
echo "<h2> QUERY() / SELECT / FETCHALL() / FOREACH() </h2>";

$pdostatement = $pdo->query(" SELECT * FROM employes ");
//var_dump( $pdostatement );

$donnees = $pdostatement->fetchAll( PDO::FETCH_ASSOC );
//fetchAll() : permet de retourner toutes les lignes de résultats ( retournées par ma requête) dans un seul tableau multidimentionnel

// print '<pre>';
// 	print_r( $donnees );
// print '</pre><hr>';

foreach( $donnees as $employes ){

    // print '<pre>';
    // 	print_r( $employes );
    // print '</pre>';

    echo "<p>";
    foreach( $employes as $valeur ){

        echo $valeur . '/';
    }
    echo "</p>";
}

//-------------------------------------------------------------------------------
echo "<h2> QUERY() / SELECT / FETCH() / WHILE() / affichage sous forme de tableau </h2>";

$result = $pdo->query(" SELECT * FROM employes ");
//var_dump( $result );

echo "<table border='2'>";
echo '<tr>';

$nombre_colonne = $result->columnCount();
//ColumnCount() : retourne le nombre de colonnes issues du jeu de résultats retourné par de la requête
//var_dump( $nombre_colonne );

for( $i = 0; $i < $nombre_colonne; $i++ ){

    $champ = $result->getColumnMeta( $i );

    // print '<pre>';
    // 	print_r( $champ );
    // print '</pre>';

    echo "<th> $champ[name] </th>";
}
echo '</tr>';



echo "</table>";

//-------------------------------------------------------------------------------
echo "<h2> QUERY() / SELECT / FETCH() / WHILE() / affichage sous forme de tableau </h2>";

$result = $pdo->query(" SELECT * FROM employes ");
//var_dump( $result );

echo "<table border='2'>";
echo '<tr>';

$nombre_colonne = $result->columnCount();
//ColumnCount() : retourne le nombre de colonnes issues du jeu de résultats retourné par de la requête
//var_dump( $nombre_colonne );

for( $i = 0; $i < $nombre_colonne; $i++ ){

    $champ = $result->getColumnMeta( $i );
    //getColumnMeta( int ) : retourne des informations sur les colonnes d'un jeu de résultat issue de la requête. Ici, nous souhaintons récupérer le titre de la colonne.

    // print '<pre>';
    // 	print_r( $champ );
    // print '</pre>';

    echo "<th> $champ[name] </th>";
}
echo '</tr>';

while( $ligne = $result->fetch( PDO::FETCH_ASSOC ) ){

    // print '<pre>';
    // 	print_r( $ligne );
    // print '</pre>';
    echo "<tr>";
    foreach( $ligne as $valeur ){

        echo "<td> $valeur </td>";
    }
    echo "</tr>";
}

//Version fetchAll()
// $contenu = $result->fetchAll( PDO::FETCH_ASSOC );

// print '<pre>';
// 	print_r( $contenu );
// print '</pre>';

// foreach( $contenu as $employe ){
// 	// print '<pre>';
// 	// 	print_r( $employe );
// 	// print '</pre>';
// 	echo "<tr>";
// 		foreach( $employe as $valeur ){

// 				echo "<td> $valeur </td>";
// 		}
// 	echo "</tr>";
// }

echo "</table>";

//-----------------------------------------------------------------------------
//EXERCICE : afficher tous les prenoms des employees (femmes) dans l'ordre alphabétique dans un liste ul/li :

$result = $pdo->query(" SELECT prenom FROM `employes` WHERE `sexe` = 'f' ORDER BY `prenom` ");

while( $ligne = $result->fetch( PDO::FETCH_ASSOC ) ){

    // print '<pre>';
    // 	print_r( $ligne );
    // print '</pre>';
    echo "<ul>";
    foreach( $ligne as $valeur ){

        echo "<li> $valeur </li>";
    }
    echo "</ul>";
}


/*correction

 * $pdostatement = $pdo->query(" SELECT prenom FROM employes WHERE sexe = 'f' ORDER BY prenom ASC ");

echo '<ul>';
while( $prenom = $pdostatement->fetch(PDO::FETCH_ASSOC) ){

    // print '<pre>';
    // 	print_r( $prenom );
    // print '</pre>';
    foreach( $prenom as $value ){

        echo "<li> $value </li>";
    }
}
echo '</ul>';*/

//-----------------------------------------------------------------------------
echo "<h2> prepare() / bindValue() / execute() </h2>";

//préparation de la requête :
$pdostatement = $pdo->prepare(" SELECT * FROM employes WHERE nom = :nom ");
//	:nom est un marqueur nominatif
//var_dump($pdostatement);

$nom = 'Desprez';

$pdostatement->bindValue(":nom", $nom, PDO::PARAM_STR);
//bindValue( arg1, arg2, arg3 ) : recoit une variable en jsutification d'un marqueur
//arg1 : marqueur nominatif (ici: :nom)
//arg2 : justification du marqueur (ici, $nom)
//arg3 : verification du paramètre attendu (ici, un STRING)

$pdostatement->execute(); //exécution de la requete préparée

$desprez = $pdostatement->fetch( PDO::FETCH_ASSOC );

print '<pre>';
print_r( $desprez );
print '</pre>';
