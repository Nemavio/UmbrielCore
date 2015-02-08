<?php
require("connexion.php");
if(isset($_SESSION['idbdd'])){ 
	requete_general($base, $connexion, $tableparam, $_SESSION['idbdd'], $connexion);
	comptage($base, $connexion, $tableparam, $_SESSION['idbdd'], $connexion, $varserv);
	}else{$titrecomplet="UmbrielSystem"; header("Location:identification.php?msg=na");}
?>
<html>
<head>
<title>Soir&eacute;e Disco Plougastel - Utilisateurs</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" type="image/x-icon" href="themes/default/img/favicon.ico">
<link rel="stylesheet" type="text/css" href="themes/default/img/style.css">
<script language="javascript">
function confirme( id )
      {
        var confirmation = confirm("Voulez vous vraiment supprimer cette personne ?");
	if(confirmation)
	{
	  document.location.href = "suppression.php?suppression=confirmer&id="+id;
	}
      }
</script>
<style>
table {
	border-collapse: collapse;
	color: #000000;
}
table a {
	color: #FF0099;
}
table a:hover {
	color: #FF3399;
}
table a:visited {
	color: #FF3399;
}
img {
	border: none;
}
</style>
</head>
<body text="#FFFFFF" link="#FFFF66" vlink="#FFFF99" alink="#FFFF99" class="active_bg_image">
<div id="pattern">
  <div id="gradient"><img src="themes/default/img/bg.jpg" id="background_image" alt="" /><br />
    <div align="center">
      <?php
if(isset($_SESSION['prvlg_user']) && ($_SESSION['prvlg_user'] == "sa")){$bloceven="";}else if(isset($_SESSION['prvlg_user']) && ($_SESSION['prvlg_user'] == "a")){$bloceven="";}else{$bloceven="disabled";}
if(isset($_SESSION['prvlg_user']) && ($_SESSION['prvlg_user'] == "sa")){$blocuser="";}else{$blocuser="disabled";}
if(isset($_SESSION['id_user'])){$blocusernoconnect="";}else{$blocusernoconnect="disabled";}?>
      <table style="text-align: left; width: 100%; height: 32px;" border="0" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td width="10%" style="vertical-align: top; text-align: left;"><form>
                <input name="button" type="button" onClick="self.location.href='identification.php?gestion=choixeven'" value="Param&egrave;tres des &eacute;v&egrave;nements" <?php echo $bloceven; ?>>
              </form></td>
            <td width="15%" style="vertical-align: top; text-align: left;"><form>
                <input type="button" value="Param&egrave;tres des utilisateurs" onClick="self.location.href='identification.php?gestion=utilisateurs'" <?php echo $blocuser; ?>>
              </form></td>
            <td width="50%" style="vertical-align: top; text-align: center; color:#FFFFFF;"><p><font size="+2"><strong><u><?php echo $titrecomplet;?> - Personnes</u></strong></font></p></td>
            <td width="20%" style="vertical-align: top; text-align: left;"><form action="identification.php" method="post">
                <select name="changeserv" <?php echo $blocusernoconnect; ?> onChange="this.form.submit()">
                  <option value="newserveur">Nouveau Serveur</option>
                  <option disabled>- -</option>
                  <?php
