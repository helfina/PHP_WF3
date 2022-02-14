<!-- On peut écrire du HTML dans un fichier avec l'extension .php MAIS L'INVERSE N'EST PAS POSSIBLE -->
<style>
    h1 {
        text-align: center;
    }

    h2 {
        color: orange;
        background: black;
        text-align: center;
    }
</style>

<h1>Cours PHP</h1>

<h2>Ecriture et affichage</h2>

<?php //Balise ouvrante d'un passage php

//Ici, on ouvre passage php pour y faire des traitements php

/*
    Commentaires
    sur plusieurs
    lignes
*/

// CHAQUE INSTRUCTION DOIT SE TERMINER PAR UN POINT VIRGULE

?>
<!-- balise fermante -->

<?php //ouverture d'un nouveau passage PHP

echo "Bonjour tout le monde"; //echo est une instruction qui permet de faire un affichage

print '<br><strong> Salut </strong>'; //print est aussi une instruction pour faire un affichage (mais qui est un peu plus long que le 'echo')

//On peut y mettre des balises html qui seront interpretees par le navigateur

?>

<?php echo "<p class='rouge'> Hello </p>"; //affichage  ?>

<p class="test"> <?php echo "Du texte"; ?> </p>
<!-- Affichage php a l'interieur de balise -->

<?= "affichage avec le = sur la balise ouvrante php<br>";
//Ici, le '<?=' remplace le '<?php echo', qui sert la aussi a faire un affichage
?>

<h2>Les variables : types, declaration, affectation</h2>

<?php
//Une variable : est un espace nomme qui permet de conserver une ou plusieurs valeurs

//Declaration d'une variable avec le symbole '$'
//Par convention, on ne doit pas nommer notre variable en commencant par un underscore (tiret du 8) OU un chiffre qui ne sera pas possible ET NE PAS l'ecrire en MAJUSUCLE

$a = 345; //Declaration d'une variable nommee "a" et on lui a affecte la valeur 345, ecrit SANS quotes/guillemets car c'est un nombre

echo $a; //affichage de la variable $a

echo "<br>" . gettype($a) . "<br>"; //integer (nombre entier)
//gettype( $arg ) : fonction interne de php qui permet de connaitre le type d'une variable passee argument

//-----------------------------------------------
$a = "Bonjour tout le monde"; //Ici, on reaffecte la valeur de la variable $a. J'ecrase '345' et remplace par la phrase "Bonjour tout le monde"

echo $a;
echo "<br>" . gettype($a) . "<br>"; //string (=chaine de caracteres)

//-----------------------------------------------
$a = "45"; //reaffectation avec un nombre AVEC quotes

echo $a;
echo "<br>" . gettype($a) . "<br>"; //string (=chaine de caracteres)

//-----------------------------------------------
$a = 1.23; //reaffectation avec un nombre a virgule qui s'ecrire avec le symbole point et non aps la virgule...

echo $a;
echo "<br>" . gettype($a) . "<br>"; //double (=nombre a virgule)

//-----------------------------------------------
$a = true; //reaffectation avec un boolean (true ou false)

echo $a;
echo "<br>" . gettype($a) . "<br>"; //boolean

//------------------------------------------------------------------------
echo "<h2> La concatenation </h2>";
//On concatene des chaines de caracteres avec des variables et/ou des fonctions PHP AVEC le symbole point '.' :

$x = 'Bonjour';
$y = 'le monde';

echo $x . ' tout ' . $y . '<br>';

//-------------------------------------------
//Les doubles quotes (guillemets) permettent d'interpreter les variables ALORS que les quotes simples (apostrophes) N'INTERPRETENT PAS les variables et renverra donc une chaine de caracteres

echo 'Avec les quotes simples : $x $y <br>'; // ici, affiche : $x $y
// => QUOTES SIMPLES : les variables NE SONT PAS INTERPETEES

echo "Avec les quotes doubles : $x $y <br>"; // ici, affiche : Bonjour tout le monde
// => QUOTES DOUBLES : les variables SONT INTERPETEES

//-------------------------------------------
echo "<h2> Concatenation lors de l'affectation </h2>";

$prenom = 'marco'; //Declaration d'une vraiable nommee 'prenom' ou on lui affecte la valeur 'marco
echo $prenom . '<br>'; //affichage 'marco'

$prenom = 'polo'; //Reaffectation (ecrase remplace)
echo $prenom . '<br>'; //affichage 'polo'

//---------------------------
$pseudo = "Anne";
echo $pseudo . "<br>"; //Affiche 'Anne'

