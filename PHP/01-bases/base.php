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

$pseudo .= "-Marie"; //Affectation de la valeur '-Marie' dans la variable '$pseudo' MAIS cela s'ajoute SANS REMPLACER la velur precedente grace a l'operateur '.=' ;
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

$a /= $b; //equivaut $a = $a / $b
echo $a . '<br>'; // 5

$a *= $b; //equivaut $a = $a* $b
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

//--------------------------------------------------------------------
echo "<h2> Fonctions predefinies </h2>";

echo "Date : ". date("d/m/Y") . "<br>";

$email = 'jeremie@webforce3.com';

echo strpos( $email, "@" ) . '<br>';
//strpos( arg1 , arg2 ); Indique la position d'un caractere dans une chaine
    //arg1 : la chaine a parcourir
    //arg2 : ce quel'on recherche
     
//ATTENTION, ici, la fonction affiche 7 car on commence a compter a partir de ZERO !!

$phrase = "Voici une phrase";

echo strlen( $phrase ) . '<br>'; 
//strlen( arg ) : retourne la taille de la chaine de caracteres passee en argument 

$texte = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio, in aliquid. Consequuntur sunt ab, accusamus nemo ad quis at eum dolor perferendis facere porro ipsum fugit harum quasi tempore saepe.";

echo substr( $texte, 0, 20 ) . "...<a href='#'>Lire la suite</a> <br>" ;
//substr( arg1, arg2, arg3 ): permet de retourne une partie de la chaine
    //arg1 : la chaine que l'on souhaite couper
    //arg2 : la position de depart (ou on commence) ici, on commence a la position ZERO qui correspond a la premiere lettre
    //arg3 : la longueur de la decoupe

//--------------------------------------------------------------------
echo "<h2> Fonctions utilisateurs </h2>";

function separation(){ //Declaration d'une fonction nommee 'separation' prevue pour ne pas recevoir d'argument car les parentheses OBLIGATOIRES sont vides

    echo "<hr><hr>";
}

separation(); //Appel et execution de la fonction TOUJOURS AVEC LES PARENTHESES

//----------------------------------------------
function bonjour( $qui ){ //Fonction prevue pour recevoir UN argument, ici '$qui'

    return "Bonjour " . $qui . "<br>";
}

echo bonjour( "Martine" ); //Appel et execution de la fonction

//Si la fonction est prevue pour recevoir un argument ALORS il faut OBLIGATOIREMENT lui envoyer un argument en parametre sinon on aura une error fatal.

//Quand il y a un "return" dans une fonction, il faudra faire un "echo" de la fonction pour avoir un affichage;

//----------------------------------------------
function semaine(){

    // echo "Test <hr>"; //S'affiche 'normalement'

    $jour = "lundi"; //Variable LOCALE

    return $jour; //La fonction va retourner "quelquechose" (ici, la vairble $jour) ET A CE MOMENT PRECIS, lorsque l'interpreteur PHP lit l'instruction "return", on quitte la fonction

    echo "Second test <br>"; //Cette ligne de code ne fonctionnera pas car il y a un "return" AVANT et donc elle n'est ps interpretee car nous avons deja quitte la fonction
}

echo semaine() .'<br>'; //Appel et execution de la fonction

//echo $jour . '<br>'; //ERROR 'undefined', car la variable n'est pas definie dans l'espace globale MAIS uniquement dans le scope (espace local) de la fonction

//----------------------------------------------
$pays = "France"; //Declaration d'une variable dans l'espace global 

function affichePays(){

    global $pays; //le mot cle "global" permet de rappatrier un element declare dans l'espace global a l'interieur d'un espace local
    
    //$pays = 'Maroc'; //Ok, la ligne ci-dessus fonctionne si on declare la variable dans l'espace local.

    echo $pays . '<br>';
}

affichePays(); //appel et execution de la fonction

//---------------------------------------------------------
//EXERCICE : Creer une fonction TVA qui attendra DEUX arguments (chiffre et taux) afin que l'on puisse afficher et calculer le nouveau prix : 
    //Bonus : mettre un taux par defaut (1.2)

    function TVA( $chiffre, $taux = 1.2 ){

        return "La tva : ". $chiffre * $taux . '<br>';
    }

    echo TVA( 2000, 1.5 ); //Appel et execution de la fonction avec les DEUX ARGUMENTS PREVUS

    echo TVA( 1000 ); //Appel et execution de la fonction AVEC UN SEUL ARGUMENT, du coup, le second argument prendra la valeur par defaut 1.2 que l'on a precise en parametre de la fonction

