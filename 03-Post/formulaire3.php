<h1> Formulaire 3 </h1>

<a href="formulaire2.php">Retour vers le formulaire 2</a><hr>

<?php
//EXERCICE: Affichez les données issues du formulaire2.php et faites en sorte d'informer l'internaute que le prenom ET le mail sont obligatoires (donc dans le cas où le champ est vide affiche un message d'erreur)

$pseudo = $_POST['pseudo'];
$email = $_POST['email'];


//empty() : teste si c'est une variable est vide !
//if(empty($pseudo)){
//    echo 'le champs pseudo est obligatoir <br>';
//}else{
//    echo 'votre pseudo est : ' . $pseudo . "<br>";
//}
//
//if(empty($email)){
//    echo 'le champs email est obligatoir <br>';
//}else{
//    echo 'votre mail est : ' . $email . "<br>";
//}


//2 solutions :
//message personnalisé :   => les champs sont obligatoires
// => le prenom est obligatoire
// => l'email est obligatoire

//message global => "les champs sont obligatoires"

//Bonus : la version ternaire !
echo $prenom = empty($pseudo) ?  "le champs pseudo est obligatoir <br>" : "votre pseudo est : "  . $pseudo . "<br>";
echo $email = empty($email)  ?  "le champs email est obligatoir <br>" : "votre mail est : "  . $email . "<br>";
echo $email = empty($email)  && empty($pseudo)  ?  "le champs sont obligatoir <br>" : "votre pseudo est : "  . $pseudo . "<br>votre mail est : "  . $email . "<br>";

print '<pre>';
print_r( $_POST );
print '</pre>';