$pseudo .= "-Marie"; //Affectaion de la valeur '-Marie' dans la variable '$pseudo' MAIS cela s'ajoute SANS REMPLACER la velur precedente grace a l'operateur '.=' ;
echo $pseudo . '<br>';

//--------------------------------------------------------------------------
//EXERCICE : Affichez : 'bleu - blanc - rouge' (AVEC les tirets) en mettant chaque couleur dans une variable :

$a = "bleu";
$b = "blanc";
$c = "rouge";

echo " $a - $b - $c <br>";
echo $a . " - " . $b . " - " . $c . '<br>';

$couleur = "Bleu";
$couleur .= " - blanc";
$couleur .= ' - rouge';

echo $couleur . '<br>';

//--------------------------------------------------------------------
echo "<h2> Les constantes et les constantes magiques </h2>";
//Une constante : est un espace nomme qui permet de conserer une valeur SAUF QUE, ici comme son nom l'indique la valeur sera contante !

define('CAPITALE', 'Paris'); //Par CONVENTION, on nommera une constante TOUJORUS EN MAJUSUCLE

//define( arg1, arg2 )
// arg1 : le nom de la constante (MAJUSUCLE)
// arg2 : la valeur de la constante

echo CAPITALE . '<br>';

//define( 'CAPITALE', 'Moscou' ); //ERROR , la constante a deja ete declaree

//------------------------------------------------------
//Constantes magiques : constantes internes de php

echo __LINE__ . '<br>'; //Affiche le numero de la ligne courante (ici : 155)
echo __FILE__ . '<br>'; //Affiche le chemin complet du fichier courant
echo __DIR__ . '<br>'; //Affiche le chemin complet du dossier courant

//--------------------------------------------------------------------
echo "<h2> Les operateurs arithmetiques </h2>";

$a = 10;
$b = 2;

echo $a + $b . '<br>'; // 12
echo $a - $b . '<br>'; // 8
echo $a / $b . '<br>'; // 5
echo $a * $b . '<br>'; // 20
echo $a % $b . '<hr>'; // 0

//Operation et affectation :
$a += $b; //equivaut $a = $a + $b
echo $a . '<br>'; //12

$a -= $b; //equivaut $a = $a - $b
echo $a . '<br>'; // 10

$a /= $b; //equivaut $a = $a + $b
echo $a . '<br>'; // 5

$a *= $b; //equivaut $a = $a + $b
echo $a . '<br>'; // 10

//--------------------------------------------------------------------
echo "<h2> Structures conditionnelles (if/else) </h2>";

//isset() et empty() : 2 fonctions internes de PHP

//isset() : teste si ca existe (si c'est defini), la fonction renverra true ou false

//empty() : teste si c'est vide (0 ou non defini), la fonction renverra true ou false

$vara = 0;
$varb = "";

if (empty($vara)) { //Si la variable $vara est vide, 0 ou non definie, alors la fonction empty() renverra true et donc on execute le code entre les accolades

    echo "Vara : 0, vide ou non definie <br>";
}

if (isset($varb)) { //Si la variable $varb existe,alors la fonction isset() renverra true et donc on execute le code entre les accolades

    echo "Varb : existe et est definie par rien.. <br>";
}

//---------------------------------------------------
//IF / ELSEIF / ELSE

$a = 10;
$b = 5;
$c = 2;

if ($a > $b) { // Si $a (10) est superieur a $b (5) alors , on execute le code entre les accolades

    echo "A est superieur a B <br>";
} else { //SINON... (cas par defaut)

    echo "FAUX : A N'EST PAS superieur a B <br>";
}

//----------------------------------------------
//ET : &&
if ($a > $b && $b < $c) { //SI $a (10) est superieur a $b (5) - ET QUE - $b (5) est superieur a $c (2) alors on execute le code entre les accolades

    echo "Ok pour les deux comparaisons <br>";
}

//-----------------------------------------------
//OU et || (PC :AltGr+6 | MAC : Alt+MAJ+L)
if ($a == 9 || $b > $c) { //SI $a (10) est egal a 9 - OU QUE - $b (5) est superieur a $c (2), alors on execute le code entre les accolades

    echo "Ok pour au moins une des deux conditions <br>";
}

//------------------------------------------------
if ($a == 8) { //SI $a (10) est egal a 8

    echo "A est egal a 8 <br>";
} else if ($a != 10) { //SINON SI $a (10) est different de 10

    echo "A est different de 10 <br>";
} else { //SINON (cas par defaut)

    echo "Tout est faux !<br>";
}

