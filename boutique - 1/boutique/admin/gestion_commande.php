<?php require_once "../inc/header.inc.php"; ?>
<?php

//EXERCICE : créer la page gestion des commandes :
//restriction d'accès à la page admin :
if( !adminConnect() ){ //SI l'admn N'EST PAS connecté

	header('location:../connexion.php');
	exit;
}

//-------------------------------------------------
//Affichage des commandes (sous forme de tableau) prevoir un lien (sur l'id_commande) pour afficher le détail de la commande 
$r = execute_requete(" 
						SELECT c.*, m.pseudo, m.adresse, m.ville, m.cp

						FROM commande AS c, membre AS m 

						WHERE c.id_membre = m.id_membre
					");

$content .= "Nombre de commandes : " . $r->rowCount();

$content .= "<table border='1' cellpadding='8'>";
	$content .= "<tr>";

		for( $i = 0; $i < $r->columnCount(); $i++ ){

			$entete = $r->getColumnMeta( $i );
				//debug( $entete );

			$content .= "<th> $entete[name] </th>";
		}

	$content .= "</tr>";

	$chiffre_affaire = 0; //Initialisation d'une variable a zero

	while( $commande = $r->fetch( PDO::FETCH_ASSOC ) ){

		//debug( $commande );

		$chiffre_affaire += $commande['montant']; //Ici, je stocke à chaque tour de boucle le montant de la commande

		$content .= "<tr>";

			foreach( $commande as $indice => $valeur ){

				if( $indice == 'id_commande' ){

					$content .= "<td>
									<a href='?suivi=$valeur'>
										Voir la commande n° $valeur
									</a>
								</td>";
				}
				else{

					$content .= "<td> $valeur </td>";
				}
			}
		$content .= "</tr>";
	}
$content .= "</table>";

$content .= "<p>Le CA du site est de : $chiffre_affaire €</p>";

//-------------------------------------------------
//affichage du détail de la commande :
//debug( $_GET );

if( isset( $_GET['suivi'] ) ){ //Si il existe 'suivi' dans l'URL c'est que l'on a cliqué sur "voir la commande"


	$content .= "<h3>Voici le détails de la commande n° $_GET[suivi] </h3>";

	$r = execute_requete(" 
							SELECT  d.*, p.titre 

							FROM details_commande AS d, produit AS p

							WHERE d.id_produit = p.id_produit

							AND d.id_commande = $_GET[suivi]
	");

	$content .= "<table border='1' cellpadding='8'>";
		$content .= "<tr>";

			for( $i = 0; $i < $r->columnCount(); $i++ ){

				$entete = $r->getColumnMeta( $i );
					//debug( $entete );

				$content .= "<th> $entete[name] </th>";
			}

		$content .= "</tr>";

		while( $detail_commande = $r->fetch( PDO::FETCH_ASSOC ) ){

			//debug( $detail_commande );
			$content .= "<tr>";

				foreach( $detail_commande as $indice => $valeur ){

					$content .= "<td> $valeur </td>";

				}
			$content .= "</tr>";
		}
	$content .= "</table>";

}

?>

<h1>GESTION COMMANDES</h1>

<?= $content ?>

<?php require_once "../inc/footer.inc.php"; ?>
