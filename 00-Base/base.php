<!-- On peut écrire du HTML dans un fichier avec l'extension .php MAIS L'INVERSE N'EST PAS POSSIBLE -->
<style>
    h1{text-align:center;}
    h2{
        color:orange;
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

echo "<br>" . gettype( $a ) . "<br>"; //integer (nombre entier)
//gettype( $arg ) : fonction interne de php qui permet de connaitre le type d'une variable passee argument

//-----------------------------------------------
$a = "Bonjour tout le monde"; //Ici, on reaffecte la valeur de la variable $a. J'ecrase '345' et remplace par la phrase "Bonjour tout le monde"

echo $a;
echo "<br>" . gettype( $a ) . "<br>"; //string (=chaine de caracteres)

//-----------------------------------------------
$a = "45"; //reaffectation avec un nombre AVEC quotes

echo $a;
echo "<br>" . gettype( $a ) . "<br>"; //string (=chaine de caracteres)

//-----------------------------------------------
$a = 1.23; //reaffectation avec un nombre a virgule qui s'ecrire avec le symbole point et non aps la virgule...

echo $a;
echo "<br>" . gettype( $a ) . "<br>"; //double (=nombre a virgule)

//-----------------------------------------------
$a = true; //reaffectation avec un boolean (true ou false)

echo $a;
echo "<br>" . gettype( $a ) . "<br>"; //boolean

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
echo $a . " - " . $b . " - ".  $c . '<br>';

$couleur = "Bleu";
$couleur .= " - blanc";
$couleur .= ' - rouge';

echo $couleur . '<br>';

//--------------------------------------------------------------------
echo "<h2> Les constantes et les constantes magiques </h2>";
//Une constante : est un espace nomme qui permet de conserer une valeur SAUF QUE, ici comme son nom l'indique la valeur sera contante !

define( 'CAPITALE', 'Paris' ); //Par CONVENTION, on nommera une constante TOUJORUS EN MAJUSUCLE

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

if( empty( $vara ) ){ //Si la variable $vara est vide, 0 ou non definie, alors la fonction empty() renverra true et donc on execute le code entre les accolades

    echo "Vara : 0, vide ou non definie <br>";
}

if( isset( $varb ) ){ //Si la variable $varb existe,alors la fonction isset() renverra true et donc on execute le code entre les accolades

    echo "Varb : existe et est definie par rien.. <br>";
}

//---------------------------------------------------
//IF / ELSEIF / ELSE

$a = 10;
$b = 5;
$c = 2;

if( $a > $b ){ // Si $a (10) est superieur a $b (5) alors , on execute le code entre les accolades

    echo "A est superieur a B <br>";
}
else{ //SINON... (cas par defaut)

    echo "FAUX : A N'EST PAS superieur a B <br>";
}

//----------------------------------------------
//ET : &&
if( $a > $b && $b < $c ){ //SI $a (10) est superieur a $b (5) - ET QUE - $b (5) est superieur a $c (2) alors on execute le code entre les accolades

    echo "Ok pour les deux comparaisons <br>";
}

//-----------------------------------------------
//OU et || (PC :AltGr+6 | MAC : Alt+MAJ+L)
if( $a == 9 || $b > $c ){ //SI $a (10) est egal a 9 - OU QUE - $b (5) est superieur a $c (2), alors on execute le code entre les accolades

    echo "Ok pour au moins une des deux conditions <br>";
}

//------------------------------------------------
if( $a == 8 ){ //SI $a (10) est egal a 8

    echo "A est egal a 8 <br>";
}
else if( $a != 10 ){ //SINON SI $a (10) est different de 10

    echo "A est different de 10 <br>";
}
else{ //SINON (cas par defaut)

    echo "Tout est faux !<br>";
}

//--------------------------------------------------
//Version ternaire : forme contractee d'une condition if/else

if( $a == 10 ){

    echo "A est egal a 10<br>";
}
else{

    echo "Faux <br>";
}

echo ( $a == 10 ) ? "A est egal a 10 <br>" : "Faux <br>";
//ICI, le "?" remplace le "if" et les deux points ":" remplacent le "else"

//-----------------------------------------------
//Comparaison :
$vara = 1;  //integer
echo '$vara est de type : ' . gettype( $vara ) . "<br>";

$varb = "1"; //String
echo '$varb est de type : ' . gettype( $varb ) . "<br>";

if( $vara == $varb ){ //true

    echo "Il s'agit de la meme chose car la valeur est la meme<br>";
}

//-----------------------------------------
if( $vara === $varb ){ //false

    echo "Il s'agit de la meme chose car la valeur est la meme<br>";
}
else{

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

switch( $couleur ){ //Ici, on compare la variable $couleur aux differents cas du switch
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
if( $couleur == 'vert' ){

    echo "J'aime le vert <br>";
}
else if( $couleur == 'rouge' ){

    echo "J'aime le rouge <br>";
}
else if( $couleur == 'bleu' ){

    echo "J'aime le bleu <br>";
}
else{
    echo "J'aime pas la couleur<br>";
}

//Version courte :
if( $couleur == 'rouge' || $couleur == 'bleu' || $couleur == 'vert' ){

    echo "J'aime le $couleur <br>";
}
else{
    echo "J'aime pas la couleur<br>";
}

//Version ternaire 'courte' :

echo ( $couleur == 'rouge' || $couleur == 'bleu' || $couleur == 'vert' ) ? "J'aime le $couleur <br>" : "J'aime pas la couleur<br>";

//Version ternaire 'longue' :
echo ( $couleur == 'vert') ? "J'aime le vert <br>" :
    ( ( $couleur == 'rouge' ) ? "J'aime le rouge <br>" :
        ( ( $couleur == 'bleu' ) ? "J'aime le bleu <br>" : "J'aime pas la couleur<br>" ) );





































echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";