//--------------------------------------------------
//Version ternaire : forme contractee d'une condition if/else

if ($a == 10) {

    echo "A est egal a 10<br>";
} else {

    echo "Faux <br>";
}

echo ($a == 10) ? "A est egal a 10 <br>" : "Faux <br>";
//ICI, le "?" remplace le "if" et les deux points ":" remplacent le "else"

//-----------------------------------------------
//Comparaison :
$vara = 1;  //integer
echo '$vara est de type : ' . gettype($vara) . "<br>";

$varb = "1"; //String
echo '$varb est de type : ' . gettype($varb) . "<br>";

if ($vara == $varb) { //true

    echo "Il s'agit de la meme chose car la valeur est la meme<br>";
}

//-----------------------------------------
if ($vara === $varb) { //false

    echo "Il s'agit de la meme chose car la valeur est la meme<br>";
} else {

    echo "L'egalite est fausse puisque le type est differente alors que la valeur est la meme <br>";
}

/*
Avec le '===', le test ne fonctionne pas car les types des variables sont differents. L'un est un entier (INT) et l'autre est une chaine (STRING) donc ce n'est pas strictement egal !

	'='		: affectation
	'=='	: comparaison en valeur
	'==='	: comparaison en valeur ET en type

Les operateurs : Pour tester les variables, on peut utiliser TOUS les operateurs de comparaison !

	- egalite : '==' renvoie TRUE si les operandes sont egales
	- different de : '!=' renvoie TRUE si les operandes NE SONT PAS EGALES
	- strictement egal : '===' renvoie TRUE si les operandes sont EGALES ET DU MEME TYPE
	- strictement different : '!==' renvoie TRUE si les operandes NE SONT PAS EGALES OU NE SONT PAS DU MEME TYPE
	- plus grand que : '>'
	- plus grand ou egal a : '>='
	- plus petit que : '<'
	- plus petit ou egal a : '<='

Les instructions dans la condition renvoient toujours TRUE ou FALSE et les instructions de la condition ne seront executees QUE si la valeur renvoie TRUE !
*/

//--------------------------------------------------------------------
echo "<h2> Conditions SWITCH </h2>";

$couleur = "orange";

switch ($couleur) { //Ici, on compare la variable $couleur aux differents cas du switch
    case 'vert' :
        echo "J'aime le vert <br>";
        break;
    case 'rouge':
        echo "J'aime le rouge <br>";
        break;
    case 'bleu':
        echo "J'aime le bleu <br>";
        break;
    default : //Cas par defaut si on ne rentre dans les cas precedents
        echo "J'aime pas la couleur <br>";
}

//EXERCICE : retranscrire le switch ci-dessus en condition if/else OU avec l'operateur (||) OU la version ternaire OU la ternaire avec le ||
if ($couleur == 'vert') {

    echo "J'aime le vert <br>";
} else if ($couleur == 'rouge') {

    echo "J'aime le rouge <br>";
} else if ($couleur == 'bleu') {

    echo "J'aime le bleu <br>";
} else {
    echo "J'aime pas la couleur<br>";
}

//Version courte :
if ($couleur == 'rouge' || $couleur == 'bleu' || $couleur == 'vert') {

    echo "J'aime le $couleur <br>";
} else {
    echo "J'aime pas la couleur<br>";
}

//Version ternaire 'courte' :

echo ($couleur == 'rouge' || $couleur == 'bleu' || $couleur == 'vert') ? "J'aime le $couleur <br>" : "J'aime pas la couleur<br>";

//Version ternaire 'longue' :
echo ($couleur == 'vert') ? "J'aime le vert <br>" :
    (($couleur == 'rouge') ? "J'aime le rouge <br>" :
        (($couleur == 'bleu') ? "J'aime le bleu <br>" : "J'aime pas la couleur<br>"));


//--------------------------------------------------------------------------------------------
echo "<h2> FOnctions predefinies</h2>";

//https://www.php.net/manual/fr/datetime.format.php

echo "Date : " . date("d:m:Y") . "<br>";
echo "Date : " . date("d/m/Y") . "<br>";

$email = 'jeremie@webforce3.com';
echo strpos($email, "@") . '<br>';

// https://www.php.net/manual/fr/function.strpos.php
//strpos( arg1 , arg2 ); Indique la position d'un caractere dans une chaine
//arg1 : la chaine a parcourir
//arg2 : ce quel'on recherche

//ATTENTION, ici, la fonction affiche 7 car on commence a compter a partir de ZERO !!