//---------------------------------------------------------
//EXERCICE : Creer une fonction meteo avec 2 arguments (temperature et la saison) qui permet d'afficher la phrase suivante :

    //"Nous sommes en saison et il fait temperature degres <br>"

    //Exercice : Gerer l'article 'au' SI la saison est 'printemps' et gerer le 's' de degre SI on est au dessus (2°) OU en dessous en (-2°)

function meteo( $temperature, $saison ){

    if( $saison == 'printemps' ){ //Si le parametre 'saison' est egal a printemps, alors on crée une variable avec la valeur 'au'

        $article = ' au ';
    }
    else{ //SINON, c'est que c'est "été, 'automne' ou 'hiver' et donc on crée cette même variable ave la valeur 'en'

        $article = ' en ';
    }

    //version ternaire :
    //$article = ( $saison == 'printemps' ) ? ' au ' : ' en ';

    if( $temperature >= 2 || $temperature <= -2 ){ //SI la temperature est supérieur ou égale à 2 - OU QUE - la temperature est inférieur oué gale à -2 alors on crée une variable aevc la valeur de "degrés" (avec un 's')

        $deg = ' degrés';
    }
    else{ //SINON, c'est que l'on se trouve dans l'interval ]-2° : 2°[ et donc on déclare cette meme variable avec la valeur "degré" (sans 's')

        $deg = " degré";
    }
    //version ternaire :
    //$deg = ( $temperature >= 2 || $temperature <= -2 ) ? " degrés" : "degré";



    echo "Nous sommes $article $saison et il fait $temperature $deg <br>";    
}

meteo( 12, 'hiver');
meteo( 1, 'printemps');
meteo( -1.5, 'automne');
meteo( -11.5, 'printemps');
meteo( 35, 'ete');
   
echo "<hr>";
function manu($temperature, $saison){

    if (($saison == 'hiver' || $saison == 'ete' || $saison == 'automne') && ($temperature >= 2 || $temperature <= -2)){

        echo "Nous sommes en $saison et il fait $temperature degrés. <br>";

    } elseif(($saison == 'hiver' || $saison == 'ete' || $saison == 'automne') && ($temperature == 1 || $temperature == -1)){

        echo "Nous sommes en $saison et il fait $temperature degré. <br>";

    } elseif($saison == 'printemps'  && ($temperature == 1 || $temperature == -1)){

        echo "Nous sommes au $saison et il fait $temperature degré. <br>";

    } else {

        echo "Nous sommes au $saison et il fait $temperature degrés. <br>";
    }
}
manu( 12, "ete" );
manu( -2, "hiver" );
manu( 1, "printemps" );
manu( 56, "printemps" );
manu( -1, "automne" );
echo '<hr>';

//-----------------------------------------------------
//Exercice : creer une fonction rouler qui attend 3 arguments (vehicule, vitesse et la limitation) qui permet d'afficher : 

//"Je roule en vehicule a vitesse km/h sur une route limitee à limitation km/h."

//SUITE EXERCICE :

	//Si le vehicule est different de velo, moto, camion et voiture, j'affiche :
        //"T'as rien a faire sur une route"

    //Si la vitesse est superieure à la limitation alors j'affiche : 
        //"je suis en infraction et je perd 1 pt" 

    //si la vitesse dépasse la limitation de plus de 40km/h, j'affiche : 
        //"je perds mon permis."

    //si je respecte la limitation j'affiche la phrase : 
        //"Je roule en vehicule a vitesse km/h sur une route limitee à limitation km/h."

function rouler( $vehicule, $vitesse, $limitation ){

    if( $vehicule == 'voiture' || $vehicule == 'moto' || $vehicule == 'camion' || $vehicule == 'velo' ){

        if( $vitesse > ($limitation + 40)  ){

            echo "je perds mon permis.<br>";
        } 
        else if( $vitesse > $limitation ){

               echo "je suis en infraction et je perd 1 pt<br>";
        }
        else{

            echo "Je roule en $vehicule a $vitesse km/h sur une route limitee à $limitation km/h.<br>";
        }
    }
    else{

        echo "T'as rien a faire sur une route!<br>";
    }
}
rouler( 'velo', 30, 50 );
rouler( 'avion', 30, 50 );
rouler( 'moto', 110, 90 );
rouler( 'voiture', 210, 140 );
echo "<hr>";
function rouler2( $vehicule, $vitesse, $limitation ){

    if( $vehicule == 'voiture' || $vehicule == 'moto' || $vehicule == 'camion' || $vehicule == 'velo' ){

        if(  $vitesse > $limitation  ){

            if( $vitesse > ($limitation + 40)  ){

                echo "je perds mon permis.<br>";
            } 
            else {
                echo "je suis en infraction et je perd 1 pt<br>";
            }
        }
        else{

            echo "Je roule en $vehicule a $vitesse km/h sur une route limitee à $limitation km/h.<br>";
        }
    }
    else{

        echo "T'as rien a faire sur une route!<br>";
    }
}

