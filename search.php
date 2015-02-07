<?php
require("connexion.php");
if(isset($_SESSION['idbdd'])){ 
	requete_general($base, $connexion, $tableparam, $_SESSION['idbdd'], $connexion);
	comptage($base, $connexion, $tableparam, $_SESSION['idbdd'], $connexion, $varserv);
	}else{$titrecomplet="UmbrielSystem"; header("Location:identification.php?msg=na");}
?>
<html>
<head>
<title><?php echo $varserv['valeur2'];?> - Recherches</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<link rel="stylesheet" type="text/css" href="img/style.css">
<script language="JavaScript" type="text/javascript">
function autosubmit()
   {
   var w = document.cfpage.cspage.selectedIndex;
   var url_add = document.cfpage.cspage.options[w].value;
   window.location.href = url_add;
   }
</script>
</head>
<body text="#FFFFFF" link="#FFFF66" vlink="#FFFF99" alink="#FFFF99" style="background-color:#749CAC;" onLoad="document.getElementById('index').focus();" class="active_bg_image">
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
<td width="50%" style="vertical-align: top; text-align: center;"><p><font size="+2"><strong><u><?php echo $titrecomplet;?> - Recherches</u></strong></font></p></td>
<td width="20%" style="vertical-align: top; text-align: left;"><form action="identification.php" method="post"><select name="changeserv" <?php echo $blocusernoconnect; ?> onChange="this.form.submit()"><option value="newserveur">Nouveau Serveur</option><option disabled>- -</option><?php
mysql_select_db($base, $connexion); 
							$rechercheserveur=mysql_query('SELECT * FROM '.$tableparam.' WHERE type="serveur"'); 
								while($datarechercheserveur = mysql_fetch_array($rechercheserveur)){ 
									echo("<option value=\"".$datarechercheserveur['valeur3']."\">".$datarechercheserveur['valeur2']."</option>");
								}?></select><input name="" value="Changer" type="submit" <?php echo $blocusernoconnect; ?>></form></td>
<td width="10%" style="vertical-align: top; text-align: right;"><form><input type="button" value="D&eacute;connexion" onClick="self.location.href='identification.php?option=deconnexion'" <?php echo $blocusernoconnect; ?>></form></td></tr></tbody></table>
<br /><span style="text-align:center;">
<form action="index.php" method="post" name="cfpage"><select name="cspage" onChange="this.form.submit()"><option>-- Changer de page --</option><option value="search">Recherche</option><option value="index">Accueil</option><option value="inscription">Inscription</option></select></form></span><br /><br />
<?php
	if(isset($_POST['nom'])){
			echo("Recherche en cours...");
			echo("<br /><br /><br /><img src=\"img/load.gif\" />");
			echo("<meta http-equiv=\"refresh\" content=\"0; URL=utilisateurs.php?lettresn=".$_POST['nom']."\">");
			//echo("<meta http-equiv=\"refresh\" content=\"0; URL=utilisateurs.php?multinom=".$_POST['nom']."\">");
	} else if(isset($_POST['prenom'])){
			echo("Recherche en cours...");
			echo("<br /><br /><br /><img src=\"img/load.gif\" />");
			echo("<meta http-equiv=\"refresh\" content=\"0; URL=utilisateurs.php?multiprenom=".$_POST['prenom']."\">");
	} else if(isset($_POST['id'])){
			echo("Recherche en cours...");
			echo("<br /><br /><br /><img src=\"img/load.gif\" />");
			echo("<meta http-equiv=\"refresh\" content=\"0; URL=utilisateurs.php?utilisateur=".$_POST['id']."\">");
	} else if(isset($_POST['lettres'])){
			echo("Recherche en cours...");
			echo("<br /><br /><br /><img src=\"img/load.gif\" />");
			echo("<meta http-equiv=\"refresh\" content=\"0; URL=utilisateurs.php?lettresn=".$_POST['lettres']."\">");
	} else {
	echo("<form method=\"get\" action=\"utilisateurs.php\" ><p align=\"center\"><u><strong><font size=\"+1\"><em>Rechercher une personne </em></font></strong></u><input name=\"mashup\" type=\"text\" id=\"index\"><input type=\"submit\" name=\"Submit\" value=\"OK\"></form><br /><br /><br />");
	echo("<font size=\"+2\">Attention ! Deux recherches valent mieux qu'une; si vous ne trouvez pas l'utilisateur cherch&eacute;, assurez-vous de n'avoir oubli&eacute; aucun tirets ou espace.<br /> Si vous ne trouvez toujours pas, essayez la recherche par pr&eacute;nom ou par ID !</font><br /><br /><br /><br />");
	echo("<form method=\"post\" action=\"search.php\" ><p align=\"center\"><u><strong><font size=\"+1\"><em>Pr&eacute;nom de(s) la personne(s) (sans espaces de pr&eacute;f&eacute;rence) </em></font></strong></u><input name=\"prenom\" type=\"text\"><input type=\"submit\" name=\"Submit\" value=\"OK\"></form><br /><br />");
	echo("<form method=\"post\" action=\"search.php\" ><p align=\"center\"><u><strong><font size=\"+1\"><em>ID de la personne (num&eacute;ro) </em></font></strong></u><input name=\"id\" type=\"text\"><input type=\"submit\" name=\"Submit\" value=\"OK\"></form><br /><br />");
	
	}
?>
<br /><br /><form><input type="button" value="Retourner &agrave; l'index..." onClick="self.location.href='index.php'"></form>
</div></div></div>
</body>
</html>