$phrase = "Voici une phrase";

echo strlen($phrase) . '<br>';
//strlen( arg ) : retourne la taille de la chaine de caracteres passee en argument

$texte = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio, in aliquid. Consequuntur sunt ab, accusamus nemo ad quis at eum dolor perferendis facere porro ipsum fugit harum quasi tempore saepe.";

echo substr($texte, 0, 20) . "...<a href='#'>Lire la suite</a> <br>";
//substr( arg1, arg2, arg3 ): permet de retourne une partie de la chaine
//arg1 : la chaine que l'on souhaite couper
//arg2 : la position de depart (ou on commence) ici, on commence a la position ZERO qui correspond a la premiere lettre
//arg3 : la longueur de la decoupe

//--------------------------------------------------------------------
echo "<h2> Fonctions utilisateurs </h2>";

function separation()
{ //Declaration d'une fonction nommee 'separation' prevue pour ne pas recevoir d'argument car les parentheses OBLIGATOIRES sont vides

    echo "<hr><hr>";
}

separation(); //Appel et execution de la fonction TOUJOURS AVEC LES PARENTHESES

//----------------------------------------------
function bonjour($qui)
{ //Fonction prevue pour recevoir UN argument, ici '$qui'

    return "Bonjour " . $qui . "<br>";
}

echo bonjour("Martine"); //Appel et execution de la fonction

//Si la fonction est prevue pour recevoir un argument ALORS il faut OBLIGATOIREMENT lui envoyer un argument en parametre sinon on aura une error fatal.

//Quand il y a un "return" dans une fonction, il faudra faire un "echo" de la fonction pour avoir un affichage;

//----------------------------------------------

function semaine()
{

    // echo "Test <hr>"; //S'affiche 'normalement'

    $jour = "lundi"; //Variable LOCALE

    return $jour; //La fonction va retourner "quelquechose" (ici, la vairble $jour) ET A CE MOMENT PRECIS, lorsque l'interpreteur PHP lit l'instruction "return", on quitte la fonction

    echo "Second test <br>"; //Cette ligne de code ne fonctionnera pas car il y a un "return" AVANT et donc elle n'est ps interpretee car nous avons deja quitte la fonction
}

echo semaine() . '<br>'; //Appel et execution de la fonction

echo $jour . '<br>'; //ERROR 'undefined', car la variable n'est pas definie dans l'espace globale MAIS uniquement dans le scope (espace local) de la fonction


//----------------------------------------------
$pays = "France"; //Declaration d'une variable dans l'espace global

function affichePays()
{

    global $pays; //le mot cle "global" permet de rappatrier un element declare dans l'espace global a l'interieur d'un espace local

    //$pays = 'Maroc'; //Ok, la ligne ci-dessus fonctionne si on declare la variable dans l'espace local.

    echo $pays . '<br>';
}

affichePays(); //appel et execution de la fonction

//---------------------------------------------------------
//EXERCICE : Creer une fonction TVA qui attendra DEUX arguments (chiffre et taux) afin que l'on puisse afficher et calculer le nouveau prix :
//Bonus : mettre un taux par defaut (1.2)


/*function tva(int $chiffre, $taux)
{
    $taux = 1.2;
    $calcul = $chiffre * $taux;
    return $calcul;
}

echo tva(100,1.2);*/

//correction EXERCICE : Creer une fonction TVA qui attendra DEUX arguments (chiffre et taux) afin que l'on puisse afficher et calculer le nouveau prix :
//Bonus : mettre un taux par defaut (1.2)

function TVA($chiffre, $taux = 1.2)
{

    return "La tva : " . $chiffre * $taux . '<br>';
}

echo TVA(2000, 1.5); //Appel et execution de la fonction avec les DEUX ARGUMENTS PREVUS

echo TVA(1000); //Appel et execution de la fonction AVEC UN SEUL ARGUMENT, du coup, le second argument prendra la valeur par defaut 1.2 que l'on a precise en aprametre de la fonction

//---------------------------------------------------------
//EXERCICE : Creer une fonction meteo avec 2 arguments (temperature et la saison) qui permet d'afficher la phrase suivante :

//"Nous sommes en saison et il fait temperature degres <br>"

//Exercice : Gerer l'article 'au' SI la saison est 'printemps' et gerer le 's' de degre SI on est au dessus (2°) OU en dessous en (-2°)