rouler2( 'velo', 30, 50 );
rouler2( 'avion', 30, 50 );
rouler2( 'moto', 110, 90 );
rouler2( 'voiture', 210, 140 );

echo "<hr>";
function jay($vehicule, $vitesse, $limitation_vitesse){

    $danger = $limitation_vitesse + 40;

    echo ($vehicule != "velo" && $vehicule != "moto" && $vehicule != "camion" && $vehicule != "voiture") ? "T'as rien a faire sur une route<br>" : 
        ( ($vitesse > $danger) ? "je perds mon permis.<br>" :
            ( ($vitesse > $limitation_vitesse) ? "je suis en infraction et je perd 1 pt<br>" : "Je roule en $vehicule a $vitesse km/h sur une route limitee à $limitation_vitesse km/h.<br>") );

}

jay("camion", 10, 130);
jay("voiture", 100, 90);
jay("canoe", 150, 50);
jay("moto", 150, 50);

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

echo "<hr>";
//--------------------------------------------------------
//Boucle FOR : va repeter un nombre de fois defini les instructions entre les accolades (scope de la boucle for)

//A la difference d'une boucle while() qui va repeter indefiniment les instructions entre les accolades TANT QUE la condition n'est pas realisee.

for( $i = 1; $i < 11; $i++ ){ //10 tours de boucle
    //Initialisation : $i = 1
    //condition : $i < 11
    //incrementation : $i++ <=> $i = $i + 1

    echo $i . ' tour de boucle <br>';
}

//----------------------------------------------------------
//EXERCICE : Affichez un selection option avec 52 options via une boucle 'for' DANS LE SENS INVERSE, c'est a dire pour afficher les annees allant de 2022 a 1970
echo "<select name=''>";

    for( $i = 2022; $i >= 1970; $i-- ){

        echo "<option value='$i'> $i </option>";
    } 

echo "</select><br>";

?>

<select name="" id="">

    <?php for( $i = 2022; $i >= 1970; $i-- ) : ?>

        <option value="<?= $i ?>"> <?= $i ?> </option>

    <?php endfor; ?>

</select>

<?php
//----------------------------------------------------------------
//EXERCICE : Affichez les numeros allant de 1 a 10 dans un tableau SUR UNE SEULE LIGNE
echo "<table border='2'>";
    echo "<tr>";

        for( $i = 1; $i <= 10; $i++ ){ //10 tours de boucle

            echo "<td> $i </td>";
        }

    echo "</tr>";
echo "</table>";

//----------------------------------------------------------------
//EXERCICE : boucles imbriquees : creer un tableau avec 10 lignes contenant 10 cellules avec les valeurs allant de 1 a 100

$numero = 1; //initialisation d'une variable a UN

echo "<table border='5'>";
    for( $i = 1; $i <= 10; $i++ ){ //10 tours de boucle
        echo "<tr>";
            for( $j = 1; $j <= 10; $j++ ){ //10 tours de boucle
                
                echo "<td> $numero </td>"; //Ici, on affiche la variable $numero
                
                $numero++; //Incrementaiton, on rajoute +1 a la variable $numero APRES l'affichage dans la cellule
            }   
        echo "</tr>";
    }
echo "</table><hr>";

//----------------------------------------------------
echo "<table border='1'>";
    for( $ligne = 0; $ligne < 10; $ligne++ ){ //10 tours de boucle
        echo "<tr>";
            for( $cellule = 1; $cellule <= 10; $cellule++ ){ //10 tours de boucle

                echo "<td>". ($cellule + ($ligne*10)) ."</td>";
                 /*1er tour de boucle : $ligne = 0
					//1er tour de la 2eme boucle : $cellule = 1
						//=> 10 * 0 + 1 = 1
					//2e tour de la 2eme boucle : $cellule = 2
						//=> 10 * 0 + 2 = 2 .....

                    2èm tour de boucle : $ligne = 1
                        //1er tour de la 2eme boucle : $cellule = 1
                            //=> 10 * 1 + 1 = 11
                        //2e tour de la 2eme boucle : $cellule = 2
                            //=> 10 * 1 + 2 = 12 .....
				*/
            }
        echo "</tr>";
    }
