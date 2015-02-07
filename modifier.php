<?php
require("connexion.php");
if(isset($_SESSION['idbdd'])){ 
	requete_general($base, $connexion, $tableparam, $_SESSION['idbdd'], $connexion);
	comptage($base, $connexion, $tableparam, $_SESSION['idbdd'], $connexion, $varserv);
	}else{$titrecomplet="UmbrielSystem"; header("Location:identification.php?msg=na");}
?>
<html>
<head>
<title><?php echo $varserv['valeur2'];?> - Modifications</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<link rel="stylesheet" type="text/css" href="img/style.css">
<style>
.Style8 {font-size: 16px;}
.tablo {border-collapse: collapse; background-color: #F0F0F0; color: #000000;}
table a {color: #FF0099;}
table a:hover {color: #FF3399;}
table a:visited {color: #FF3399;}
img {border: none;}
</style>
<?php
if(isset($_GET['typemodif']) && ($_GET['typemodif'] == "inscription")){
$titre="Inscription";
}else if(isset($_POST['typemodif']) && ($_POST['typemodif'] == "enregistrement-inscription")){
$titre="Inscription (enregistrement)";
}else if(isset($_GET['typemodif']) && ($_GET['typemodif'] == "modification")){
$titre="Modifications";
}else if(isset($_POST['typemodif']) && ($_POST['typemodif'] == "enregistrement-modifications")){
$titre="Modifications (enregistrement)";
}else{ $titre="...";
}
?>
<script language="JavaScript" type="text/javascript">
function autosubmit()
   {
   var w = document.cfpage.cspage.selectedIndex;
   var url_add = document.cfpage.cspage.options[w].value;
   window.location.href = url_add;
   }
</script>
</head><body text="#FFFFFF" link="#FFFF66" vlink="#FFFF99" alink="#FFFF99" style="background-color:#749CAC;" <?php if(isset($_GET['typemodif']) && ($_GET['typemodif'] == "inscription")){ echo('onLoad="document.getElementById(\'parentsfocus\').focus();"'); } ?> class="active_bg_image">
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
<td width="50%" style="vertical-align: top; text-align: center;"><p><font size="+2"><strong><u><?php echo $titrecomplet;?> - <?php echo $titre;?></u></strong></font></p></td>
<td width="20%" style="vertical-align: top; text-align: left;"><form action="identification.php" method="post"><select name="changeserv" <?php echo $blocusernoconnect; ?> onChange="this.form.submit()"><option value="newserveur">Nouveau Serveur</option><option disabled>- -</option><?php
mysql_select_db($base, $connexion); 
							$rechercheserveur=mysql_query('SELECT * FROM '.$tableparam.' WHERE type="serveur"'); 
								while($datarechercheserveur = mysql_fetch_array($rechercheserveur)){ 
									echo("<option value=\"".$datarechercheserveur['valeur3']."\">".$datarechercheserveur['valeur2']."</option>");
								}?></select><input name="" value="Changer" type="submit" <?php echo $blocusernoconnect; ?>></form></td>
<td width="10%" style="vertical-align: top; text-align: right;"><form><input type="button" value="D&eacute;connexion" onClick="self.location.href='identification.php?option=deconnexion'" <?php echo $blocusernoconnect; ?>></form></td></tr></tbody></table>
<span style="text-align:center;"><form action="index.php" method="post" name="cfpage"><select name="cspage" onChange="autosubmit()"><option>-- Changer de page --</option><option value="modifier.php?typemodif=inscription">Inscription</option><option value="search.php">Recherche</option><option value="index.php">Accueil</option></select></form></span>
<?php
//Formulaire inscription
if(isset($_GET['typemodif']) && ($_GET['typemodif'] == "inscription")){
	if($varserv['valeur12'] == "0"){$castel="disabled"; $infoincastel="Non requis";}else{ $castel=""; $infoincastel="";}
	if($varserv['valeur11'] == "0"){$casresleg="disabled"; $infoincasresleg="Non requis";}else{ $casresleg=""; $infoincasresleg="";}
	if($varserv['valeur10'] == "0"){$casas="disabled"; $infoincasas="<span style=\"color:#FF0000;\">Non requis</span>";}else{ $casas=""; $infoincasas="";}
	if($varserv['valeur9'] == "0"){$casae="disabled"; $infoincasae="<span style=\"color:#FF0000;\">Non requis</span>";}else{ $casae=""; $infoincasae="";}
	echo('<form action="modifier.php" method="post" name="inscription"><table class="tablo" width="400" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#999999"><tr><td><p><span class="Style8">Nom et pr&eacute;nom des parents<br /></span><span class="Style8">(format :<br /><font size="-1">NOM1 Pr&eacute;nom1, NOM2...)</font></span></p></td><td><input name="parents" value="'.$infoincasresleg.'" type="text" id="parentsfocus" '.$casresleg.'></td></tr><tr><td width="109"><span class="Style8">Nom</span></td>');
	echo('<td width="180"><input name="nom" type="text" id="ndf"></td></tr><tr><td><span class="Style8">Pr&eacute;nom</span></td><td><input name="prenom" type="text"></td></tr><tr><td><p>Ann&eacute;e de naissance*<br />(JJ/MM/AAAA)</p></td>');
	echo('<td><select name="naissancejour"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option>');
	echo('<option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option>');
	echo('<option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option>');
	echo('<option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>&nbsp;<select name="naissancemois"><option value="1">01. Janvier</option><option value="2">02.F&eacute;vrier</option><option value="3">03. Mars</option>');
	echo('<option value="4">04. Avril</option><option value="5">05. Mai</option><option value="6">06. Juin</option><option value="7">07. Juillet</option><option value="8">08. Ao&ucirc;t</option><option value="9">09. Septembre</option><option value="10">10. Octobre</option><option value="11">11. Novembre</option>');
	echo('<option value="12">12. D&eacute;cembre</option></select>&nbsp;<input name="naissanceannee" type="text" size="10" maxlength="4"></td></tr><tr><td><span class="Style8">Sexe</span></td><td><select name="sexe"><option value="F">Fille</option><option value="M">Gar&ccedil;on</option></select></td></tr><tr><td><div align="center">Autoris&eacute;(e) &agrave; sortir par ses propres moyens<br />'.$infoincasas.'</div></td><td><div align="center"><input name="psortir" type="checkbox" value="1" '.$casas.'>');
	echo('</div></td></tr><tr><td height="62"><p><span class="Style8">Num. T&eacute;l&eacute;phone</span><br /><span class="Style8"><font size="-1">(max 2, s&eacute;par&eacute;s par une virgule sans espace)</font></span></p></td><td><input name="telephone" value="'.$infoincastel.'" type="text" '.$castel.'></td></tr><tr><td><span class="Style8">Tarif</span></td><td><select name="tarif">');
	$recherchegradeonserveur=mysql_query('SELECT * FROM '.$tableparam.' WHERE type="grade" AND valeur2="'.$varserv['valeur1'].'"'); 
	$totalgradeonserveur=mysql_num_rows($recherchegradeonserveur);
		while($datarecherchesstat = mysql_fetch_array($recherchegradeonserveur)){
			if($datarecherchesstat['valeur1'] == "8"){$dsboneight = " disabled";}else{$dsboneight="";}
			echo('<option value="'.$datarecherchesstat['valeur1'].'"'.$dsboneight.'>'.$datarecherchesstat['valeur3'].' ('.$datarecherchesstat['valeur4'].'€)</option>');
		}
		if($totalgradeonserveur == "0"){echo('<option disabled>Aucun statut disponible</option>');}else{}
	echo('</select></td></tr><tr><td><div align="center">A rendu son autorisation<br />'.$infoincasae.'</div></td><td><div align="center"><input name="autoriser" type="checkbox" value="1" '.$casae.'></div></td></tr><tr><td><span class="Style8">Commentaire :</span></td><td><textarea name="commentaire" cols="30" rows="5"></textarea></td></tr><tr><td height="50" colspan="2"><div align="center"><font color="#000000">* = champ obligatoire</font><br />');
	echo('<p><input name="typemodif" type="hidden" value="enregistrement-inscription"><input type="submit" name="Submit" value="Ok"><input type="button" value="Annuler" onClick="self.location.href=\'index.php\'"></p></div></td></tr></table></form>');
//Enregistrement de l'inscription
}else if(isset($_POST['typemodif']) && ($_POST['typemodif'] == "enregistrement-inscription")){
	if(isset($_POST['nom']) && ($_POST['prenom']) && ($_POST['naissancejour']) && ($_POST['naissancemois']) && ($_POST['naissanceannee']) && ($_POST['tarif'])){
			mysql_select_db($base, $connexion);
		$did = mysql_query('SELECT id FROM '.$varserv['valeur4'].' ORDER BY id DESC LIMIT 1');
			if(!mysql_num_rows($did)){
				$dinscrit="1";
			} else {
					while($didd = mysql_fetch_array($did)){
						$dernierinscrit = $didd['id'];
						$dinscrit = $dernierinscrit+1;
					}
			}
		if(isset($_POST['autoriser']) && ($_POST['autoriser'] == "1")){$autorise="1";}else{$autorise="0";}
			if(isset($_POST['psortir'])){$pesortir=$_POST['psortir'];} else {$pesortir="0";}
			if(isset($_POST['parents'])){$parents=$_POST['parents'];}else{$parents="0";}
			if(isset($_POST['telephone'])){$telephone=$_POST['telephone'];}else{$telephone="0";}
			$prenom = ucfirst($_POST['prenom']);
			$nom = mb_strtoupper($_POST['nom']);
		$inscription = "INSERT  INTO ".$varserv['valeur4']." (id, nom, prenom, parents, naissance_jour, naissance_mois, naissance_annee, telephone, tarif, commentaires, nodeclare, rentre, sorti, psortir, date, autorise, sexe) VALUES ('".$dinscrit."', '".mysql_real_escape_string($nom)."', '".mysql_real_escape_string($prenom)."', '".mysql_real_escape_string($parents)."', '".$_POST['naissancejour']."', '".$_POST['naissancemois']."', '".$_POST['naissanceannee']."', '".$telephone."', '".$_POST['tarif']."', '".mysql_real_escape_string($_POST['commentaire'])."', '1', '0', '0', '".$pesortir."','".date('j\/m\/Y')."', '".$autorise."', '".$_POST['sexe']."')";
  		$requete = mysql_query($inscription, $connexion) or die( mysql_error() ) ;
  			if($inscription){
				echo("<center><font size=\"6\" color=\"#FF0000\"><BLINK>!!!!!!!!!!</BLINK> R&Eacute;CUP&Eacute;RER L'ARGENT <BLINK>!!!!!!!!!!</BLINK></font></center>");
				echo("Que voulez-vous faire?<br /><br />");
				echo("<form method=\"get\" action=\"actions.php\">");
				echo("<input name=\"action\" type=\"radio\" value=\"entrer\" checked> Faire entrer la personne<br />");
				echo("<input name=\"action\" type=\"radio\" value=\"sortir\"> Faire sortir la personne<br />");
				echo("<input name=\"action\" type=\"radio\" value=\"sortir_re\"> Faire sortir la personne (et qu'elle puisse revenir apr&egrave;s...)<br />");
				echo("<input name=\"id\" type=\"hidden\" value=\"".$dinscrit."\"><input name=\"page\" type=\"hidden\" value=\"inscription\">");
				echo("<input type=\"submit\" name=\"Submit\" value=\"Terminer\"><input name=\"button\" type=\"button\" onClick=\"self.location.href='index.php'\" value=\"Passer\">");
				//<input type=\"button\" value=\"Passer\" onClick=\"self.location.href='utilisateurs.php?utilisateur=".$dinscrit."'\"><input type=\"button\" value=\"Passer\" onClick=\"self.location.href='modifier.php?typemodif=inscription'\">
			} else {
				echo("<font color=\"#FF0000\" size=\"+2\"><strong>Erreur !!<br /><br />Redirection vers la page d'accueil</strong></font><br /><br /><img src=\"img/load.gif\" /><meta http-equiv=\"refresh\" content=\"4; URL=index.php\">");
			}
	} else {
		echo("Un champ est manquant ! <br /><br /><img src=\"img/loaderreur.gif\"><br /><br /><a href\"javascript:history.back()\"></a>");
	}
//Formulaire de modifications
}else if(isset($_GET['typemodif']) && ($_GET['typemodif'] == "modification")){
	if(isset($_GET['id'])){
		if($varserv['valeur12'] == "0"){$castel="disabled";}else{ $castel="";}
		if($varserv['valeur11'] == "0"){$casresleg="disabled";}else{ $casresleg="";}
		if($varserv['valeur10'] == "0"){$casas="disabled"; $infoincasas="<span style=\"color:#FF0000;\">Non requis</span>";}else{ $casas=""; $infoincasas="";}
		if($varserv['valeur9'] == "0"){$casae="disabled"; $infoincasae="<span style=\"color:#FF0000;\">Non requis</span>";}else{ $casae=""; $infoincasae="";}
		//utilisation du sql pour récupérer les infos de la personne concernée avec son "id"
		mysql_select_db($base, $connexion);
		$rechercheprmodifinscrit = mysql_query('SELECT id, nom, prenom, parents, naissance_jour, naissance_mois, naissance_annee, telephone, tarif, commentaires, nodeclare, rentre, sorti, psortir, date, autorise FROM '.$varserv['valeur4'].' WHERE id="'.$_GET['id'].'"');
			while($drpmi = mysql_fetch_array($rechercheprmodifinscrit)){
				//Création du menu déroulant pour le type de paiement
				
					//Création de la case à cocher pour la variable "psortir" 
					if($drpmi['psortir'] == "0"){
					$psortir="";
					} else if($drpmi['psortir'] == "1"){
					$psortir="checked";
					} else {
					$psortir="";
					}
						//Création de la cose à cocher pour la variable "autorise"
						if(isset($drpmi['autorise']) && ($drpmi['autorise'] == "1")){
						$autorisation="checked";
						} else{
						$autorisation="";
						}
		//Affichage du formulaire			
		echo("<form action=\"modifier.php\" method=\"post\"><table class=\"tablo\" width=\"400\" border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"0\" bgcolor=\"#F0F0F0\"><tr><td width=\"109\"><span class=\"Style8\">Nom</span></td>");
		echo("<td width=\"180\"><input name=\"nom\" type=\"text\" value=\"".$drpmi['nom']."\"></td></tr><tr><td><span class=\"Style8\">Pr&eacute;nom</span></td><td><input name=\"prenom\" type=\"text\" value=\"".$drpmi['prenom']."\"></td></tr><tr><ici><td height=\"62\"><p><span class=\"Style8\">Num. T&eacute;l&eacute;phone </span><br /><span class=\"Style8\"><font size=\"-1\">(max 2, s&eacute;par&eacute;s par une virgule sans espace)</font></span></p></td><td><input name=\"telephone\" type=\"text\" value=\"".$drpmi['telephone']."\" ".$castel."></td><ici></tr><tr><td><p><span class=\"Style8\">Nom et pr&eacute;nom des parents </span><span class=\"Style8\">(format :<br /><font size=\"-1\">NOM1 devis, NOM2...)</font></span></p></td><td><input name=\"parents\" type=\"text\" value=\"".$drpmi['parents']."\" ".$casresleg."></td></tr><tr><td><span class=\"Style8\">Ann&eacute;e de naissance<br />(ex : 1997)</span></td>");
		echo("<td><select name=\"naissancejour\"><option value=\"".$drpmi['naissance_jour']."\">".$drpmi['naissance_jour']."</option><option disabled>--</option><option value=\"1\">1</option><option value=\"2\">2</option><option value=\"3\">3</option><option value=\"4\">4</option><option value=\"5\">5</option><option value=\"6\">6</option><option value=\"7\">7</option><option value=\"8\">8</option><option value=\"9\">9</option><option value=\"10\">10</option><option value=\"11\">11</option><option value=\"12\">12</option><option value=\"13\">13</option><option value=\"14\">14</option><option value=\"15\">15</option>");
		echo("<option value=\"16\">16</option><option value=\"17\">17</option><option value=\"18\">18</option><option value=\"19\">19</option><option value=\"20\">20</option><option value=\"21\">21</option><option value=\"22\">22</option><option value=\"23\">23</option><option value=\"24\">24</option><option value=\"25\">25</option><option value=\"26\">26</option><option value=\"27\">27</option><option value=\"28\">28</option><option value=\"29\">29</op");
		echo("tion><option value=\"30\">30</option><option value=\"31\">31</option></select>&nbsp;<select name=\"naissancemois\">");
		echo("<option value=\"".$drpmi['naissance_mois']."\">".$drpmi['naissance_mois']."</option><option disabled>----</option><option value=\"1\">Janvier</option><option value=\"2\">F&eacute;vrier</option><option value=\"3\">Mars</option><option value=\"4\">Avril</option><option value=\"5\">Mai</option><option value=\"6\">Juin</option><option value=\"7\">Juillet</option><option value=\"8\">Ao&ucirc;t</option><option value=\"9\">Septembre</option><option value=\"10\">Octobre</option><option value=\"11\">Novembre</option><option value=\"12\">D&eacute;cembre</option></select>&nbsp;");
		echo("<input name=\"naissanceannee\" type=\"text\" size=\"10\" maxlength=\"4\" value=\"".$drpmi['naissance_annee']."\"></td></tr><tr><td><span class=\"Style8\">tarif</span></td><td><select name=\"tarif\">");
		$recherchegradeonserveur=mysql_query('SELECT * FROM '.$tableparam.' WHERE type="grade" AND valeur2="'.$varserv['valeur1'].'" AND valeur1="'.$drpmi['tarif'].'" ');
		
		$datarecherchesstat = mysql_fetch_array($recherchegradeonserveur);
		echo('<option value="'.$datarecherchesstat['valeur1'].'">'.$datarecherchesstat['valeur3'].' ('.$datarecherchesstat['valeur4'].'€)</option>');
		echo('<option disabled>-- Changer --</option>');
		
		$ttrecherchegradeonserveur=mysql_query('SELECT * FROM '.$tableparam.' WHERE type="grade" AND valeur2="'.$varserv['valeur1'].'"'); 
	$tttotalgradeonserveur=mysql_num_rows($ttrecherchegradeonserveur);
		while($ttdatarecherchesstat = mysql_fetch_array($ttrecherchegradeonserveur)){
			echo('<option value="'.$ttdatarecherchesstat['valeur1'].'">'.$ttdatarecherchesstat['valeur3'].' ('.$ttdatarecherchesstat['valeur4'].'€)</option>');
		}
		if($tttotalgradeonserveur == "0"){echo('<option disabled>Aucun statut disponible</option>');}else{}
	echo('</select></td>');
		echo("</select></td><tr></tr><td><div align=\"center\"><span class=\"Style8\">A rendu son autorisation<br />".$infoincasae."</span></div></td><td>");
		echo("<div align=\"center\"><input name=\"autoriser\" type=\"checkbox\" value=\"1\" ".$autorisation." ".$casae."></div></td><tr></tr><td><div align=\"center\"><span class=\"Style8\">Autoris&eacute;(e) &agrave; sortir par ses propres moyens<br />".$infoincasas."</span></div></td><td><div align=\"center\"><input name=\"psortir\" type=\"checkbox\" value=\"1\" ".$psortir." ".$casas."></div></td><tr></tr><tr><td><span class=\"Style8\">Commentaire :</span></td><td>");
		echo("<div align=\"center\"><textarea name=\"commentaire\" cols=\"20\" rows=\"5\">".$drpmi['commentaires']."</textarea></div></td><tr><td height=\"50\" colspan=\"2\"><div align=\"center\">");
		echo("<input name=\"id\" type=\"hidden\" value=\"".$drpmi['id']."\"><input name=\"typemodif\" type=\"hidden\" value=\"enregistrement-modifications\"><input type=\"submit\" name=\"Submit\" value=\"Ok\"><input type=\"button\" value=\"Annuler\" onclick=\"self.location.href='utilisateurs.php?utilisateur=".$drpmi['id']."'\"></div></td></tr></table></form>");
			}//fin while
	//Si rien de déclaré normalement, on affiche un message d'erreur
	} else {
	echo("<font color=\"#FF0000\" size=\"+2\"><strong>Erreur !!<br /><br />Redirection vers la page de tous les inscrits</strong></font><br /><br /><img src=\"img/load.gif\" /><meta http-equiv=\"refresh\" content=\"4; URL=infos.php?page=inscrites\">");
	}
}else if(isset($_POST['typemodif']) && ($_POST['typemodif'] == "enregistrement-modifications")){
	//Si on trouve les variables en 'post' du formulaire, on traite la demande
	if(isset($_POST['id']) && ($_POST['nom']) && ($_POST['prenom']) && ($_POST['tarif']) && ($_POST['naissancejour'])){
			if(isset($_POST['psortir']) && ($_POST['psortir'] == "1")){$pesortir="1";}else{$pesortir="0";}
			if(isset($_POST['autoriser']) && ($_POST['autoriser'] == "1")){$autoriser="1";}else{$autoriser="0";}
		mysql_select_db($base, $connexion);
		$prenom = mysql_real_escape_string(ucfirst($_POST['prenom']));
			$nom = mb_strtoupper($_POST['nom']);
		$sql=mysql_query('UPDATE '.$varserv['valeur4'].' SET nom="'.mysql_real_escape_string($nom).'", prenom="'.$prenom.'", parents="'.$_POST['parents'].'", naissance_jour="'.$_POST['naissancejour'].'", naissance_mois="'.$_POST['naissancemois'].'", naissance_annee="'.$_POST['naissanceannee'].'", telephone="'.$_POST['telephone'].'", tarif="'.$_POST['tarif'].'", commentaires="'.$_POST['commentaire'].'", psortir="'.$pesortir.'", autorise="'.$autoriser.'" WHERE id = "'.$_POST['id'].'"');
			echo("Modifications en cours...<br /><br /><br /><img src=\"img/load.gif\" \>");
			echo("<meta http-equiv=\"refresh\" content=\"1; URL=utilisateurs.php?utilisateur=".$_POST['id']."\">");
				if($sql){}else{echo("<font color=\"#FF0000\" size=\"+2\"><strong>Erreur !!<br /><br />Redirection vers la page de tous les inscrits</strong></font><br /><br /><img src=\"img/load.gif\" /><meta http-equiv=\"refresh\" content=\"4; URL=infos.php?page=inscrites\">");}
	} else {
		echo("<font color=\"#FF0000\" size=\"+2\"><strong>Erreur !!<br /><br />Redirection vers la page de tous les inscrits</strong></font><br /><br /><img src=\"img/load.gif\" /><meta http-equiv=\"refresh\" content=\"5; URL=index.php\">");
	}
}
?>
</div></div></div>
</body>
</html>