function meteo($temperature, $saison)
{

    $temperature >= 2 || $temperature <= -2 ? $s = 's ' : $s = '';

    $saison == 'printemps' ? $debutPhrase = "Nous sommes au " : $debutPhrase = 'Nous sommes en ';

    return $debutPhrase . $saison . " et il fait " . $temperature . " degre" . $s . "<br>";

}

echo meteo(-1, 'hiver') . "<br>";
echo meteo(3, 'automne') . "<br>";
echo meteo(12, 'printemps') . "<br>";
echo meteo(25, 'ete') . "<br>";

//-----------------------------------------------------
//Exercice : creer une fonction rouler qui attend 3 arguments (vehicule, vitesse et la limitation) qui permet d'afficher :

//"Je roule en vehicule a vitesse km/h sur une route limitee à limitation km/h."

//SUITE EXERCICE :

//Si le vehicule est different de velo, moto, camion et voiture, j'affiche :
//"T'as rien a faire sur une route"

//Si la vitesse est superieure à la limitation alors j'affiche :
//"je suis en infraction et je perd 1 pt"

//si la limitation est superieur a 40km/h, j'affiche :
//"je perds mon permis."

//si je respecte la limitation j'affiche la phrase :
//"Je roule en vehicule a vitesse km/h sur une route limitee à limitation km/h."

function rouler(string $vehicule, int $vitesse, int $limitation)
{

    $phrase = "Je roule en " . $vehicule . " a " . $vitesse . " km/h sur une route limitee à " . $limitation . " km/h.";

    ($vehicule != "vélo" && $vehicule != 'moto' && $vehicule != 'camion' && $vehicule != 'voiture') ? $phrase = "T'as rien a faire sur une route" : $phrase;

    $limitation > ($limitation + 40) ? $phrase = "je perds mon permis." : $phrase;

    $vitesse > $limitation ? $phrase = "je suis en infraction et je perd 1 pt" : $phrase;

    return $phrase;
}

echo rouler('pietons', 5, 40) . "<br><hr><br>";
echo rouler('camion', 35, 40) . "<br><hr><br>";
echo rouler('vélo', 40, 60) . "<br><hr><br>";
echo rouler('moto', 150, 90) . "<br><hr><br>";
echo rouler('avion', 400, 60) . "<br><hr><br>";
echo rouler('voiture', 80, 90) . "<br><hr><br>";


/*soluce Nuno test
function rouler2($vehicule, $vitesse, $limitation)
{
    echo "Je roule en $vehicule a $vitesse km/h sur une route limitee à $limitation km/h. <br>";

    if ($vehicule != "velo" && $vehicule != "moto" && $vehicule != "camion" && $vehicule != "voiture") {
        echo "T'as rien a faire sur une route.";
    } elseif ($vitesse > 40) {
        echo "je perds mon permis.";
    } elseif ($vitesse > $limitation) {
        echo "je suis en infraction et je perd 1 pt";
    } elseif ($vitesse < $limitation) {
        echo "Je roule en $vehicule a $vitesse km/h sur une route limitee à $limitation km/h. <br>";
    }
}

echo rouler2("velo", 41, 30);

*/

//--------------------------------------------------------------------
echo "<h2> Le structures iteratives : les boucles </h2>";
//Une boucle : permet de repeter une portion TANT qu'une condition est realisee.

//Boucle WHILE :
$i = 0;

while( $i < 5 ){ //TANT QUE $i est inferieur a 5, alors on execute le code entre les accolades

    echo " $i => ";

    $i++; //$i = $i + 1
}

echo "<hr>";
//  Faites en sortes, via une boucle while, d'enlever la fleche "a la fin" , c'est a dire apres le 4
//Resultat attendu : 0 => 1 => 2 => 3 => 4

$a = 0;
while( $a < 5 ){

    if ($a < 4 ){
        echo " $a => ";
    }else{

        echo " $a ";
    }
    $a++; //$i = $i + 1

}

echo "<hr>";



//  corection Faites en sortes, via une boucle while, d'enlever la fleche "a la fin" , c'est a dire apres le 4
//Resultat attendu : 0 => 1 => 2 => 3 => 4

$i = 0; //Réinitilisation a zero, car avec la boucle précédente $i vaut 5 !

while( $i < 5 ){ //TANT QUE $i est inferieur a 5, alors on execute le code entre les accolades

    if(  $i == 4 ){ //Si la valeur de $i est egal à 4 , alors on affiche uniquement la valeur de $i sans la fleche

        echo $i;
    }
    else{

        echo " $i ===> ";
    }
    //echo ( $i == 4 ) ? $i : "$i ==>";

    $i++; //$i = $i + 1
}
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";