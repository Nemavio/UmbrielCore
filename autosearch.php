<?php
require('connexion.php');
/// si on reçoit une donnée
if(isset($_GET['q'])){
		mysql_select_db($base, $connexion);
	$requeteservwithindex=sprintf("SELECT * FROM ".$tableparam." WHERE valeur1='".$_GET['idbdd']."' AND type='serveur'");
	$requeteservs1withindex=mysql_query($requeteservwithindex, $connexion) or die(mysql_error());
	$varservwithindex=mysql_fetch_assoc($requeteservs1withindex);
	$opservwithindex=mysql_num_rows($requeteservs1withindex);
	function stripAccents($string){
	$patterns = array('á', 'à', 'â', 'ä', 'ã', 'å', 'ç', 'é', 'è', 'ê', 'ë', 'í', 'ì', 'î', 'ï', 'ñ', 'ó', 'ò', 'ô', 'ö', 'õ', 'ú', 'ù', 'û', 'ü', 'ý', 'ÿ', 'Á', 'À', 'Â', 'Ä', 'Ã', 'Å', 'Ç', 'É', 'È', 'Ê', 'Ë', 'Í', 'Ï', 'Î', 'Ì', 'Ñ', 'Ó', 'Ò', 'Ô', 'Ö', 'Õ', 'Ú', 'Ù', 'Û', 'Ü', 'Ý', 'é', 'è');

$replacements = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'e', 'e');


return str_replace($patterns, $replacements, $string);
}
$q = stripAccents($_GET['q']);
	    $q = stripslashes(htmlentities(addslashes($q)));  //protection
     $table = $varservwithindex['valeur4'];
    // connexion à la base de données
    $requete = mysql_query('SELECT * FROM '.$table.' WHERE nom LIKE "'.$q.'%" LIMIT 0, 10');

    // affichage des résultats
    while($donnees = mysql_fetch_array($requete)) {
		$nom = mb_strtoupper(stripAccents(utf8_encode($donnees['nom'])));
		$prenom = ucfirst(stripAccents(utf8_encode($donnees['prenom'])));
        echo "".$nom." ".$prenom."\n";
    }
	    $requete1 = mysql_query('SELECT * FROM '.$table.' WHERE prenom LIKE "'.$q.'%" LIMIT 0, 10');
echo mysql_error();
    // affichage des résultats
    while($donnees1 = mysql_fetch_array($requete1)) {
		$nom = mb_strtoupper(stripAccents(utf8_encode($donnees1['nom'])));
		$prenom = ucfirst(stripAccents(utf8_encode($donnees1['prenom'])));
        echo "".$nom." ".$prenom."\n";
    }
		    $requete2 = mysql_query('SELECT * FROM '.$table.' WHERE id = "'.$q.'" LIMIT 0, 10');
echo mysql_error();
     //affichage des résultats
    while($donnees2 = mysql_fetch_array($requete2)) {
		$nom = mb_strtoupper(stripAccents(utf8_encode($donnees2['nom'])));
		$prenom = ucfirst(stripAccents(utf8_encode($donnees2['prenom'])));
        echo "".$nom." ".$prenom."\n";
    }
}else{header("Location:identification.php?msg=na");}
?>