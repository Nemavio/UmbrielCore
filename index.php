<?php
require("connexion.php");
if(isset($_POST['cspage']) && ($_POST['cspage'] == "index")){header('Location:index.php');}else if(isset($_POST['cspage']) && ($_POST['cspage'] == "inscription")){header('Location:modifier.php?typemodif=inscription');}else if(isset($_POST['cspage']) && ($_POST['cspage'] == "search")){header('Location:search.php');}
if(isset($_SESSION['idbdd'])){ 
	requete_general($base, $connexion, $tableparam, $_SESSION['idbdd'], $connexion);
	comptage($base, $connexion, $tableparam, $_SESSION['idbdd'], $connexion, $varserv);
	}else{$titrecomplet="UmbrielSystem"; header("Location:identification.php?msg=na");}
if(isset($_GET['opt']) && ($_GET['opt'] == "plustab")){
?>
<html>
<body bgcolor="#749CAC">
<center>
  <table style="text-align: left; width: 100%;" bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td width="274" style="vertical-align: top;"><p><strong><font color="#00000">Nombre de personnes dans la salle</font></strong></p></td>
        <td width="36" style="vertical-align: top;"><input type="text" size="6" value="<?php echo $requete_rentres;?>" disabled></td>
      </tr>
      <tr>
        <td style="vertical-align: top;"><font color="#00000">Nombre de personnes venues</font></td>
        <td style="vertical-align: top;"><input type="text" size="6" value="<?php echo $personnes_venues;?>" disabled></td>
      </tr>
      <tr>
        <td style="vertical-align: top;"><font color="#00000">Nombre de personnes sorties</font></td>
        <td style="vertical-align: top;"><input type="text" size="6" value="<?php echo $requete_sortis;?>" disabled></td>
      </tr>
      <tr>
        <td style="vertical-align: top;"><font color="#00000">Nombre de personnes non-d&eacute;clar&eacute;es </font></td>
        <td style="vertical-align: top;"><input type="text" size="6" value="<?php echo $requete_nodeclare;?>" disabled></td>
      </tr>
      <tr>
        <td style="vertical-align: top;"><font color="#0000FF"><strong>Nombre total d'inscrits</strong> </font></td>
        <td style="vertical-align: top;"><input type="text" size="6" value="<?php echo $inscrits_total;?>" disabled></td>
      </tr>
      <?php
$rdspapt = dQuery('*', $tableparam, 'type="grade" AND valeur2="'.$_SESSION['idbdd'].'"', 'valeur1');
				while($wrdspapt = dFa($rdspapt)){
					
					
					
				$rnbrusprasd = dQuery('*', $varserv['valeur4'], 'tarif="'.$wrdspapt['valeur1'].'"', 'id');
				
				$nrrnbrusprasd = dNr($rnbrusprasd);
					echo ('<tr><td style="vertical-align: top;"><font color="#0000FF"><img src="themes/default/img/fldroit.png"> '.$wrdspapt['valeur3'].'</font></td><td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="6" value="'.$nrrnbrusprasd.'" disabled></td></tr>');
				}	  
?>
      <tr>
        <td style="vertical-align: top;"><font color="#FF0000"><strong>Nombre d'argent total (pr&eacute;visions)</strong></font></td>
        <td style="vertical-align: top;"><input type="text" size="6" value="<?php echo(''.$argent_total.'€');?>" disabled></td>
      <tr/>
    </tbody>
  </table>
</center>
</body>
</html>
<?php
}else{
?>
<html>
<head>
<title><?php echo $varserv['valeur2'];?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" type="image/x-icon" href="themes/default/img/favicon.ico">
<link rel="stylesheet" type="text/css" href="themes/default/img/style.css">
<link type="text/css" rel="stylesheet" href="themes/default/css/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="themes/default/img/jqueryfancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript" src="themes/default/img/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="themes/default/img/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
			$("#plustab").fancybox({
				'width'				: '65%',
				'height'			: '95%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			
		});
		

		
		
		
		
		$(document).ready(function() {
    $('#gensearch').autocomplete('<?php echo $varserv['valeur1'];?>-autosearch.php');
});

	</script>
<style>
.suite a {
	text-decoration: none;
}
.suite a:hover {
	text-decoration: none;
}
.suite a:visited {
	text-decoration: none;
}
.suite a:active {
	text-decoration: none;
}
</style>
</head>
<body text="#FFFFFF" link="#FFFF66" vlink="#FFFF99" alink="#FFFF99" style="background-color:#749CAC;" onLoad="document.getElementById('gensearch').focus();" class="active_bg_image">
<div id="pattern">
  <div id="gradient"><img src="themes/default/img/bg.jpg" id="background_image" alt="" /><br />
    <div align="center">
      <?php
if(isset($_SESSION['prvlg_user']) && ($_SESSION['prvlg_user'] == "sa")){$bloceven="";}else if(isset($_SESSION['prvlg_user']) && ($_SESSION['prvlg_user'] == "a")){$bloceven="";}else{$bloceven="disabled";}
if(isset($_SESSION['prvlg_user']) && ($_SESSION['prvlg_user'] == "sa")){$blocuser="";}else{$blocuser="disabled";}
if(isset($_SESSION['id_user'])){$blocusernoconnect="";}else{$blocusernoconnect="disabled";}
?>
      <table style="text-align: left; width: 100%; height: 32px;" border="0" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td width="10%" style="vertical-align: top; text-align: left;"><form>
                <input name="button" type="button" onClick="self.location.href='identification.php?gestion=choixeven'" value="Param&egrave;tres des &eacute;v&egrave;nements" <?php echo $bloceven; ?>>
              </form></td>
            <td width="15%" style="vertical-align: top; text-align: left;"><form>
                <input type="button" value="Param&egrave;tres des utilisateurs" onClick="self.location.href='identification.php?gestion=utilisateurs'" <?php echo $blocuser; ?>>
              </form></td>
            <td width="50%" style="vertical-align: top; text-align: center;"><p><font size="+2"><strong><u><?php echo $titrecomplet;?> - Accueil : Infos</u></strong></font></p></td>
            <td width="20%" style="vertical-align: top; text-align: left;"><form action="identification.php" method="post">
                <select name="changeserv" <?php echo $blocusernoconnect; ?> onChange="this.form.submit()">
                  <option value="newserveur">Nouveau Serveur</option>
                  <option disabled>- -</option>
                  <?php
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
      <?php
if(isset($_GET['msg']) && ($_GET['msg'] == "nsok")){ echo('<font color="#008040" size="5"><strong>Votre nouveau serveur "'.$varserv['valeur2'].'" est pr&ecirc;t !</strong></font><br /><br />');}else{}
if(isset($varserv['valeur4'])){
if(isset($_GET['affichage']) && ($_GET['affichage']) == "infos"){
	if((isset($_GET['page'])) && $_GET['page']=='rentrees') {
		echo("<strong><u>Les personnes rentr&eacute;es...(".$requete_rentres.")</u></strong><br />");
			$pr_01 = mysql_query('SELECT prenom, nom, id FROM '.$varserv['valeur4'].' WHERE rentre="1" ORDER BY nom');
				while($datapr_01 = dFa($pr_01)){
					echo ("<a href=\"utilisateurs.php?utilisateur=".$datapr_01['id']."&url=infos.php\">".$datapr_01['nom']."&nbsp;".$datapr_01['prenom']."</a><br />");
				}	  
	}else if((isset($_GET['page'])) && $_GET['page']=='sorties') {
		echo("<strong><u>Les personnes sorties...(".$requete_sortis.")</u></strong><br />");
			$pr_02 = mysql_query('SELECT prenom, nom, id FROM '.$varserv['valeur4'].' WHERE sorti="1" ORDER BY nom');
				while($datapr_02 = dFa($pr_02)){
					echo ("<a href=\"utilisateurs.php?utilisateur=".$datapr_02['id']."&url=infos.php\">".$datapr_02['nom']."&nbsp;".$datapr_02['prenom']."</a><br />");
				}
	}else if((isset($_GET['page'])) && $_GET['page']=='inscrites') {
		echo("<u><strong>Les personnes inscrites...(".$inscrits_total.")</strong></u>");
			$pr_03 = mysql_query('SELECT id, nom, prenom FROM '.$varserv['valeur4'].' ORDER BY nom');
				while($datapr_03 = dFa($pr_03)){
					echo ("<br /><a href=\"utilisateurs.php?utilisateur=".$datapr_03['id']."&url=infos.php\">".$datapr_03['nom']."&nbsp;".$datapr_03['prenom']."</a>");
				}
	}else if((isset($_GET['page'])) && $_GET['page']=='bylettres' && isset($_GET['lettre'])){
		echo("<u><strong>Les personnes...(".$inscrits_total.")</strong></u>");
			$pr_04 = mysql_query("SELECT nom, id, prenom FROM ".$varserv['valeur4']." WHERE replace(nom,'Ö','O') like '".$_GET['lettre']."%' OR replace(nom,'Ô','O') like '".$_GET['lettre']."%' OR replace(nom,'Ä','A') like '".$_GET['lettre']."%' OR replace(nom,'Â','A') like '".$_GET['lettre']."%' ORDER BY nom");
				while($datapr_04 = dFa($pr_04)){
					echo ("<br /><a href=\"utilisateurs.php?utilisateur=".$datapr_04['id']."&url=infos.php\">".$datapr_04['nom']."&nbsp;".$datapr_04['prenom']."</a>");
				}
} else {?>
      <table style="text-align: left; width: 100%; margin-left: auto; margin-right: auto; height: 30px;" border="0" cellpadding="2" cellspacing="1">
        <tbody>
          <tr>
            <td width="439" style="vertical-align: top; text-align: center;"><strong><u>Les 
              personnes rentr&eacute;es...(<?php echo $requete_rentres;?>)</u></strong><br />
              <?php 
	$pr_01 = mysql_query('SELECT prenom, nom, id FROM '.$varserv['valeur4'].' WHERE rentre="1" ORDER BY nom');
		while($datapr_01 = dFa($pr_01)){
			echo ("<a href=\"utilisateurs.php?utilisateur=".$datapr_01['id']."&url=infos.php\">".$datapr_01['nom']."&nbsp;".$datapr_01['prenom']."</a><br />");
		}
?></td>
            <td width="440" style="vertical-align: top; text-align: center;"><strong><u>Les personnes sorties...(<?php echo $requete_sortis;?>)</u></strong><br />
              <?php 
	$pr_02 = mysql_query('SELECT prenom, nom, id FROM '.$varserv['valeur4'].' WHERE sorti="1" ORDER BY nom');
		while($datapr_02 = dFa($pr_02)){
			echo ("<a href=\"utilisateurs.php?utilisateur=".$datapr_02['id']."&url=infos.php\">".$datapr_02['nom']."&nbsp;".$datapr_02['prenom']."</a><br />");
		}
?></td>
          </tr>
        </tbody>
      </table>
      <table style="text-align: left; width: 100%; margin-left: auto; margin-right: auto; height: 32px;" border="0" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td style="vertical-align: top; text-align: center;"><u><strong>Les personnes inscrites...(<?php echo $inscrits_total;?>)</strong></u><br />
              <?php 
	$pr_03 = mysql_query('SELECT id, nom, prenom FROM '.$varserv['valeur4'].' ORDER BY nom');
		while($datapr_03  = dFa($pr_03)){
			echo ("<a href=\"utilisateurs.php?utilisateur=".$datapr_03['id']."&url=infos.php\">".$datapr_03['nom']."&nbsp;".$datapr_03['prenom']."</a><br />");
		}
?></td>
          </tr>
        </tbody>
      </table>
      <?php }?>
      <br />
      <br />
      <br />
      <?php
	if(isset($_GET['url'])){
		echo("<form><input type=\"button\" value=\"Retour\" onclick=\"self.location.href='".$_GET['url']."'\"></form>");
	} else {
		echo("<form><input type=\"button\" value=\"Retourner &agrave; l'index...\" onclick=\"self.location.href='index.php'\"></form>");
	}
}else{?>
      <div id="infos" class="rubrique">
        <table style="text-align: left; width: 310px;" bgcolor="#F0F0F0" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td width="274" style="vertical-align: top;"><p><strong><font color="#00000">Nombre de personnes dans la salle</font></strong></p></td>
              <td width="36" style="vertical-align: top;"><input type="text" size="6" value="<?php echo $requete_rentres;?>" disabled></td>
            </tr>
            <tr>
              <td style="vertical-align: top;"><font color="#00000">Nombre de personnes venues</font></td>
              <td style="vertical-align: top;"><input type="text" size="6" value="<?php echo $personnes_venues;?>" disabled></td>
            </tr>
            <tr>
              <td style="vertical-align: top;"><font color="#00000">Nombre de personnes sorties</font></td>
              <td style="vertical-align: top;"><input type="text" size="6" value="<?php echo $requete_sortis;?>" disabled></td>
            </tr>
            <tr>
              <td style="vertical-align: top;"><font color="#00000">Nombre de personnes non-d&eacute;clar&eacute;es </font></td>
              <td style="vertical-align: top;"><input type="text" size="6" value="<?php echo $requete_nodeclare;?>" disabled></td>
            </tr>
            <tr>
              <td style="vertical-align: top;"><font color="#0000FF"><strong>Nombre total d'inscrits</strong> </font></td>
              <td style="vertical-align: top;"><input type="text" size="6" value="<?php echo $inscrits_total;?>" disabled></td>
            </tr>
            <tr>
              <td style="vertical-align: top;"><font color="#FF0000"><strong>Nombre d'argent total (pr&eacute;visions)</strong></font></td>
              <td style="vertical-align: top;"><input type="text" size="6" value="<?php echo(''.$argent_total.'€');?>" disabled></td>
            </tr>
          </tbody>
        </table>
        </center>
      </div>
      <a id="plustab" class="plustab" href="index.php?opt=plustab">+++</a>
      <hr align="center">
      <table width="100%" border="0">
        <tr>
          <td width="30%" align="left"><form id="formgen">
              <input type="button" value="Inscrire une personne" onClick="self.location.href='modifier.php?typemodif=inscription'">
            </form></td>
          <td width="40%" align="center"><form action="utilisateurs.php" method="get">
              <input name="mashup" type="text" width="75%" size="75%" id="gensearch" class="gensearch" onClick="submit" onKeyPress="13">
              <input name="go" type="submit" id="gogen" value="&gt;&gt;">
            </form></td>
          <td width="30%" align="right"><form>
              <input type="button" value="Rechercher & faire entrer ou sortir une personne" onClick="self.location.href='search.php'">
            </form></td>
        </tr>
      </table>
      <hr align="center">
      <p><font size="+2"><strong><u>Derni&egrave;res entr&eacute;es</u></strong></font></p>
      <table style="text-align: left; width: 100%; margin-left: auto; margin-right: auto; height: 30px;" border="0" cellpadding="2" cellspacing="1">
        <tbody>
          <tr>
            <td width="439" style="vertical-align: top; text-align: center;"><strong><u>Les 5 derni&egrave;res personnes rentr&eacute;es...</u></strong><br />
              <?php 
$pr_01 = mysql_query('SELECT prenom, nom, id FROM '.$varserv['valeur4'].' WHERE rentre="1" ORDER BY id DESC LIMIT 5');
	while($datapr_01 = dFa($pr_01)){
		echo ("<a href=\"utilisateurs.php?utilisateur=".$datapr_01['id']."&url=index.php\">".$datapr_01['prenom']."&nbsp;".$datapr_01['nom']."</a><br />");
	}
	echo("<br /><form><input type=\"button\" value=\"Voir toutes les personnes entr&eacute;es...\" onclick=\"self.location.href='index.php?affichage=infos&page=rentrees&url=index.php'\"></form>");
?></td>
            <td width="440" style="vertical-align: top; text-align: center;"><strong><u>Les 5 derni&egrave;res personnes sorties...</u></strong><br />
              <?php 
	$pr_02 = mysql_query('SELECT prenom, nom, id FROM '.$varserv['valeur4'].' WHERE sorti="1" ORDER BY id DESC LIMIT 5');
	while($datapr_02 = dFa($pr_02)){
		echo ("<a href=\"utilisateurs.php?utilisateur=".$datapr_02['id']."&url=index.php\">".$datapr_02['prenom']."&nbsp;".$datapr_02['nom']."</a><br />");
	}
	echo("<br /><form><input type=\"button\" value=\"Voir toutes les personnes sorties...\" onclick=\"self.location.href='index.php?affichage=infos&page=sorties&url=index.php'\"></form>");
?></td>
          </tr>
        </tbody>
      </table>
      <table style="text-align: left; width: 100%; margin-left: auto; margin-right: auto; height: 32px;" border="0" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td style="vertical-align: top; text-align: center;"><u><strong>Les 5 derni&egrave;res personnes inscrites...</strong></u><br />
              <?php 
$pr_03 = mysql_query('SELECT id, nom, prenom FROM '.$varserv['valeur4'].' ORDER BY id DESC LIMIT 5');
	while($datapr_03  = dFa($pr_03)){
		echo ("<a href=\"utilisateurs.php?utilisateur=".$datapr_03['id']."&url=index.php\">".$datapr_03['prenom']."&nbsp;".$datapr_03['nom']."</a><br />");
	}
		echo("<br /><form><input type=\"button\" value=\"Voir tous les inscrits...\" onclick=\"self.location.href='index.php?affichage=infos&page=inscrites&url=index.php'\"></form>");
?></td>
          </tr>
        </tbody>
      </table>
      <?php }}else{}}?>
    </div>
  </div>
</div>
</body>
</html>