echo "</table><hr>";

//----------------------------------------------------
echo "<table border='3'>";
    echo "<tr>";
    for( $i = 1; $i <= 100; $i++ ){ // 100tours de boucle

        echo "<td>$i</td>";

        if( $i % 10 == 0 ){ //Si le modulo de 10 est egal a ZERO, alors on ferme la balise <t/r>
            if( $i == 100 ){ //Si on est a 100, on ferme la ligne

                echo "</tr>";
            }
            else{ //SINON, c'est que l'on est a 10, 2, 30 etc.. et on ferme la ligne et ouvre la suivante

                echo "</tr><tr>";
            }
        }
    }
echo "</table>";

//--------------------------------------------------------------------
echo "<h2> Les arrays + boucle foreach </h2>";

$tableau = ['pomme', 'poire', 'peche']; //declaration d'un tableau avec des crochets et on separe les valeurs ave des virgules

//echo $tableau; //ERROR ! IMPOSSIBLE d'AFFICHER UN TABLEAU TEL QUEL, il faut parcourir les donnees du tableau pou les afficher

$tableau[] = "abricot"; //Ici, on rajoute une valeur a la fin du tableau 

print "<pre>";
    var_dump( $tableau );
    print_r( $tableau );
print "</pre>";

//Afficher 'peche':
echo $tableau[2] . '<br>'; //Ici, pour afficher un element precis d'un tableau, il faut appeler le tableau et preciser entre crochets l'indice correspondant.

//----------------------------------
//Affichage de TOUTES les infos du tableau
for( $i = 0; $i < 4; $i++ ){ //4 tours de boucles

    echo "Valeur de i : $i => " . $tableau[$i] . '<br>'; 
}

//----------------------------------
//count() et sizeof() : fonction php qui permettent de retourner la longueur d'un tableau
echo "<hr>Taille du tableau : " . count( $tableau ) . '<br>';
echo "Taille du tableau : " . sizeof( $tableau ) . '<br>';

//----------------------------------
$tableau[] = 'framboise'; //On rajoute une valeur au tableau

//Affichage de toutes les informations du taleau de maniere dynamique, meme si l'on rajoute des elements a notre tableau, toutes les infos seront parcourues
for( $i = 0; $i < sizeof( $tableau ); $i++ ){

    echo "Valeur de i : $i => " . $tableau[$i] . '<br>'; 
}

//------------------------------------
//Possibilite de declarer un tableau avec la fonction de php array() et on a egalement la possibilite de choisir les indices du tableau
$couleur = array(
                    'j' => 'jaune', 
                    'r' => 'rouge', 
                    'v' => ' vert'
                );

print '<pre>';
    print_r( $couleur );
print '</pre>';

//Affichage de la couleur 'vert' :
echo $couleur['v'] .'<hr>';

//--------------------------------------------------------------
//Boucle FOREACH() : FONCTIONNE UNIQUEMENT avec les tableaux ( ou objets ). Elle retournera un erreur si vous tentez de l'executer avec une variable autre qu'un array (ou object)

    //La boucle foreach permet de passer en revu TOUTES les donnees d'un tableau !

//Ici, on va parcourir le tableau '$couleur' ou les indices ne sont pas numeriques et donc on ne peut pas utiliser la boucle 'for' 
foreach( $couleur as $indice => $valeur ){

    echo "Indice : $indice et sa valeur : $valeur <br>";
}

//Le premier argument (ici, '$couleur') de la boucle foreach DOIT IMPERATIVEMENT etre un array (ou object)
//Le mot cle "as" est OBLIGATOIRE, il fait parti de la boucle foreach()

//SI il y DEUX VARIABLES, en argument APRES le mot cle "AS", le premier (ici, '$indice') parcours la colonne des indices et le second, qui sera separe par la fleche '=>' (ici, '$valeur') parcours la colonne des valeurs du tableau (ici, '$couleur')

//SI il n'y a qu'UNE SEULE VARIABLE en argument APRES le mot cle "as", alors cette variable parcours uniquement les valeurs du tableau
foreach( $couleur as $value ){

    echo $value . " / ";
}

echo "<hr>";