mysql_select_db($base, $connexion); 
							$rechercheserveur=mysql_query('SELECT * FROM '.$tableparam.' WHERE type="serveur"'); 
								while($datarechercheserveur = dFa($rechercheserveur)){ 
									echo("<option value=\"".$datarechercheserveur['valeur3']."\">".$datarechercheserveur['valeur2']."</option>");
								}?>
                </select>
                <input name="" value="Changer" type="submit" <?php echo $blocusernoconnect; ?>>
              </form></td>
            <td width="10%" style="vertical-align: top; text-align: right;"><form>
                <input type="button" value="D&eacute;connexion" onClick="self.location.href='identification.php?option=deconnexion'" <?php echo $blocusernoconnect; ?>>
              </form></td>
          </tr>
        </tbody>
      </table>
      <br />
      <form action="index.php" method="post" name="cfpage">
        <select name="cspage" onChange="this.form.submit()">
          <option>-- Changer de page --</option>
          <option value="search">Recherche</option>
          <option value="index">Accueil</option>
          <option value="inscription">Inscription</option>
        </select>
      </form>
      <br />
      <form method="get" action="utilisateurs.php">
        <p align="center"><u><strong><font size="+1"><em>Rechercher une personne</em></font></strong></u>
          <input name="mashup" type="text" autofocus>
          <input type="submit" value="Rechercher...">
          &nbsp;&nbsp;
          <input type="button" value="+ de choix" onClick="self.location.href='search.php'">
      </form>
      <?php if(isset($varserv['valeur4'])){?>
      <p> <em>Il y a <?php echo $inscrits_total;?> inscrit(s) pour la soir&eacute;e...</em></p>
      <?php
if(isset($_GET['utilisateur'])){
mysql_select_db($base, $connexion);
	$rechercheutilisateur = mysql_query('SELECT * FROM '.$varserv['valeur4'].' WHERE id="'.$_GET['utilisateur'].'" ORDER BY nom');
		if(dNr($rechercheutilisateur) == 0){ 
		echo ("<p><font color=\"#FF0000\" size=\"+2\">Aucun r&eacute;sultat...</font><br /><br /><br /><font color=\"#FF0000\">Veuillez effectuer une nouvelle recherche<br /><br /><img src=\"themes/default/img/load.gif\" alt=\"Chargement en cours...\"><meta http-equiv=\"refresh\" content=\"3; URL=search.php\"><br /><br />Redirection vers la page de recherches en cours...</font></p>"); 
		}else{ 
	  while($datarechercheutilisateur = dFa($rechercheutilisateur)){
	  	mysql_select_db($base, $connexion);
		$searchstatkivaavekut = mysql_query('SELECT * FROM '.$tableparam.' WHERE type="grade" AND valeur1="'.$datarechercheutilisateur['tarif'].'"');
		$searchstatkivaavekutwhile = dFa($searchstatkivaavekut);
			if(isset($searchstatkivaavekutwhile['valeur5'])){
				if(strlen($searchstatkivaavekutwhile['valeur5']) == "7"){$colortab=" background-color:".$searchstatkivaavekutwhile['valeur5'].";";}else if(strlen($searchstatkivaavekutwhile['valeur5']) == "4"){$colortab=" background-color:".$searchstatkivaavekutwhile['valeur5'].";";}else{$colortab="";}}else{$colortab="";}
		echo("<table style=\"text-align: left; width: 650px; height: 200px; margin-left: auto; margin-right: auto;".$colortab."\" border=\"1\" cellpadding=\"0\" cellspacing=\"1\"><tbody><tr>");
		require("datecouleur.php");
		echo("<td style=\"vertical-align: top; text-align: left;\">".$datarechercheutilisateur['nom']."&nbsp;&nbsp;".$datarechercheutilisateur['prenom']."&nbsp;&nbsp;&nbsp;(identifi&eacute; avec l'id <strong>".$datarechercheutilisateur['id']."</strong>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Né(e) le : ");
	$age=$year-$datarechercheutilisateur['naissance_annee'];
		echo("<font color=\"#".$datecouleur."\">".$datarechercheutilisateur['naissance_jour']."/".$datarechercheutilisateur['naissance_mois']."/".$datarechercheutilisateur['naissance_annee']."</font>");
			echo(" donc a <font color=\"#".$agecouleur."\">".$age."</font> ans cette année.<hr align=\"center\"><center>Ses parents : ".$datarechercheutilisateur['parents']." -|- T&eacute;l&eacute;phone(s) : <strong>".$datarechercheutilisateur['telephone']."</strong></center><table style= \"text-align: left; width: 100%;\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td style=\"vertical-align: top;\">Entr&eacute;(e) : ");
			if($datarechercheutilisateur['rentre']=="1"){
			echo("<font color=\"#008000\">Oui</font>");
			} else {
				if($datarechercheutilisateur['sorti']=="1"){
				echo("<font color=\"#008000\">Oui, pr&eacute;c&eacute;demment...</font>");
				}else{
				echo("<font color=\"#FF0000\">Non d&eacute;clar&eacute;(e)</font>");
				}
			}
		echo("<br /><br />Sorti(e) : ");
			if($datarechercheutilisateur['sorti']=="1" && $datarechercheutilisateur['rentre']=="1"){
			echo("<font color=\"#008000\">Oui</font>, mais veut revenir!");
			} else if($datarechercheutilisateur['sorti']=="1" && $datarechercheutilisateur['rentre']=="0"){
			echo("<font color=\"#008000\">Oui</font>, et ne compte pas revenir...");
			} else {
			echo("<font color=\"#0000FF\">Non d&eacute;clar&eacute;(e) pour sortir...</font>");
			}
		echo("</td><td style=\"vertical-align: top; width: 70%;\"><u>Commentaires </u>:<br />");
		echo $datarechercheutilisateur['commentaires'];
		echo ("<hr align=\"center\">");
		if($varserv['valeur10'] == "1"){
				if($datarechercheutilisateur['psortir'] == "0"){
				echo("<font color=\"#FF0000\">N'a pas l'autorisation de sortir sans accompagnement!</font>");
				} else if($datarechercheutilisateur['psortir'] == "1"){
				echo("<font color=\"#008000\">A l'autorisation de sortir sans accompagnement.</font>");
				} else {}
		}
				echo("<br />");
				if($varserv['valeur9'] == "1"){
				if($datarechercheutilisateur['autorise'] == "1"){
				echo("<font color=\"#008000\">A ramener l'autorisation parentale (sign&eacute;e)</font>");
				}else{
				echo("<font color=\"#FF0000\">N'a pas ramener l'autorisation parentale (sign&eacute;e)</font>");
				}}
		echo("<br /><br /></td></tr></tbody></table>");
		echo ("date d'inscription : ".$datarechercheutilisateur['date']."&nbsp;|&nbsp; Infos prix : ");
				mysql_select_db($base, $connexion);
				$vavoirgrade=sprintf("SELECT * FROM ".$tableparam." WHERE valeur1='".$datarechercheutilisateur['tarif']."' AND type='grade'");
				$requetevavoirgrade = mysql_query($vavoirgrade, $connexion) or die(mysql_error());
				$varvvg = mysql_fetch_assoc($requetevavoirgrade);
				echo (''.$varvvg['valeur4'].'€ ('.$varvvg['valeur3'].')');
		echo("&nbsp;|&nbsp;<a href=\"confirmation.php?confirmer=entrer&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."&ageok=".$age."\"><img src=\"themes/default/img/entrer.png\" height=\"25\" width=\"25\" alt=\"Faire entrer ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp;");
		echo("<a href=\"confirmation.php?confirmer=sortir&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."&psortir=".$datarechercheutilisateur['psortir']."\"><img src=\"themes/default/img/sortir.png\" height=\"25\" width=\"25\" alt=\"Faire sortir ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp");
		echo("<a href=\"confirmation.php?confirmer=parametres&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."\"><img src=\"themes/default/img/param.png\" height=\"25\" width=\"25\" alt=\"Modifier le compte de ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp;");
		echo("<a href=\"#\" onClick=\"confirme('".$datarechercheutilisateur['id']."')\"><img src=\"themes/default/img/delete.png\" height=\"25\" width=\"25\" alt=\"Supprimer le compte de ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>");
		echo("</td>");
		echo("</tr></tbody></table><br />");
		}
		}
} else if(isset($_GET['multinom'])){
	mysql_select_db($base, $connexion);
	$rechercheutilisateur = mysql_query('SELECT id, nom, prenom, parents, naissance_jour, naissance_mois, naissance_annee, telephone, tarif, commentaires, nodeclare, rentre, sorti, psortir, date, autorise FROM '.$varserv['valeur4'].' WHERE nom="'.$_GET['multinom'].'" ORDER BY nom');
		if(dNr($rechercheutilisateur) == 0){ 
		echo ("<p><font color=\"#FF0000\" size=\"+2\">Aucun r&eacute;sultat...</font><br /><br /><br /><font color=\"#FF0000\">Veuillez effectuer une nouvelle recherche<br /><br /><img src=\"themes/default/img/load.gif\" alt=\"Chargement en cours...\"><meta http-equiv=\"refresh\" content=\"3; URL=search.php\"><br /><br />Redirection vers la page de recherches en cours...</font></p>"); 
		}else{ 
	  while($datarechercheutilisateur = dFa($rechercheutilisateur)){
					mysql_select_db($base, $connexion);
		$searchstatkivaavekut = mysql_query('SELECT * FROM '.$tableparam.' WHERE type="grade" AND valeur1="'.$datarechercheutilisateur['tarif'].'"');
		$searchstatkivaavekutwhile = dFa($searchstatkivaavekut);
			if(isset($searchstatkivaavekutwhile['valeur5'])){
				if(strlen($searchstatkivaavekutwhile['valeur5']) == "7"){$colortab=" background-color:".$searchstatkivaavekutwhile['valeur5'].";";}else if(strlen($searchstatkivaavekutwhile['valeur5']) == "4"){$colortab=" background-color:".$searchstatkivaavekutwhile['valeur5'].";";}else{$colortab="";}}else{$colortab="";}
		echo("<table style=\"text-align: left; width: 650px; height: 200px; margin-left: auto; margin-right: auto;".$colortab."\" border=\"1\" cellpadding=\"0\" cellspacing=\"1\"><tbody><tr>");
		require("datecouleur.php");
		echo("<td style=\"vertical-align: top; text-align: left;\">".$datarechercheutilisateur['nom']."&nbsp;&nbsp;".$datarechercheutilisateur['prenom']."&nbsp;&nbsp;&nbsp;(identifi&eacute; avec l'id <strong>".$datarechercheutilisateur['id']."</strong>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Né(e) le : ");
	$age=$variablerds['valeur7']-$datarechercheutilisateur['naissance_annee'];
		echo("<font color=\"".$datecouleur."\">".$datarechercheutilisateur['naissance_jour']."/".$datarechercheutilisateur['naissance_mois']."/".$datarechercheutilisateur['naissance_annee']."</font>");
			echo(" donc a <font color=\"#".$agecouleur."\">".$age."</font> ans cette année.<hr align=\"center\"><center>Ses parents : ".$datarechercheutilisateur['parents']." -|- T&eacute;l&eacute;phone(s) : <strong>".$datarechercheutilisateur['telephone']."</strong></center><table style= \"text-align: left; width: 100%;\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td style=\"vertical-align: top;\">Entr&eacute;(e) : ");
			if($datarechercheutilisateur['rentre']=="1"){
			echo("<font color=\"#008000\">Oui</font>");
			} else {
				if($datarechercheutilisateur['sorti']=="1"){
				echo("<font color=\"#008000\">Oui, pr&eacute;c&eacute;demment...</font>");
				}else{
				echo("<font color=\"#FF0000\">Non d&eacute;clar&eacute;(e)</font>");
				}
			}
		echo("<br /><br />Sorti(e) : ");
			if($datarechercheutilisateur['sorti']=="1" && $datarechercheutilisateur['rentre']=="1"){
			echo("<font color=\"#008000\">Oui</font>, mais veut revenir!");
			} else if($datarechercheutilisateur['sorti']=="1" && $datarechercheutilisateur['rentre']=="0"){
			echo("<font color=\"#008000\">Oui</font>, et ne compte pas revenir...");
			} else {
			echo("<font color=\"#0000FF\">Non d&eacute;clar&eacute;(e) pour sortir...</font>");
			}
		echo("</td><td style=\"vertical-align: top; width: 70%;\"><u>Commentaires </u>:<br />");
		echo $datarechercheutilisateur['commentaires'];
		echo ("<hr align=\"center\">");
						if($varserv['valeur10'] == "1"){
				if($datarechercheutilisateur['psortir'] == "0"){
				echo("<font color=\"#FF0000\">N'a pas l'autorisation de sortir sans accompagnement!</font>");
				} else if($datarechercheutilisateur['psortir'] == "1"){
				echo("<font color=\"#008000\">A l'autorisation de sortir sans accompagnement.</font>");
				} else {}
		}
				echo("<br />");
				if($varserv['valeur9'] == "1"){
				if($datarechercheutilisateur['autorise'] == "1"){
				echo("<font color=\"#008000\">A ramener l'autorisation parentale (sign&eacute;e)</font>");
				}else{
				echo("<font color=\"#FF0000\">N'a pas ramener l'autorisation parentale (sign&eacute;e)</font>");
				}}
		echo("<br /><br /></td></tr></tbody></table>");
		echo ("date d'inscription : ".$datarechercheutilisateur['date']."&nbsp;|&nbsp; Infos prix : ");
				mysql_select_db($base, $connexion);
				$vavoirgrade=sprintf("SELECT * FROM ".$tableparam." WHERE valeur1='".$datarechercheutilisateur['tarif']."' AND type='grade'");
				$requetevavoirgrade = mysql_query($vavoirgrade, $connexion) or die(mysql_error());
				$varvvg = mysql_fetch_assoc($requetevavoirgrade);
				echo (''.$varvvg['valeur4'].'€ ('.$varvvg['valeur3'].')');
		echo("&nbsp;|&nbsp;<a href=\"confirmation.php?confirmer=entrer&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."&ageok=".$age."\"><img src=\"themes/default/img/entrer.png\" height=\"25\" width=\"25\" alt=\"Faire entrer ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp;");
		echo("<a href=\"confirmation.php?confirmer=sortir&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."&psortir=".$datarechercheutilisateur['psortir']."\"><img src=\"themes/default/img/sortir.png\" height=\"25\" width=\"25\" alt=\"Faire sortir ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp");
		echo("<a href=\"confirmation.php?confirmer=parametres&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."\"><img src=\"themes/default/img/param.png\" height=\"25\" width=\"25\" alt=\"Modifier le compte de ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp;");
		echo("<a href=\"#\" onClick=\"confirme('".$datarechercheutilisateur['id']."')\"><img src=\"themes/default/img/delete.png\" height=\"25\" width=\"25\" alt=\"Supprimer le compte de ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>");
		echo("</td>");
		echo("</tr></tbody></table><br />");
		}
		}
		} else if(isset($_GET['multiprenom'])){
mysql_select_db($base, $connexion);
	$rechercheutilisateur = mysql_query('SELECT id, nom, prenom, parents, naissance_jour, naissance_mois, naissance_annee, telephone, tarif, commentaires, nodeclare, rentre, sorti, psortir, date, autorise FROM '.$varserv['valeur4'].' WHERE prenom LIKE "%'.$_GET['multiprenom'].'%" ORDER BY nom');
		if(dNr($rechercheutilisateur) == 0){ 
		echo ("<p><font color=\"#FF0000\" size=\"+2\">Aucun r&eacute;sultat...</font><br /><br /><br /><font color=\"#FF0000\">Veuillez effectuer une nouvelle recherche<br /><br /><img src=\"themes/default/img/load.gif\" alt=\"Chargement en cours...\"><meta http-equiv=\"refresh\" content=\"3; URL=search.php\"><br /><br />Redirection vers la page de recherches en cours...</font></p>"); 
		}else{ 
	  while($datarechercheutilisateur = dFa($rechercheutilisateur)){
					mysql_select_db($base, $connexion);
		$searchstatkivaavekut = mysql_query('SELECT * FROM '.$tableparam.' WHERE type="grade" AND valeur1="'.$datarechercheutilisateur['tarif'].'"');
		$searchstatkivaavekutwhile = dFa($searchstatkivaavekut);
			if(isset($searchstatkivaavekutwhile['valeur5'])){
				if(strlen($searchstatkivaavekutwhile['valeur5']) == "7"){$colortab=" background-color:".$searchstatkivaavekutwhile['valeur5'].";";}else if(strlen($searchstatkivaavekutwhile['valeur5']) == "4"){$colortab=" background-color:".$searchstatkivaavekutwhile['valeur5'].";";}else{$colortab="";}}else{$colortab="";}
		echo("<table style=\"text-align: left; width: 650px; height: 200px; margin-left: auto; margin-right: auto;".$colortab."\" border=\"1\" cellpadding=\"0\" cellspacing=\"1\"><tbody><tr>");
		require("datecouleur.php");
		echo("<td style=\"vertical-align: top; text-align: left;\">".$datarechercheutilisateur['nom']."&nbsp;&nbsp;".$datarechercheutilisateur['prenom']."&nbsp;&nbsp;&nbsp;(identifi&eacute; avec l'id <strong>".$datarechercheutilisateur['id']."</strong>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Né(e) le : ");
	$age=$year-$datarechercheutilisateur['naissance_annee'];
	if($age == "11"){$agecouleur = "008000";} else if($age == "12"){$agecouleur = "008000";} else if($age == "13"){$agecouleur = "008000";} else if($age == "14"){$agecouleur = "008000";} else {$agecouleur = "FF0000";}
			echo("<font color=\"".$datecouleur."\">".$datarechercheutilisateur['naissance_jour']."/".$datarechercheutilisateur['naissance_mois']."/".$datarechercheutilisateur['naissance_annee']."</font>");
			echo(" donc a <font color=\"#".$agecouleur."\">".$age."</font> ans cette année.<hr align=\"center\"><center>Ses parents : ".$datarechercheutilisateur['parents']." -|- T&eacute;l&eacute;phone(s) : <strong>".$datarechercheutilisateur['telephone']."</strong></center><table style= \"text-align: left; width: 100%;\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td style=\"vertical-align: top;\">Entr&eacute;(e) : ");
			if($datarechercheutilisateur['rentre']=="1"){
			echo("<font color=\"#008000\">Oui</font>");
			} else {
				if($datarechercheutilisateur['sorti']=="1"){
				echo("<font color=\"#008000\">Oui, pr&eacute;c&eacute;demment...</font>");
				}else{
				echo("<font color=\"#FF0000\">Non d&eacute;clar&eacute;(e)</font>");
				}
			}
		echo("<br /><br />Sorti(e) : ");
			if($datarechercheutilisateur['sorti']=="1" && $datarechercheutilisateur['rentre']=="1"){
			echo("<font color=\"#008000\">Oui</font>, mais veut revenir!");
			} else if($datarechercheutilisateur['sorti']=="1" && $datarechercheutilisateur['rentre']=="0"){
			echo("<font color=\"#008000\">Oui</font>, et ne compte pas revenir...");
			} else {
			echo("<font color=\"#0000FF\">Non d&eacute;clar&eacute;(e) pour sortir...</font>");
			}
		echo("</td><td style=\"vertical-align: top; width: 70%;\"><u>Commentaires </u>:<br />");
		echo $datarechercheutilisateur['commentaires'];
		echo ("<hr align=\"center\">");
						if($varserv['valeur10'] == "1"){
				if($datarechercheutilisateur['psortir'] == "0"){
				echo("<font color=\"#FF0000\">N'a pas l'autorisation de sortir sans accompagnement!</font>");
				} else if($datarechercheutilisateur['psortir'] == "1"){
				echo("<font color=\"#008000\">A l'autorisation de sortir sans accompagnement.</font>");
				} else {}
		}
				echo("<br />");
				if($varserv['valeur9'] == "1"){
				if($datarechercheutilisateur['autorise'] == "1"){
				echo("<font color=\"#008000\">A ramener l'autorisation parentale (sign&eacute;e)</font>");
				}else{
				echo("<font color=\"#FF0000\">N'a pas ramener l'autorisation parentale (sign&eacute;e)</font>");
				}}
		echo("<br /><br /></td></tr></tbody></table>");
		echo ("date d'inscription : ".$datarechercheutilisateur['date']."&nbsp;|&nbsp; Infos prix : ");
				mysql_select_db($base, $connexion);
				$vavoirgrade=sprintf("SELECT * FROM ".$tableparam." WHERE valeur1='".$datarechercheutilisateur['tarif']."' AND type='grade'");
				$requetevavoirgrade = mysql_query($vavoirgrade, $connexion) or die(mysql_error());
				$varvvg = mysql_fetch_assoc($requetevavoirgrade);
				echo (''.$varvvg['valeur4'].'€ ('.$varvvg['valeur3'].')');
		echo("&nbsp;|&nbsp;<a href=\"confirmation.php?confirmer=entrer&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."&ageok=".$age."\"><img src=\"themes/default/img/entrer.png\" height=\"25\" width=\"25\" alt=\"Faire entrer ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp;");
		echo("<a href=\"confirmation.php?confirmer=sortir&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."&psortir=".$datarechercheutilisateur['psortir']."\"><img src=\"themes/default/img/sortir.png\" height=\"25\" width=\"25\" alt=\"Faire sortir ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp");
		echo("<a href=\"confirmation.php?confirmer=parametres&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."\"><img src=\"themes/default/img/param.png\" height=\"25\" width=\"25\" alt=\"Modifier le compte de ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp;");
		echo("<a href=\"#\" onClick=\"confirme('".$datarechercheutilisateur['id']."')\"><img src=\"themes/default/img/delete.png\" height=\"25\" width=\"25\" alt=\"Supprimer le compte de ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>");
		echo("</td>");
		echo("</tr></tbody></table><br />");
		}
		}
		} else if(isset($_GET['lettresn'])){
mysql_select_db($base, $connexion);
	$rechercheutilisateur = mysql_query("SELECT id, nom, prenom, parents, naissance_jour, naissance_mois, naissance_annee, telephone, tarif, commentaires, nodeclare, rentre, sorti, psortir, date, autorise FROM ".$varserv['valeur4']." WHERE replace(nom,'Ö','O') like '".$_GET['lettresn']."%' OR replace(nom,'Ô','O') like '".$_GET['lettresn']."%' OR replace(nom,'Ä','A') like '".$_GET['lettresn']."%' OR replace(nom,'Â','A') like '".$_GET['lettresn']."%' ORDER BY nom");
		if(dNr($rechercheutilisateur) == 0){ 
		echo ("<p><font color=\"#FF0000\" size=\"+2\">Aucun r&eacute;sultat...</font><br /><br /><br /><font color=\"#FF0000\">Veuillez effectuer une nouvelle recherche<br /><br /><img src=\"themes/default/img/load.gif\" alt=\"Chargement en cours...\"><meta http-equiv=\"refresh\" content=\"3; URL=search.php\"><br /><br />Redirection vers la page de recherches en cours...</font></p>"); 
		}else{ 
	  while($datarechercheutilisateur = dFa($rechercheutilisateur)){
					mysql_select_db($base, $connexion);
		$searchstatkivaavekut = mysql_query('SELECT * FROM '.$tableparam.' WHERE type="grade" AND valeur1="'.$datarechercheutilisateur['tarif'].'"');
		$searchstatkivaavekutwhile = dFa($searchstatkivaavekut);
			if(isset($searchstatkivaavekutwhile['valeur5'])){
				if(strlen($searchstatkivaavekutwhile['valeur5']) == "7"){$colortab=" background-color:".$searchstatkivaavekutwhile['valeur5'].";";}else if(strlen($searchstatkivaavekutwhile['valeur5']) == "4"){$colortab=" background-color:".$searchstatkivaavekutwhile['valeur5'].";";}else{$colortab="";}}else{$colortab="";}
		echo("<table style=\"text-align: left; width: 650px; height: 200px; margin-left: auto; margin-right: auto;".$colortab."\" border=\"1\" cellpadding=\"0\" cellspacing=\"1\"><tbody><tr>");
		require("datecouleur.php");
		echo("<td style=\"vertical-align: top; text-align: left;\">".$datarechercheutilisateur['nom']."&nbsp;&nbsp;".$datarechercheutilisateur['prenom']."&nbsp;&nbsp;&nbsp;(identifi&eacute; avec l'id <strong>".$datarechercheutilisateur['id']."</strong>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Né(e) le : ");
	$age=$year-$datarechercheutilisateur['naissance_annee'];
	if($age == "11"){$agecouleur = "008000";} else if($age == "12"){$agecouleur = "008000";} else if($age == "13"){$agecouleur = "008000";} else if($age == "14"){$agecouleur = "008000";} else {$agecouleur = "FF0000";}
			echo("<font color=\"".$datecouleur."\">".$datarechercheutilisateur['naissance_jour']."/".$datarechercheutilisateur['naissance_mois']."/".$datarechercheutilisateur['naissance_annee']."</font>");
			echo(" donc a <font color=\"#".$agecouleur."\">".$age."</font> ans cette année.<hr align=\"center\"><center>Ses parents : ".$datarechercheutilisateur['parents']." -|- T&eacute;l&eacute;phone(s) : <strong>".$datarechercheutilisateur['telephone']."</strong></center><table style= \"text-align: left; width: 100%;\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td style=\"vertical-align: top;\">Entr&eacute;(e) : ");
			if($datarechercheutilisateur['rentre']=="1"){
			echo("<font color=\"#008000\">Oui</font>");
			} else {
				if($datarechercheutilisateur['sorti']=="1"){
				echo("<font color=\"#008000\">Oui, pr&eacute;c&eacute;demment...</font>");
				}else{
				echo("<font color=\"#FF0000\">Non d&eacute;clar&eacute;(e)</font>");
				}
			}
		echo("<br /><br />Sorti(e) : ");
			if($datarechercheutilisateur['sorti']=="1" && $datarechercheutilisateur['rentre']=="1"){
			echo("<font color=\"#008000\">Oui</font>, mais veut revenir!");
			} else if($datarechercheutilisateur['sorti']=="1" && $datarechercheutilisateur['rentre']=="0"){
			echo("<font color=\"#008000\">Oui</font>, et ne compte pas revenir...");
			} else {
			echo("<font color=\"#0000FF\">Non d&eacute;clar&eacute;(e) pour sortir...</font>");
			}
		echo("</td><td style=\"vertical-align: top; width: 70%;\"><u>Commentaires </u>:<br />");
		echo $datarechercheutilisateur['commentaires'];
		echo ("<hr align=\"center\">");
						if($varserv['valeur10'] == "1"){
				if($datarechercheutilisateur['psortir'] == "0"){
				echo("<font color=\"#FF0000\">N'a pas l'autorisation de sortir sans accompagnement!</font>");
				} else if($datarechercheutilisateur['psortir'] == "1"){
				echo("<font color=\"#008000\">A l'autorisation de sortir sans accompagnement.</font>");
				} else {}
		}
				echo("<br />");
				if($varserv['valeur9'] == "1"){
				if($datarechercheutilisateur['autorise'] == "1"){
				echo("<font color=\"#008000\">A ramener l'autorisation parentale (sign&eacute;e)</font>");
				}else{
				echo("<font color=\"#FF0000\">N'a pas ramener l'autorisation parentale (sign&eacute;e)</font>");
				}}
		echo("<br /><br /></td></tr></tbody></table>");
		echo ("date d'inscription : ".$datarechercheutilisateur['date']."&nbsp;|&nbsp; Infos prix : ");
					mysql_select_db($base, $connexion);
				$vavoirgrade=sprintf("SELECT * FROM ".$tableparam." WHERE valeur1='".$datarechercheutilisateur['tarif']."' AND type='grade'");
				$requetevavoirgrade = mysql_query($vavoirgrade, $connexion) or die(mysql_error());
				$varvvg = mysql_fetch_assoc($requetevavoirgrade);
				echo (''.$varvvg['valeur4'].'€ ('.$varvvg['valeur3'].')');
		echo("&nbsp;|&nbsp;<a href=\"confirmation.php?confirmer=entrer&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."&ageok=".$age."\"><img src=\"themes/default/img/entrer.png\" height=\"25\" width=\"25\" alt=\"Faire entrer ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp;");
		echo("<a href=\"confirmation.php?confirmer=sortir&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."&psortir=".$datarechercheutilisateur['psortir']."\"><img src=\"themes/default/img/sortir.png\" height=\"25\" width=\"25\" alt=\"Faire sortir ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp");
		echo("<a href=\"confirmation.php?confirmer=parametres&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."\"><img src=\"themes/default/img/param.png\" height=\"25\" width=\"25\" alt=\"Modifier le compte de ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp;");
		echo("<a href=\"#\" onClick=\"confirme('".$datarechercheutilisateur['id']."')\"><img src=\"themes/default/img/delete.png\" height=\"25\" width=\"25\" alt=\"Supprimer le compte de ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>");
		echo("</td>");
		echo("</tr></tbody></table><br />");
		}
		}
		} else if(isset($_GET['mashup'])){
			$motboum = preg_split("/[\s,]+/", $_GET['mashup']);
			mysql_select_db($base, $connexion);
	@$ru1 = mysql_query("SELECT id, nom, prenom, parents, naissance_jour, naissance_mois, naissance_annee, telephone, tarif, commentaires, nodeclare, rentre, sorti, psortir, date, autorise FROM ".$varserv['valeur4']." WHERE nom  LIKE '%".$motboum[0]."%' AND prenom LIKE '%".$motboum[1]."%' ORDER BY nom");
	$rechercheutilisateur = $ru1;

				if(dNr($rechercheutilisateur) == 0){ 
				if(@$motboum[1] != ""){
			@$ru3 = mysql_query("SELECT id, nom, prenom, parents, naissance_jour, naissance_mois, naissance_annee, telephone, tarif, commentaires, nodeclare, rentre, sorti, psortir, date, autorise FROM ".$varserv['valeur4']." WHERE nom  LIKE '%".$motboum[1]."%' ORDER BY nom");
		$rechercheutilisateur = $ru3;
		}}
				if(dNr($rechercheutilisateur) == 0){ 
			@$ru4 = mysql_query("SELECT id, nom, prenom, parents, naissance_jour, naissance_mois, naissance_annee, telephone, tarif, commentaires, nodeclare, rentre, sorti, psortir, date, autorise FROM ".$varserv['valeur4']." WHERE id = '".$motboum[0]."' ORDER BY nom");
		$rechercheutilisateur = $ru4;
		}
		if(dNr($rechercheutilisateur) == 0){ 
		}else{
		

	  while($datarechercheutilisateur = dFa($rechercheutilisateur)){
					mysql_select_db($base, $connexion);
		$searchstatkivaavekut = mysql_query('SELECT * FROM '.$tableparam.' WHERE type="grade" AND valeur1="'.$datarechercheutilisateur['tarif'].'"');
		$searchstatkivaavekutwhile = dFa($searchstatkivaavekut);
			if(isset($searchstatkivaavekutwhile['valeur5'])){
				if(strlen($searchstatkivaavekutwhile['valeur5']) == "7"){$colortab=" background-color:".$searchstatkivaavekutwhile['valeur5'].";";}else if(strlen($searchstatkivaavekutwhile['valeur5']) == "4"){$colortab=" background-color:".$searchstatkivaavekutwhile['valeur5'].";";}else{$colortab="";}}else{$colortab="";}
		echo("<table style=\"text-align: left; width: 650px; height: 200px; margin-left: auto; margin-right: auto;".$colortab."\" border=\"1\" cellpadding=\"0\" cellspacing=\"1\"><tbody><tr>");
		require("datecouleur.php");
		echo("<td style=\"vertical-align: top; text-align: left;\">".$datarechercheutilisateur['nom']."&nbsp;&nbsp;".$datarechercheutilisateur['prenom']."&nbsp;&nbsp;&nbsp;(identifi&eacute; avec l'id <strong>".$datarechercheutilisateur['id']."</strong>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Né(e) le : ");
	$age=$year-$datarechercheutilisateur['naissance_annee'];
	if($age == "11"){$agecouleur = "008000";} else if($age == "12"){$agecouleur = "008000";} else if($age == "13"){$agecouleur = "008000";} else if($age == "14"){$agecouleur = "008000";} else {$agecouleur = "FF0000";}
			echo("<font color=\"".$datecouleur."\">".$datarechercheutilisateur['naissance_jour']."/".$datarechercheutilisateur['naissance_mois']."/".$datarechercheutilisateur['naissance_annee']."</font>");
			echo(" donc a <font color=\"#".$agecouleur."\">".$age."</font> ans cette année.<hr align=\"center\"><center>Ses parents : ".$datarechercheutilisateur['parents']." -|- T&eacute;l&eacute;phone(s) : <strong>".$datarechercheutilisateur['telephone']."</strong></center><table style= \"text-align: left; width: 100%;\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td style=\"vertical-align: top;\">Entr&eacute;(e) : ");
			if($datarechercheutilisateur['rentre']=="1"){
			echo("<font color=\"#008000\">Oui</font>");
			} else {
				if($datarechercheutilisateur['sorti']=="1"){
				echo("<font color=\"#008000\">Oui, pr&eacute;c&eacute;demment...</font>");
				}else{
				echo("<font color=\"#FF0000\">Non d&eacute;clar&eacute;(e)</font>");
				}
			}
		echo("<br /><br />Sorti(e) : ");
			if($datarechercheutilisateur['sorti']=="1" && $datarechercheutilisateur['rentre']=="1"){
			echo("<font color=\"#008000\">Oui</font>, mais veut revenir!");
			} else if($datarechercheutilisateur['sorti']=="1" && $datarechercheutilisateur['rentre']=="0"){
			echo("<font color=\"#008000\">Oui</font>, et ne compte pas revenir...");
			} else {
			echo("<font color=\"#0000FF\">Non d&eacute;clar&eacute;(e) pour sortir...</font>");
			}
		echo("</td><td style=\"vertical-align: top; width: 70%;\"><u>Commentaires </u>:<br />");
		echo $datarechercheutilisateur['commentaires'];
		echo ("<hr align=\"center\">");
						if($varserv['valeur10'] == "1"){
				if($datarechercheutilisateur['psortir'] == "0"){
				echo("<font color=\"#FF0000\">N'a pas l'autorisation de sortir sans accompagnement!</font>");
				} else if($datarechercheutilisateur['psortir'] == "1"){
				echo("<font color=\"#008000\">A l'autorisation de sortir sans accompagnement.</font>");
				} else {}
		}
				echo("<br />");
				if($varserv['valeur9'] == "1"){
				if($datarechercheutilisateur['autorise'] == "1"){
				echo("<font color=\"#008000\">A ramener l'autorisation parentale (sign&eacute;e)</font>");
				}else{
				echo("<font color=\"#FF0000\">N'a pas ramener l'autorisation parentale (sign&eacute;e)</font>");
				}}
		echo("<br /><br /></td></tr></tbody></table>");
		echo ("date d'inscription : ".$datarechercheutilisateur['date']."&nbsp;|&nbsp; Infos prix : ");
					mysql_select_db($base, $connexion);
				$vavoirgrade=sprintf("SELECT * FROM ".$tableparam." WHERE valeur1='".$datarechercheutilisateur['tarif']."' AND type='grade'");
				$requetevavoirgrade = mysql_query($vavoirgrade, $connexion) or die(mysql_error());
				$varvvg = mysql_fetch_assoc($requetevavoirgrade);
				echo (''.$varvvg['valeur4'].'€ ('.$varvvg['valeur3'].')');
		echo("&nbsp;|&nbsp;<a href=\"confirmation.php?confirmer=entrer&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."&ageok=".$age."\"><img src=\"themes/default/img/entrer.png\" height=\"25\" width=\"25\" alt=\"Faire entrer ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp;");
		echo("<a href=\"confirmation.php?confirmer=sortir&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."&psortir=".$datarechercheutilisateur['psortir']."\"><img src=\"themes/default/img/sortir.png\" height=\"25\" width=\"25\" alt=\"Faire sortir ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp");
		echo("<a href=\"confirmation.php?confirmer=parametres&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."\"><img src=\"themes/default/img/param.png\" height=\"25\" width=\"25\" alt=\"Modifier le compte de ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp;");
		echo("<a href=\"#\" onClick=\"confirme('".$datarechercheutilisateur['id']."')\"><img src=\"themes/default/img/delete.png\" height=\"25\" width=\"25\" alt=\"Supprimer le compte de ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>");
		echo("</td>");
		echo("</tr></tbody></table><br />");
		}
		}
				@$ru21 = mysql_query("SELECT id, nom, prenom, parents, naissance_jour, naissance_mois, naissance_annee, telephone, tarif, commentaires, nodeclare, rentre, sorti, psortir, date, autorise FROM ".$varserv['valeur4']." WHERE nom  LIKE '%".$motboum[1]."%' AND prenom LIKE '%".$motboum[0]."%' ORDER BY nom");
		$rechercheutilisateur2 = $ru21;
		

		if(dNr($rechercheutilisateur2) == 0){ 
		if(dNr($rechercheutilisateur) == 0){
		echo ("<p><font color=\"#FF0000\" size=\"+2\">Aucun r&eacute;sultat...</font><br /><br /><br /><font color=\"#FF0000\">Veuillez effectuer une nouvelle recherche<br /><br /><img src=\"themes/default/img/load.gif\" alt=\"Chargement en cours...\"><meta http-equiv=\"refresh\" content=\"3; URL=search.php\"><br /><br />Redirection vers la page de recherches en cours...</font></p>");
		}else{}
		}else{ 
		
		while($datarechercheutilisateur = dFa($rechercheutilisateur2)){			
					mysql_select_db($base, $connexion);
		$searchstatkivaavekut = mysql_query('SELECT * FROM '.$tableparam.' WHERE type="grade" AND valeur1="'.$datarechercheutilisateur['tarif'].'"');
		$searchstatkivaavekutwhile = dFa($searchstatkivaavekut);
			if(isset($searchstatkivaavekutwhile['valeur5'])){
				if(strlen($searchstatkivaavekutwhile['valeur5']) == "7"){$colortab=" background-color:".$searchstatkivaavekutwhile['valeur5'].";";}else if(strlen($searchstatkivaavekutwhile['valeur5']) == "4"){$colortab=" background-color:".$searchstatkivaavekutwhile['valeur5'].";";}else{$colortab="";}}else{$colortab="";}
		echo("<table style=\"text-align: left; width: 650px; height: 200px; margin-left: auto; margin-right: auto;".$colortab."\" border=\"1\" cellpadding=\"0\" cellspacing=\"1\"><tbody><tr>");
		require("datecouleur.php");
		echo("<td style=\"vertical-align: top; text-align: left;\">".$datarechercheutilisateur['nom']."&nbsp;&nbsp;".$datarechercheutilisateur['prenom']."&nbsp;&nbsp;&nbsp;(identifi&eacute; avec l'id <strong>".$datarechercheutilisateur['id']."</strong>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Né(e) le : ");
	$age=$year-$datarechercheutilisateur['naissance_annee'];
	if($age == "11"){$agecouleur = "008000";} else if($age == "12"){$agecouleur = "008000";} else if($age == "13"){$agecouleur = "008000";} else if($age == "14"){$agecouleur = "008000";} else {$agecouleur = "FF0000";}
			echo("<font color=\"".$datecouleur."\">".$datarechercheutilisateur['naissance_jour']."/".$datarechercheutilisateur['naissance_mois']."/".$datarechercheutilisateur['naissance_annee']."</font>");
			echo(" donc a <font color=\"#".$agecouleur."\">".$age."</font> ans cette année.<hr align=\"center\"><center>Ses parents : ".$datarechercheutilisateur['parents']." -|- T&eacute;l&eacute;phone(s) : <strong>".$datarechercheutilisateur['telephone']."</strong></center><table style= \"text-align: left; width: 100%;\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td style=\"vertical-align: top;\">Entr&eacute;(e) : ");
			if($datarechercheutilisateur['rentre']=="1"){
			echo("<font color=\"#008000\">Oui</font>");
			} else {
				if($datarechercheutilisateur['sorti']=="1"){
				echo("<font color=\"#008000\">Oui, pr&eacute;c&eacute;demment...</font>");
				}else{
				echo("<font color=\"#FF0000\">Non d&eacute;clar&eacute;(e)</font>");
				}
			}
		echo("<br /><br />Sorti(e) : ");
			if($datarechercheutilisateur['sorti']=="1" && $datarechercheutilisateur['rentre']=="1"){
			echo("<font color=\"#008000\">Oui</font>, mais veut revenir!");
			} else if($datarechercheutilisateur['sorti']=="1" && $datarechercheutilisateur['rentre']=="0"){
			echo("<font color=\"#008000\">Oui</font>, et ne compte pas revenir...");
			} else {
			echo("<font color=\"#0000FF\">Non d&eacute;clar&eacute;(e) pour sortir...</font>");
			}
		echo("</td><td style=\"vertical-align: top; width: 70%;\"><u>Commentaires </u>:<br />");
		echo $datarechercheutilisateur['commentaires'];
		echo ("<hr align=\"center\">");
						if($varserv['valeur10'] == "1"){
				if($datarechercheutilisateur['psortir'] == "0"){
				echo("<font color=\"#FF0000\">N'a pas l'autorisation de sortir sans accompagnement!</font>");
				} else if($datarechercheutilisateur['psortir'] == "1"){
				echo("<font color=\"#008000\">A l'autorisation de sortir sans accompagnement.</font>");
				} else {}
		}
				echo("<br />");
				if($varserv['valeur9'] == "1"){
				if($datarechercheutilisateur['autorise'] == "1"){
				echo("<font color=\"#008000\">A ramener l'autorisation parentale (sign&eacute;e)</font>");
				}else{
				echo("<font color=\"#FF0000\">N'a pas ramener l'autorisation parentale (sign&eacute;e)</font>");
				}}
		echo("<br /><br /></td></tr></tbody></table>");
		echo ("date d'inscription : ".$datarechercheutilisateur['date']."&nbsp;|&nbsp; Infos prix : ");
					mysql_select_db($base, $connexion);
				$vavoirgrade=sprintf("SELECT * FROM ".$tableparam." WHERE valeur1='".$datarechercheutilisateur['tarif']."' AND type='grade'");
				$requetevavoirgrade = mysql_query($vavoirgrade, $connexion) or die(mysql_error());
				$varvvg = mysql_fetch_assoc($requetevavoirgrade);
				echo (''.$varvvg['valeur4'].'€ ('.$varvvg['valeur3'].')');
		echo("&nbsp;|&nbsp;<a href=\"confirmation.php?confirmer=entrer&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."&ageok=".$age."\"><img src=\"themes/default/img/entrer.png\" height=\"25\" width=\"25\" alt=\"Faire entrer ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp;");
		echo("<a href=\"confirmation.php?confirmer=sortir&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."&psortir=".$datarechercheutilisateur['psortir']."\"><img src=\"themes/default/img/sortir.png\" height=\"25\" width=\"25\" alt=\"Faire sortir ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp");
		echo("<a href=\"confirmation.php?confirmer=parametres&id=".$datarechercheutilisateur['id']."&nom=".$datarechercheutilisateur['nom']."&prenom=".$datarechercheutilisateur['prenom']."\"><img src=\"themes/default/img/param.png\" height=\"25\" width=\"25\" alt=\"Modifier le compte de ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>&nbsp;&nbsp;");
		echo("<a href=\"#\" onClick=\"confirme('".$datarechercheutilisateur['id']."')\"><img src=\"themes/default/img/delete.png\" height=\"25\" width=\"25\" alt=\"Supprimer le compte de ".$datarechercheutilisateur['prenom']." ".$datarechercheutilisateur['nom']."\"></a>");
		echo("</td>");
		echo("</tr></tbody></table><br />");
			}
		}
		} else {
echo("<font color=\"#FF0000\" size=\"+2\"><strong>Aucune donnée fournie !!!</strong></font><br /><br /><img src=\"themes/default/img/load.gif\" /><meta http-equiv=\"refresh\" content=\"2; URL=search.php\">");
}
}else{echo("Aucune session de connexion sql envoy&eacute;e !");}
?>
      <form>
        <input type="button" value="Retourner &agrave; l'index..." onClick="self.location.href='index.php'">
      </form>
    </div>
  </div>
</div>
</body>
</html>