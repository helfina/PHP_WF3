<?php
//2 - Créer un fichier lien.php. Prévoir 4 liens <a href=""></a> avec le nom des fruits afin de faire en sorte que lorsque l'on clique dessus, le prix du fruit ( pour 1 kg) s'affiche DANS LA MEME PAGE grâce à la fonction calcul().

print '<pre>';
    print_r( $_GET);
print '</pre>';

include "fonction.inc.php"; //INCLUSION du fichier : fonction.inc.php pour pouvoir incorporer A CET ENDROIT PRECIS, la fonction calcul() et donc de pouvoir l'utiliser et acceder au prix au kg dans ce fichier

if( isset( $_GET['fruit'] ) ){ //SI il existe $_GET['fruit] c'est que l'on a clique sur un lien et que la cle 'fruit' a ete passee dans l'URL 

    echo calcul( $_GET['fruit'], 1000 );
}
//---------------------------------------------------------------
?>
<hr>
<a href="?fruit=pommes">Pommes</a><br>
<a href="?fruit=poires">Poires</a><br>
<a href="?fruit=bananes">Bananes</a><br>
<a href="?fruit=cerises">Cerises</a><br>