//---------------------------------------
//Autre syntaxe :
//Ici, l'accolade ouvrante est remplacee par les deux points et l'accolade fermante est remplacee par 'endforeach'
foreach( $tableau as $fruit ) :

    echo $fruit . ' - ';

endforeach;

//--------------------------------------------------------------------
echo "<h2> Les arrays multidimentionnels </h2>";
//Les tableaux multi sont des tableaux a l'interieur d'un tableau

$multi = array( 
                0 => array('prenom' => 'marco', 'nom' => 'polo' ), 
                1 => array('prenom' => 'bob', 'nom' => 'dylan' ), 
                2 => array('prenom' => 'marie', 'nom' => 'antoinette') 
            );

print '<pre>';
    print_r( $multi );
print '</pre>';

//Affichez 'antoinette' :
echo $multi[2]['nom']  . '<hr>';

//EXERCICE : parcourir toutes les infos du tableau ($multi) via des boucles foreach() :
foreach( $multi as $index => $sous_tableau ){

    // print '<pre>';
    //     print_r( $sous_tableau );
    // print '</pre>';

    foreach( $sous_tableau as $indice => $valeur ){

        echo $indice . " : " . $valeur . '<br>';
    }
}

echo "<hr>";
echo "<hr>";
//-----------------------------------------
for( $i = 0; $i < sizeof( $multi ); $i++ ){

    print '<pre>';
        print_r( $multi[$i] );    
    print '</pre>';    

    foreach( $multi[$i] as $indice => $valeur ){

        echo $valeur . '<br>';
    }
}

echo "<hr>";
echo "<hr>";
echo "<hr>";
//-----------------------------------------
foreach( $multi as $index => $valeur ){

    print '<pre>';
        print_r( $valeur );
    print '</pre>';

    echo $valeur['prenom'] . " : " . $valeur['nom'] . '<br>';
}

//--------------------------------------------------------------------
echo "<h2> Les Objets </h2>";
//Les objets sont un autre type de donnees. Un peu a la maniere des arrays, il permet de regrouper des informations.
//Ici, on parlera de methodes (=fonctions) et de proprietes (=variables)

class Etudiant{

    public $prenom = "Jeremie"; //'public' : permet de dire que la propriete sera accessible partout VIA l'OBJET ! Il existe aussi 'protected' et 'private'

    public $age = 12;

    public function pays(){

        return 'France';
    }
}

//Une classe est un constructeur d'objet. Un objet est un conteneur symbolique qui possede sa PROPRE existance et incorpore des informations (proprietes) et des mecanismes (methodes)

$etudiant1 = new Etudiant;
//Le mot cle "new" permet d'instancier (deployer) la classe et de creer un objet (=instance). On se servira de ce qu'il y a a l'interieur de la classe VIA l'objet.

//echo $etudiant1; //FATAL ERROR, on ne peut pas afficher les informations d'un opbjet tel quel.

print '<pre>';
    var_dump( $etudiant1 );
    print_r( $etudiant1 );
print '</pre>';

//Affichage 'jeremie':
echo $etudiant1->prenom . '<br>';

//Dans un array, on va piocher les informations avec des crochets [], alors qu'ici, avec les objets, on utilisera la fleche '->' pour acceder aux proprietes et aux methodes de la classe via l'objet

//Affichage de l'age :
echo $etudiant1->age . '<br>';

print '<pre>';
    print_r( get_class_methods( $etudiant1 ) );
    //get_class_methods( $object ) : fontion php qui permet de voir les methodes disponibles d'un objet
print '</pre>';

//Utilisation de la methode pays:
echo $etudiant1->pays(); //Appel d'une methode via l'objet TOUJOURS AVEC LES PARENTHESES

//--------------------------------------------------------------------
echo "<h2> Les inclusions </h2>";

echo "Premiere fois : <br>";
include "exemple.inc.php"; //Inclusion du fichier exemple.inc.php A CET ENDROIT PRECIS

echo "Deuxieme fois : <br>";
include_once "exemple.inc.php"; //le "once" permet de verifier si le fichier a deja ete inclus ET si c'est le cas, il ne re-inclus pas !

//------------------------------
echo "<hr>Premiere fois : <br>";
require "exemple.inc.php"; 

echo "Deuxieme fois : <br>";
require_once "exemple.inc.php"; 

//La difference entre include et require :

    //Include : fera erreur, si il y a un probleme avec le fichier a inclure et CONTINUE l'execution du script

    //require : fera erreur, si il y a un probleme avec le fichier a inclure et STOP l'execution du script

echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";