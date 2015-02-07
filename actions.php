<?php
require("connexion.php");
if(isset($_SESSION['idbdd'])){ 
	requete_general($base, $connexion, $tableparam, $_SESSION['idbdd'], $connexion);
	comptage($base, $connexion, $tableparam, $_SESSION['idbdd'], $connexion, $varserv);
	}else{$titrecomplet="UmbrielSystem"; header("Location:identification.php?msg=na");}
?>
<html>
<head>
<title><?php echo $varserv['valeur2'];?> - Actions...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<link rel="stylesheet" type="text/css" href="img/style.css">
<style>
table
{
   border-collapse: collapse;
}
</style>
</head>

<body text="#FFFFFF" link="#FFFF66" vlink="#FFFF99" alink="#FFFF99" style="background-color:#749CAC;" class="active_bg_image">
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
<td width="50%" style="vertical-align: top; text-align: center;"><p><font size="+2"><strong><u><?php echo $titrecomplet;?> - Accueil : Infos</u></strong></font></p></td>
<td width="20%" style="vertical-align: top; text-align: left;"><form action="identification.php" method="post"><select name="changeserv" <?php echo $blocusernoconnect; ?> onChange="this.form.submit()"><option value="newserveur">Nouveau Serveur</option><option disabled>- -</option><?php
mysql_select_db($base, $connexion); 
							$rechercheserveur=mysql_query('SELECT * FROM '.$tableparam.' WHERE type="serveur"'); 
								while($datarechercheserveur = mysql_fetch_array($rechercheserveur)){ 
									echo("<option value=\"".$datarechercheserveur['valeur3']."\">".$datarechercheserveur['valeur2']."</option>");
								}?></select><input name="" value="Changer" type="submit" <?php echo $blocusernoconnect; ?>></form></td>
<td width="10%" style="vertical-align: top; text-align: right;"><form><input type="button" value="D&eacute;connexion" onClick="self.location.href='identification.php?option=deconnexion'" <?php echo $blocusernoconnect; ?>></form></td></tr></tbody></table>
<br /><form action="index.php" method="post" name="cfpage"><select name="cspage" onChange="this.form.submit()"><option>-- Changer de page --</option><option value="modifier.php?typemodif=inscription">Inscription</option><option value="search.php">Recherche</option><option value="index.php">Accueil</option></select></form><br /><?php
if(isset($_GET['action']) && ($_GET['id'])){
	if(isset($_GET['action']) && $_GET['action'] == "entrer"){
	mysql_select_db($base, $connexion);
	$sql=mysql_query('UPDATE '.$varserv['valeur4'].' SET nodeclare="0", rentre="1", sorti="0" WHERE id = "'.$_GET['id'].'"');
	echo("Modifications en cours...<br /><br /><br /><img src=\"img/load.gif\" \>");
	if($rami == "oui"){
					echo("<meta http-equiv=\"refresh\" content=\"0; URL=index.php?info=entrer\">");
	}else{
			echo("<meta http-equiv=\"refresh\" content=\"0; URL=utilisateurs.php?utilisateur=".$_GET['id']."\">");
	}

	
	} else if(isset($_GET['action']) && $_GET['action'] == "sortir"){
	mysql_select_db($base, $connexion);
	$sql=mysql_query('UPDATE '.$varserv['valeur4'].' SET nodeclare="0", rentre="0", sorti="1" WHERE id = "'.$_GET['id'].'"');
	echo("Modifications en cours...<br /><br /><br /><img src=\"img/load.gif\" \>");
	if($rami == "oui"){
					echo("<meta http-equiv=\"refresh\" content=\"0; URL=index.php?info=sortir\">");
	}else{
			echo("<meta http-equiv=\"refresh\" content=\"0; URL=utilisateurs.php?utilisateur=".$_GET['id']."\">");
	}
	
	} else if(isset($_GET['action']) && $_GET['action'] == "sortir_re"){
	mysql_select_db($base, $connexion);
	$sql=mysql_query('UPDATE '.$varserv['valeur4'].' SET nodeclare="0", rentre="1", sorti="1" WHERE id = "'.$_GET['id'].'"');
	echo("Modifications en cours...<br /><br /><br /><img src=\"img/load.gif\" \>");
	if($rami == "oui"){
					echo("<meta http-equiv=\"refresh\" content=\"0; URL=index.php?info=sortir_re\">");
	}else{
		if(isset($_GET['page']) && ($_GET['page'] == "inscription")){
			echo("<meta http-equiv=\"refresh\" content=\"0; URL=modifier.php?typemodif=inscription\">");
		}else{
			echo("<meta http-equiv=\"refresh\" content=\"0; URL=utilisateurs.php?utilisateur=".$_GET['id']."\">");
		}

	}
	
	} else {
	echo("<img src=\"img/loaderreur.gif\" \><br />");
	echo("Aucune variable d&eacute;clar&eacute;e, vous allez être redirig&eacute;(e) automatiquement...");
	echo("<meta http-equiv=\"refresh\" content=\"3; URL=utilisateurs.php\">");
	}
}
if(isset($_GET['id'])){
if(isset($_GET['Submit']) && $_GET['Submit'] == "Terminer"){
header('Location:modifier.php?typemodif=inscription');
exit();
}}
?>
</div></div></div>
</body>
</html>
