<h1> Formulaire 3 </h1>

<a href="formulaire2.php">Retour vers le formulaire 2</a><hr>

<?php
//EXERCICE: Affichez les donnees issues du formulaire2.php et faites en sorte d'informer l'internaute que le prenom ET le mail sont obligatoires (donc dans le cas ou le champ est vide affiche un message d'erreur)

	//empty() : teste si c'est une variable est vide !

	//2 solutions :
		//message personnalise :   => les champs sont obligatoires
								// => le pseudo est obligatoire
								// => l'email est obligatoire

		//message global => "les champs sont obligatoires"

	//Bonus : la version ternaire !

print '<pre>';
    print_r( $_POST );
print '</pre>';

if( $_POST ){ //Si on a valide le formulaire 2

	//Ici, je stocke les valeurs renseignees par l'utilisateur dans des variables
	$pseudo =  $_POST['pseudo'];
	$email =  $_POST['email'];

	//Version message personnalise
	if( empty( $pseudo ) && empty( $email ) ){ //Si le pseudo ET l'email sont vides

		echo "<p style='color:red;'>Vous devez renseigner votre pseudo et votre email !</p>";
	}
	else if( empty( $pseudo ) ){ //SINON SI le pseudo est vide

		echo "<p style='color:red;'>Vous devez renseigner votre pseudo !</p>";
	}
	else if( empty( $email ) ){ //SINON SI l'email est vide

		echo "<p style='color:red;'>Vous devez renseigner votre email !</p>";
	}
	else{
		echo "<p style='color:green;'>Votre pseudo est $pseudo <br> Votre email est $email !</p>";
	}
	
	//version message general
	if( empty( $pseudo ) || empty( $email ) ){ //Si le pseudo OU l'email est vide

		echo "<p style='color:red;'>Veuillez renseigner les champs obligatoires!</p>";
	}
	else{
		echo "<p style='color:green;'>Votre pseudo est $pseudo <br> Votre email est $email !</p>";
	}

	//version ternaire :
	echo ( empty( $pseudo ) || empty( $email ) ) ? "<p style='color:red;'>Veuillez renseigner les champs obligatoires!</p>": "<p style='color:green;'>Votre pseudo est $pseudo <br> Votre email est $email !</p>";

}