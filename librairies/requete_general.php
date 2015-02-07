<?php
function requete_general($base, $connexion, $tableparam, $idbdd, $connexion){
	global $titrecomplet, $varserv, $agemin, $agemax;
	mysql_select_db($base, $connexion);
	$requeteserv=sprintf("SELECT * FROM ".$tableparam." WHERE valeur1='".$idbdd."' AND type='serveur'");
	$requeteservs1=mysql_query($requeteserv, $connexion) or die(mysql_error());
	$varserv=mysql_fetch_assoc($requeteservs1);
	$opserv=mysql_num_rows($requeteservs1);
	 	$titre = $varserv['valeur2']; 
		if($varserv['valeur13']>$varserv['valeur14']){
	$agemin = $varserv['valeur14'];
	$agemax = $varserv['valeur13'];
}else{
	$agemin = $varserv['valeur13'];
	$agemax = $varserv['valeur14'];
}
		$titrecomplet="".$titre."&nbsp;(".$agemin."-".$agemax."&nbsp;ans&nbsp;|&nbsp;".$varserv['valeur5']."/".$varserv['valeur6']."/".$varserv['valeur7'].")";
}
?>