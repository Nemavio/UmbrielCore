<?php
require("connexion.php");
if(isset($_SESSION['idbdd'])){ 
	requete_general($base, $connexion, $tableparam, $_SESSION['idbdd'], $connexion);
	comptage($base, $connexion, $tableparam, $_SESSION['idbdd'], $connexion, $varserv);
	}else{$titrecomplet="UmbrielSystem"; header("Location:identification.php?msg=na");}
?>
<html>
<head>
<title>Soir&eacute;e Disco Plougastel</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<link rel="stylesheet" type="text/css" href="img/style.css">
</head><body text="#FFFFFF" link="#FFFF66" vlink="#FFFF99" alink="#FFFF99" style="background-color:#749CAC;" class="active_bg_image">
              <div id="pattern">

  <div id="gradient"><img src="img/bg.jpg" id="background_image" alt="" /><br /><div align="center">
<?php
if(isset($_SESSION['prvlg_user']) && ($_SESSION['prvlg_user'] == "sa")){$bloceven="";}else if(isset($_SESSION['prvlg_user']) && ($_SESSION['prvlg_user'] == "a")){$bloceven="";}else{$bloceven="disabled";}
if(isset($_SESSION['prvlg_user']) && ($_SESSION['prvlg_user'] == "sa")){$blocuser="";}else{$blocuser="disabled";}
if(isset($_SESSION['id_user'])){$blocusernoconnect="";}else{$blocusernoconnect="disabled";}
?>
<table style="text-align: left; width: 100%; height: 32px;" border="0" cellpadding="2" cellspacing="2"><tbody>
<tr><td width="10%" style="vertical-align: top; text-align: left;"><form><input name="button" type="button" onClick="self.location.href='identification.php?gestion=choixeven'" value="Param&egrave;tres des &eacute;v&egrave;nements" <?php echo $bloceven; ?>></form></td>
<td width="15%" style="vertical-align: top; text-align: left;"><form><input type="button" value="Param&egrave;tres des utilisateurs" onClick="self.location.href='identification.php?gestion=utilisateurs'" <?php echo $blocuser; ?>></form></td>
<td width="50%" style="vertical-align: top; text-align: center;"><p><font size="+2"><strong><u><?php echo $titrecomplet;?> - Suppression...</u></strong></font></p></td>
<td width="20%" style="vertical-align: top; text-align: left;"><form action="identification.php" method="post"><select name="changeserv" <?php echo $blocusernoconnect; ?> onChange="this.form.submit()"><option value="newserveur">Nouveau Serveur</option><option disabled>- -</option><?php
mysql_select_db($base, $connexion); 
							$rechercheserveur=mysql_query('SELECT * FROM '.$tableparam.' WHERE type="serveur"'); 
								while($datarechercheserveur = mysql_fetch_array($rechercheserveur)){ 
									echo("<option value=\"".$datarechercheserveur['valeur3']."\">".$datarechercheserveur['valeur2']."</option>");
								}?></select><input name="" value="Changer" type="submit" <?php echo $blocusernoconnect; ?>></form></td>
<td width="10%" style="vertical-align: top; text-align: right;"><form><input type="button" value="D&eacute;connexion" onClick="self.location.href='identification.php?option=deconnexion'" <?php echo $blocusernoconnect; ?>></form></td></tr></tbody></table>
<?php
if(isset($_GET['suppression']) && ($_GET['suppression'] == "confirmer") && ($_GET['id'])){
	mysql_select_db($base, $connexion);
	$suppressionrecherche = mysql_query('SELECT id, nom, prenom FROM '.$varserv['valeur4'].' WHERE id="'.$_GET['id'].'"');
	while($suppressionsearch = mysql_fetch_array($suppressionrecherche)){
	echo("Voulez-vous vraiment continuer la suppression de ".$suppressionsearch['prenom']."&nbsp;".$suppressionsearch['nom']."?<br /><br /><br />");
	echo("<form><input type=\"button\" value=\"Oui\" onclick=\"self.location.href='confirmation.php?confirmer=suppression&id=".$_GET['id']."&nom=".$suppressionsearch['nom']."&prenom=".$suppressionsearch['prenom']."'\">|<input type=\"button\" value=\"Non!\" onclick=\"self.location.href='utilisateurs.php?utilisateur=".$_GET['id']."'\"></form>");
	}
} else if(isset($_GET['suppression']) && ($_GET['suppression'] == "135556256365654526854415445844788654584") && ($_GET['id'])){
	mysql_select_db($base, $connexion);
	$suppression = mysql_query('DELETE FROM '.$varserv['valeur4'].' WHERE id="'.$_GET['id'].'"');
		if($suppression){
		echo("Suppression r&eacute;ussie, redirection vers la page d'accueil dans quelques secondes...<br/><br/><br/><img src=\"img/load.gif\"/><meta http-equiv=\"refresh\" content=\"2; URL=index.php\">");
		}else{
		echo("Une erreur est survenue !<br /><br/><img src=\"img/loaderreur.gif\"/><br /><br/>Redirection vers la page d'accueil en cours...<meta http-equiv=\"refresh\" content=\"3; URL=index.php\">");
		}
} else {
echo("Aucune variable d&eacute;clar&eacute;e, redirection vers la page d'accueil...<meta http-equiv=\"refresh\" content=\"3; URL=index.php\">");
}
?>
</div></div></div>
</body>
</html>