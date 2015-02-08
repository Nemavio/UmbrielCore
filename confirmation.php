<?php
require("connexion.php");
if(isset($_GET['url'])){$url=$_GET['url'];} else {$url="index.php";}
if(isset($_SESSION['idbdd'])){ 
	requete_general($base, $connexion, $tableparam, $_SESSION['idbdd'], $connexion);
	comptage($base, $connexion, $tableparam, $_SESSION['idbdd'], $connexion, $varserv);
}else{$titrecomplet="UmbrielSystem"; header("Location:identification.php?msg=na");}

?>
<html><head><title><?php echo $varserv['valeur2'];?> - Confirmation</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<link rel="stylesheet" type="text/css" href="img/style.css">
<style>
table {border-collapse: collapse;}
</style>
</head><body text="#FFFFFF" link="#FFFF66" vlink="#FFFF99" alink="#FFFF99" style="background-color:#749CAC;" class="active_bg_image">
<div id="pattern">

<div id="gradient"><img src="img/bg.jpg" id="background_image" alt="" /><br /><div align="center"><p>
<?php
if(isset($_SESSION['prvlg_user']) && ($_SESSION['prvlg_user'] == "sa")){$bloceven="";}else if(isset($_SESSION['prvlg_user']) && ($_SESSION['prvlg_user'] == "a")){$bloceven="";}else{$bloceven="disabled";}
if(isset($_SESSION['prvlg_user']) && ($_SESSION['prvlg_user'] == "sa")){$blocuser="";}else{$blocuser="disabled";}
if(isset($_SESSION['id_user'])){$blocusernoconnect="";}else{$blocusernoconnect="disabled";}
?>
<table style="text-align: left; width: 100%; height: 32px;" border="0" cellpadding="2" cellspacing="2"><tbody>
<tr><td width="10%" style="vertical-align: top; text-align: left;"><form><input name="button" type="button" onClick="self.location.href='identification.php?gestion=choixeven'" value="Param&egrave;tres des &eacute;v&egrave;nements" <?php echo $bloceven; ?>></form></td>
<td width="15%" style="vertical-align: top; text-align: left;"><form><input type="button" value="Param&egrave;tres des utilisateurs" onClick="self.location.href='identification.php?gestion=utilisateurs'" <?php echo $blocuser; ?>></form></td>
<td width="50%" style="vertical-align: top; text-align: center;"><p><font size="+2"><strong><u><?php echo $titrecomplet;?> - Accueil : Infos</u></strong></font></p></td>
<td width="20%" style="vertical-align: top; text-align: left;"><form action="identification.php" method="post"><select name="changeserv" <?php echo $blocusernoconnect; ?> onChange="this.form.submit()"><option value="newserveur">Nouveau Serveur</option><option disabled>- -</option><?php
mysql_select_db($base, $connexion); 
$rechercheserveur=mysql_query('SELECT * FROM '.$tableparam.' WHERE type="serveur"'); 
while($datarechercheserveur = mysql_fetch_array($rechercheserveur)){ 
	echo("<option value=\"".$datarechercheserveur['valeur3']."\">".$datarechercheserveur['valeur2']."</option>");
}?></select><input name="" value="Changer" type="submit" <?php echo $blocusernoconnect; ?>></form></td>
<td width="10%" style="vertical-align: top; text-align: right;"><form><input type="button" value="D&eacute;connexion" onClick="self.location.href='identification.php?option=deconnexion'" <?php echo $blocusernoconnect; ?>></form></td></tr></tbody></table><br />
<form action="index.php" method="post" name="cfpage"><select name="cspage" onChange="this.form.submit()"><option>-- Changer de page --</option><option value="modifier.php?typemodif=inscription">Inscription</option><option value="search.php">Recherche</option><option value="index.php">Accueil</option></select></form><br /><?php
//Confirmation d'entrée
if(isset($_GET['confirmer']) && ($_GET['confirmer'] == "entrer")){
	if($_GET['ageok'] == $agemin){$agerequis="<font color=\"#008000\">A L'AGE REQUIS POUR RENTRER</font>";} else if(($_GET['ageok'] > $agemin) && ($_GET['ageok'] < $agemax)){$agerequis="<font color=\"#008000\">A L'AGE REQUIS POUR RENTRER</font>";} else if($_GET['ageok'] == $agemax){$agerequis="<font color=\"#008000\">A L'AGE REQUIS POUR RENTRER</font>";} else if($_GET['ageok'] == "14"){$agerequis="<font color=\"#008000\">A L'AGE REQUIS POUR RENTRER</font>";} else {$agerequis="<font color=\"#FF0000\">N'A PAS L'AGE REQUIS POUR RENTRER</font>";}
	echo("<font size=\"+2\">".$agerequis."</font><br /><br />");
	echo("Confirmer l'entr&eacute;e pour ".$_GET['nom']."&nbsp;".$_GET['prenom']."<br />");
	echo("<form><input type=\"button\" value=\"Oui\" onclick=\"self.location.href='actions.php?action=entrer&id=".$_GET['id']."'\">&nbsp;");
	echo("<input type=\"button\" value=\"Annuler\" onclick=\"self.location.href='utilisateurs.php?utilisateur=".$_GET['id']."'\"></form>");
	//Confirmation de sortie
} else if(isset($_GET['confirmer']) && ($_GET['confirmer'] == "sortir")){
	if($varserv['valeur10'] == "1"){
		if(isset($_GET['psortir']) && ($_GET['psortir'] == "0")){$sorti="<font color=\"#FF0000\">NON AUTORIS&Eacute;(E) &Agrave; SORTIR TOUT(E) SEUL(E)</font>";}else{$sorti="<font color=\"#008000\">AUTORIS&Eacute;(E) &Agrave; SORTIR TOUT(E) SEUL(E)</font>";}
	}else{ $sorti="<font color=\"#008000\">AUTORIS&Eacute;(E) &Agrave; SORTIR TOUT(E) SEUL(E)</font>"; }
	echo("<font size=\"+2\">".$sorti."</font><br /><br />");
	echo("Confirmer la sortie sans retour (normalement) pour ".$_GET['nom']."&nbsp;".$_GET['prenom']."<br />");
	echo("<form><input type=\"button\" value=\"Oui, et veut r&eacute;-entrer\" onclick=\"self.location.href='actions.php?action=sortir_re&id=".$_GET['id']."'\">&nbsp;");
	echo("<form><input type=\"button\" value=\"Oui, mais ne veut plus revenir...\" onclick=\"self.location.href='actions.php?action=sortir&id=".$_GET['id']."'\">&nbsp;");
	echo("<input type=\"button\" value=\"Annuler\" onclick=\"self.location.href='utilisateurs.php?utilisateur=".$_GET['id']."'\"></form>");
	
	//Confirmation de modifications des paramètres
} else if(isset($_GET['confirmer']) && ($_GET['confirmer'] == "parametres")){
	echo("Voulez-vous vraiment modifier les param&egrave;tres de ".$_GET['nom']."&nbsp;".$_GET['prenom']."?<br />");
	echo("<form><input type=\"button\" value=\"Oui\" onclick=\"self.location.href='modifier.php?typemodif=modification&id=".$_GET['id']."'\">&nbsp;");
	echo("<input type=\"button\" value=\"Annuler\" onclick=\"self.location.href='utilisateurs.php?utilisateur=".$_GET['id']."'\">");
	//Confirmation de suppression
} else if(isset($_GET['confirmer']) && ($_GET['confirmer'] == "suppression")){
	echo("<script type=\"text/javascript\" language=\"javascript\">");
	echo("alert(Attention!\nVous allez supprimer ".$_GET['prenom']." ".$_GET['nom']."!)");
	echo("</script>");
	echo("&Ecirc;tes-vous sûr(e) de vouloir supprimer ".$_GET['prenom']."&nbsp;".$_GET['nom']."?");
	echo("<br /><br /><br /><form><input type=\"button\" value=\"Oui (dernier rappel!)\" onclick=\"self.location.href='suppression.php?suppression=135556256365654526854415445844788654584&id=".$_GET['id']."'\">|<input type=\"button\" value=\"Non!!!\" onclick=\"self.location.href='utilisateurs.php?utilisateur=".$_GET['id']."'\"></form>");
	//En cas d'erreur
} else {
	if(isset($_GET['id'])){
		echo("Aucune variable d&eacute;clar&eacute;e, <form><input type=\"button\" value=\"Retour...\" onclick=\"self.location.href='utilisateurs.php?utilisateur=".$_GET['id']."'\"></form>");
	}else{
		echo("Aucune variable d&eacute;clar&eacute;e, <form><input type=\"button\" value=\"Retour...\" onclick=\"self.location.href='index.php'\"></form>");
	}
}
?></div></div></div></body></html>