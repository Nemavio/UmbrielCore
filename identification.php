<?php
  require("connexion.php");
?>
<html><head>
<noscript><center><span style='text-align:center;font-size:14pt;line-height:115%;color:white;background:red;'><font face="Arial, Helvetica, sans-serif">JavaScript est désactivé, veuillez l'activer si vous désirez que l'optimisation de la page soit initialisée!</font></span></center><br/></noscript>
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<link rel="stylesheet" type="text/css" href="img/style.css">
<title>Umbriel System</title>
<script>!window.jQuery && document.write('<script src="img/jquery-1.4.3.min.js"><\/script>');</script>
<script type="text/javascript" src="img/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="img/jqueryfancybox/jquery.fancybox-1.3.4.css" media="screen" />
 <script type="text/javascript">
		$(document).ready(function() {
			$(".changemdp").fancybox({
				'width'				: '65%',
				'height'			: '30%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
});
	</script><div id="divvid"></div><script language="JavaScript" type="text/javascript">
			function changeaffsiscript(){
			var defaut = document.getElementById('menutitle');
			var autre = document.getElementById('divvid');
	
			defaut.style.display = (defaut.style.display == 'none' ? '' : 'none');
			autre.style.display = (autre.style.display == 'none' ? '' : 'none');
			}

			function cachebar(){
			document.body.style.overflow='hidden';
			}
			</script></head><body class="active_bg_image">
              <div id="pattern">

  <div id="gradient"><img src="img/bg.jpg" id="background_image" alt="" /><br />
<?php
  if(isset($_GET['msg'])){}else{if (isset($_SESSION['id_user'])){}else{echo("<meta http-equiv=\"refresh\" content=\"5; URL=identification.php?msg=na\">");}}
  if(isset($_GET['valeurauto'])){}else{
  	echo('<html><head><style> table{ border-collapse:collapse; } </style></head><body text="#FFFFFF" link="#005aff" vlink="#5a94ff" alink="#004edc" style="background-color:#749CAC;">');
			if(isset($_SESSION['prvlg_user']) && ($_SESSION['prvlg_user'] == "sa")){$bloceven="";}else if(isset($_SESSION['prvlg_user']) && ($_SESSION['prvlg_user'] == "a")){$bloceven="";}else{$bloceven="disabled";}
			if(isset($_SESSION['prvlg_user']) && ($_SESSION['prvlg_user'] == "sa")){$blocuser="";}else{$blocuser="disabled";}
			if(isset($_SESSION['id_user'])){$blocusernoconnect="";}else{$blocusernoconnect="disabled";}
					echo('<div id="menutitle"><table style="text-align: left; width: 100%; height: 32px;" border="0" cellpadding="2" cellspacing="2"><tbody><tr><td style="vertical-align: top; text-align: left;" width="10%"><div id="accgeseven"><form><input onclick="self.location.href=\'identification.php?gestion=choixeven\'" value="Paramètres des évènements" type="button" '.$bloceven.'></form></div></td>');
					echo('<td style="vertical-align: top; text-align: left;" width="15%"><div id="accgesusers"><form><input value="Paramètres des utilisateurs" onclick="self.location.href=\'identification.php?gestion=utilisateurs\'" type="button" '.$blocuser.'></form></div></td><td style="vertical-align: top; text-align: center;" width="50%"><div id="titlelogik"><font size="+2"><strong><u>');
          			echo('Umbriel System - Authentification/Param&egrave;trage</u></strong></font></div></td><td style="vertical-align: top; text-align: left;" width="20%"><div id="changeserv"><form action="identification.php" method="post"><select name="changeserv" '.$blocusernoconnect.' onChange="this.form.submit()"><option value="newserveur">Nouveau Serveur</option><option disabled="disabled">- -</option>');
						mysql_select_db($base, $connexion); 
							$rechercheserveur=mysql_query('SELECT * FROM '.$tableparam.' WHERE type="serveur"'); 
								while($datarechercheserveur = mysql_fetch_array($rechercheserveur)){ 
									echo("<option value=\"".$datarechercheserveur['valeur3']."\">".$datarechercheserveur['valeur2']."</option>");
								}
					echo('</select><input name="" value="Changer" type="submit" '.$blocusernoconnect.'></form></div></td><td style="vertical-align: top; text-align: right;" width="10%"><div id="logideconect"><form><input value="Déconnexion" onclick="self.location.href=\'identification.php?option=deconnexion\'" type="button" '.$blocusernoconnect.'></form></div></td></tr></tbody></table><br /></div>');
 }
  if(isset($_POST['login'])){
		$login=$_POST['login'];
		$mdp=hash('sha512', $_POST['pass']);
			mysql_select_db($base, $connexion);
			$requeterl=sprintf("SELECT * FROM ".$tableparam." WHERE valeur4='".$login."' AND valeur5='".$mdp."' AND type='utilisateur'");
			$requeterls1 = mysql_query($requeterl, $connexion) or die(mysql_error());
				$varrl = mysql_fetch_assoc($requeterls1);
				$oprl = mysql_num_rows($requeterls1);
					if(isset($_POST['servbdd'])){
							if($_POST['servbdd'] == "newserveur"){$dir="newserveur";}else{
								mysql_select_db($base, $connexion);
								$requeteserv=sprintf("SELECT * FROM ".$tableparam." WHERE valeur3='".$_POST['servbdd']."' AND type='serveur'");
								$requeteservs1=mysql_query($requeteserv, $connexion) or die(mysql_error());
								$varserv=mysql_fetch_assoc($requeteservs1);
								$opserv=mysql_num_rows($requeteservs1);
								}
						if($oprl){
							$_SESSION['id_user'] = $varrl['valeur1'];
							$_SESSION['nom_user'] = $varrl['valeur2'];
							$_SESSION['prenom_user'] = $varrl['valeur3'];
							$_SESSION['login_user'] = $varrl['valeur4'];
							$_SESSION['mdp_user'] = $varrl['valeur5'];
							$_SESSION['prvlg_user'] = $varrl['valeur6'];
							$_SESSION['timeout']=time();
						if($_POST['servbdd'] == "newserveur"){$dir="newserveur";}else{
							$_SESSION['idbdd'] = $varserv['valeur1'];
						}
							 echo("<script language=\"JavaScript\" type=\"text/javascript\">");
							 echo("if(document.images)");
							 echo("{");
							 echo("i1 = new Image();");
							 echo("i1.src = \"img/delete.png\";");
							 echo("i2 = new Image();");
							 echo("i2.src = \"img/entrer.png\";");
							 echo("i3 = new Image();");
							 echo("i3.src = \"img/load.gif\";");
							 echo("i4 = new Image();");
							 echo("i4.src = \"img/loaderreur.gif\";");
							 echo("i5 = new Image();");
							 echo("i5.src = \"img/param.png\";");
							 echo("i6 = new Image();");
							 echo("i6.src = \"img/sortir.png\";");
							 echo("}");
							 echo("</script>");
								echo("<center><img src=\"img/us-logo.gif\" width=\"720\" height=\"439\"><br /><br /><br /><img src=\"img/load-connect.gif\"></center>");
								if(isset($dir) && ($dir == "newserveur")){
									echo("<meta http-equiv=\"refresh\" content=\"9; URL=identification.php?option=newserveur\">");
								}else{
									echo("<meta http-equiv=\"refresh\" content=\"9; URL=identification.php?option=ok\">");
								}
						}else{
							echo("<meta http-equiv=\"refresh\" content=\"0; URL=identification.php?msg=erreur\">");
						}
					}else{
						echo("<meta http-equiv=\"refresh\" content=\"0; URL=identification.php?msg=erreur\">");
					}
				}else if(isset($_GET['option']) && ($_GET['option'] == "deconnexion")){
		session_unset();
		echo("<meta http-equiv=\"refresh\" content=\"0; URL=identification.php?msg=gb\">");
	}else if(isset($_GET['option']) && ($_GET['option'] == "newserveur")){
		if(isset($_SESSION['id_user']) && ($_SESSION['prvlg_user'])){
			if($_SESSION['prvlg_user'] == "sa" || $_SESSION['prvlg_user'] == "a"){
					$varta='<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option>
<option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option>
<option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option>
<option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option><option value="101">101</option><option value="102">102</option><option value="103">103</option><option value="104">104</option><option value="105">105</option><option value="106">106</option><option value="107">107</option><option value="108">108</option><option value="109">109</option><option value="110">110</option><option value="111">111</option><option value="112">112</option><option value="113">113</option><option value="114">114</option><option value="115">115</option><option value="116">116</option><option value="117">117</option><option value="118">118</option><option value="119">119</option><option value="120">120</option>';
?>
<table style="text-align: center; width: 100%; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">
<tbody><tr><td style="vertical-align: top; text-align: left;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=choixeven'" value="Retour">
</td><td style="vertical-align: top; text-align: right;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=choixeven&type=evenements'" value="G&eacute;rer les &eacute;v&eacute;nements">
</td><td style="vertical-align: top; text-align: right;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=choixeven&type=suppreven'" value="Supprimer un &eacute;v&eacute;nement">
</td></tr></tbody></table><br /><?php
echo('<center><form action="identification.php" method="post"><table width="720" border="1" align="center" cellpadding="5" cellspacing="0" bgcolor="#999999" style="text-align : center;"><tr>');
echo('<td width="381"><strong>Nom du nouvel &eacute;v&egrave;nement</strong></td><td width="319"><input name="nomserveur" type="text"></td></tr><tr><td width="381"><strong>Date de l\'&eacute;v&egrave;nement</strong></td>');
echo('<td width="319"><select name="datejour"><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>');
echo('<select name="datemois"><option value="01">Janvier</option><option value="02">F&eacute;vrier</option><option value="03">Mars</option><option value="04">Avril</option><option value="05">Mai</option><option value="06">Juin</option><option value="07">Juillet</option><option value="08">Ao&ucirc;t</option><option value="09">Septembre</option><option value="10">Octobre</option><option value="11">Novembre</option><option value="12">D&eacute;cembre</option></select>');
echo('<input name="dateannee" type="text" size="2"  maxlength="4" value="2013"></td></tr><tr><td><strong>Nombre de personnes max. (&quot;0&quot; pour illimit&eacute;)</strong></td>');
echo('<td><input name="personnesmax" type="text" width="50"> personne(s)</td></tr><tr><td><strong>Tranche d\'&acirc;ge</strong></td><td>&Agrave; partir de&nbsp;<select name="ta1">'.$varta.'</select>&nbsp;ans, Jusqu\'&agrave;&nbsp;<select name="ta2">'.$varta.'</select>&nbsp;ans.<tr><td><strong>Tarif (vous pourrez, par la suite, en ajouter dans le menu &quot;Param&egrave;tres&quot; de l\'&eacute;v&egrave;nement)</strong></td>');
echo('<td>Nom du statut <input name="tarifgrade" type="text"><br />Tarif du statut <input name="tarifgrade" type="text" width="50">&euro;</td></tr><tr><td><strong>Demander une autorisation parentale pour venir ?</strong></td>');
echo('<td><input type="checkbox" name="demandeautorisationvenir" value="1"></td></tr><tr><td><strong>Demander une autorisation parentale pour sortir par ses propres moyens ?</strong></td><td><input type="checkbox" name="demandeautorisationsortir" value="1"></td>');
echo('</tr><tr><td><strong>Demander le(s) nom(s) du/des responsable(s) l&eacute;gal/l&eacute;gaux ?</strong></td><td><input type="checkbox" name="demandenomsparents" value="1"></td></tr><tr><td><strong>Demander un ou plusieurs num&eacute;ros de t&eacute;l&eacute;phone');
echo('?</strong></td><td><input type="checkbox" name="telephone" value="1"></td></tr><tr><td height="30" colspan="2"><input name="Input" type="submit" value="Cr&eacute;er"><input type="button" value="Annuler" onclick="self.location.href=\'identification.php?gestion=choixeven\'"></td></tr></table></form></center>');
			}else{
			}
		}
	}else if(isset($_POST['datejour']) && ($_POST['datemois'])){
		if(isset($_POST['nomserveur']) && ($_POST['dateannee'])){
		if(isset($_POST['personnesmax']) && ($_POST['personnesmax'] == "")){ $postpersonnesmax = "0";}else{$postpersonnesmax = $_POST['personnesmax']; }
				function enlevecaracteres($chaine){ 
  				$chaine = strtr($chaine,  "/\@&ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñABCDEFGHIJKLMNOPQRSTUVWXYZ~\"#'{([-|`_^]°]+}=¨^£$%µ*§!:;¤.,?><()",  "  a aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynnabcdefghijklmnopqrstuvwxyz0000000000000000000000000000000000000"); 
  				return $chaine; 
  				} 
					$nsc=enlevecaracteres($_POST['nomserveur']);
					$nscse=str_replace(' ','',$nsc);
					$tableserveur="us_event_".$nscse."";
			mysql_select_db($base, $connexion);
			$recherchesqlexist = mysql_query('SELECT * FROM '.$tableparam.' WHERE valeur3="'.$nscse.'"');
				if(!mysql_num_rows($recherchesqlexist)){
					mysql_select_db($base, $connexion);
					$recherchetablesqlexist = mysql_query('SELECT * FROM '.$tableparam.' WHERE valeur4="'.$tableserveur.'"');
						if(!mysql_num_rows($recherchetablesqlexist)){
						mysql_select_db($base, $connexion);
						$rechercheidserveur = mysql_query('SELECT valeur1 FROM '.$tableparam.' WHERE type="serveur" ORDER BY valeur1 DESC LIMIT 1');
								$risb = 0;
							do{
								$risb++;
								mysql_select_db($base, $connexion);
								$nbrofevensearch = mysql_query('SELECT * FROM '.$tableparam.' WHERE type="serveur" AND valeur1="'.$risb.'"');
								$nbrofevensearchnr = mysql_num_rows($nbrofevensearch);
							}while ($nbrofevensearchnr > 0);
								$idserveur = $risb;
							if(isset($_GET['demandeautorisationvenir']) && ($_GET['demandeautorisationvenir'] == "1")){$demandeautorisationvenir="1";}else{$demandeautorisationvenir="0";}
							if(isset($_GET['demandeautorisationsortir']) && ($_GET['demandeautorisationsortir'] == "1")){$demandeautorisationsortir="1";}else{$demandeautorisationsortir="0";}
							if(isset($_GET['demandenomsparents']) && ($_GET['demandenomsparents'] == "1")){$demandenomsparents="1";}else{$demandenomsparents="0";}
							if(isset($_GET['telephone']) && ($_GET['telephone'] == "1")){$telephone="1";}else{$telephone="0";}
					
					
					mysql_select_db($base, $connexion);
					$nouveauevenserveursql=mysql_query("CREATE TABLE if not exists `".$tableserveur."` (`id` int(10) NOT NULL auto_increment, `nom` text NOT NULL, `prenom` text NOT NULL, `parents` text NOT NULL, `naissance_jour` varchar(2) NOT NULL, `naissance_mois` varchar(2) NOT NULL, `naissance_annee` varchar(4) NOT NULL, `telephone` varchar(21) NOT NULL, `tarif` varchar(255) NOT NULL, `commentaires` text NOT NULL, `nodeclare` varchar(1) NOT NULL, `rentre` varchar(1) NOT NULL, `sorti` varchar(1) NOT NULL, `psortir` varchar(1) NOT NULL, `date` varchar(10) NOT NULL, `autorise` varchar(1) NOT NULL, `sexe` varchar(1) NOT NULL, PRIMARY KEY (`id`)) ENGINE=MyISAM DEFAULT CHARSET=latin1");
						if(!$nouveauevenserveursql){
 							echo("Une erreur est survenue pendant la cr&eacute;ation de la table ".$tableserveur." dans la base SQL. Veuillez contacter la personne responsable du syst&egrave;me.");
								}else{
									$nomserveursecure = mysql_real_escape_string($_POST['nomserveur']);
									mysql_select_db($base, $connexion);
									$nouveauevenserveur = mysql_query("INSERT  INTO ".$tableparam." (type, valeur1, valeur2, valeur3, valeur4, valeur5, valeur6, valeur7, valeur8, valeur9, valeur10, valeur11, valeur12, valeur13, valeur14, valeur15, valeur16, valeur17, valeur18, valeur19, valeur20) VALUES ('serveur', '".$idserveur."', '".$nomserveursecure."', '".$nscse."', '".$tableserveur."', '".$_POST['datejour']."', '".$_POST['datemois']."', '".$_POST['dateannee']."', '".$postpersonnesmax."', '".$demandeautorisationvenir."', '".$demandeautorisationsortir."', '".$demandenomsparents."', '".$telephone."', '".$_POST['ta1']."', '".$_POST['ta2']."', '', '', '', '', '', '')");
 										if(!$nouveauevenserveur){
											echo("Une erreur est survenue pendant l'insertion des param&egrave;tres du nouvel &eacute;v&egrave;nement dans la table ".$tableparam." de la base SQL. Veuillez contacter la personne responsable du syst&egrave;me.<br />");
											echo mysql_error() ;
										}else{
											$_SESSION['idbdd'] = $idserveur;				
												echo("<meta http-equiv=\"refresh\" content=\"0; URL=index.php?msg=nsok\">"); 
										}
						}
						}else{ 
							}
      					  	}else{
				}
		}else{
			if(empty($_POST['nomserveur'])){$mnomserveur="<font color=\"#FF8040\">\"Nom du nouveau &eacute;v&egrave;nement (Serveur)\",&nbsp;</font>";}else{$mnomserveur="";}
			if(empty($_POST['dateannee'])){$mdateannee="<font color=\"#008000\">\"Date de l'&eacute;v&egrave;nement\" (champ \"année\"),&nbsp;</font>";}else{$mdateannee="";}
			if(empty($_POST['ta1'])){$ta1="<font color=\"#FF00FF\">\"Tranche d'&acirc;ge (champ \"&Agrave; partir de\")\",&nbsp;</font>";}else{$ta1="";}
			if(empty($_POST['ta2'])){$ta2="<font color=\"#8000FF\">\"Tranche d'&acirc;ge (champ \"Jusqu'&agrave;\")\",&nbsp;</font>";}else{$ta2="";}
			echo('<center>Vous avez oubli&eacute; de mentionner le(s) champ(s) '.$mnomserveur.''.$mdateannee.''.$ta1.''.$ta2.'!<br /><br /><form><input type="button" value="Rectifier" onclick="self.location.href=\'javascript:history.go(-1)\'"></form></center>');
		}
	}else if(isset($_GET['gestion']) && ($_GET['gestion'] == "utilisateurs")){
		if(isset($_GET['type']) && ($_GET['type'] == "glu")){
			mysql_select_db($base, $connexion);
				$tlu = mysql_query('SELECT valeur1, valeur2, valeur3, valeur4, valeur5, valeur6, valeur7, valeur8, valeur9, valeur10, valeur11, valeur12, valeur13, valeur14, valeur15 FROM '.$tableparam.' WHERE type="utilisateur" ORDER BY valeur1');
				if(isset($_GET['modiffaite']) && ($_GET['modiffaite'] == "creation")){ echo('<span id="messages"><div class="ok"><ul>Cr&eacute;ation du nouvel utilisateur effectu&eacute;e avec succ&egrave;s!</ul></div></span><br />'); }else if(isset($_GET['modiffaite']) && ($_GET['modiffaite'] == "modification")){ echo('<span id="messages"><div class="ok"><ul>Modification de l\'utilisateur effectu&eacute;e avec succ&egrave;s!</ul></div></span><br />'); }else if(isset($_GET['modiffaite']) && ($_GET['modiffaite'] == "suppression")){ echo('<span id="messages"><div class="ok"><ul>Suppression de l\'utilisateur effectu&eacute;e avec succ&egrave;s!</ul></div></span><br />'); } ?>
				<table style="text-align: center; width: 100%; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">
<tbody><tr><td style="vertical-align: top; text-align: left;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=utilisateurs'" value="Retour">
</td><td style="vertical-align: top; text-align: right;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=utilisateurs&type=auu'" value="Cr&eacute;er un nouvel utilisateur">
</td><td style="vertical-align: top; text-align: right;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=utilisateurs&type=suu'" value="Supprimer un utilisateur">
</td></tr></tbody></table><br /><?php
					if(mysql_num_rows($tlu) == 0){ 
						echo ("<p>Une erreur critique est survenue !</p>"); 
					}else{ 
						echo("<center><table style=\"text-align: center; width: 90%; color: #000000;\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#EEEEEE\"><tbody><tr>");
						echo("<td style=\"vertical-align: center;\"><strong><u>Id</u></strong></td>");
						echo("<td style=\"vertical-align: center;\"><strong><u>Nom</u></strong></td>");
						echo("<td style=\"vertical-align: center;\"><strong><u>Pr&eacute;nom</u></strong></td>");
						echo("<td style=\"vertical-align: center;\"><strong><u>Identifiant</u></strong></td>");
						echo("<td style=\"vertical-align: center;\"><strong><u>Privil&egrave;ge</u></strong></td>");
						echo("<td style=\"vertical-align: center;\">&nbsp;</td>");
						echo("<td style=\"vertical-align: center;\">&nbsp;</td>");
							while($wtlu = mysql_fetch_array($tlu)){
									if(isset($_GET['idnewuser']) && ($_GET['idnewuser'] == $wtlu['valeur1'])){$colorcell = "background-color:#CACACA;";}else{$colorcell="";}
								echo("<tr><td style=\"vertical-align: center; ".$colorcell."\">".$wtlu['valeur1']."</td>");
								echo("<td style=\"vertical-align: center; ".$colorcell."\">".$wtlu['valeur2']."</td>");
								echo("<td style=\"vertical-align: center; ".$colorcell."\">".$wtlu['valeur3']."</td>");
								echo("<td style=\"vertical-align: center; ".$colorcell."\">".$wtlu['valeur4']."</td>");
									if($wtlu['valeur6'] == "sa"){$prvlg="SuperAdmin";}else if($wtlu['valeur6'] == "a"){$prvlg="Administrateur";}else if($wtlu['valeur6'] == "u"){$prvlg="Utilisateur";}else if($wtlu['valeur6'] == "i"){$prvlg="Invit&eacute;";}else{$prvlg="Aucun droit assign&eacute;!";}
								echo("<td style=\"vertical-align: center; ".$colorcell."\">".$prvlg."</td>");
								echo("<td style=\"vertical-align: center; ".$colorcell."\"><a href=\"identification.php?gestion=utilisateurs&type=auu&act=modif&id=".$wtlu['valeur1']."\"><img src=\"img/param.png\"></a></td>");
								echo("<td style=\"vertical-align: center; ".$colorcell."\"><a href=\"identification.php?415bgfnjhjyj4gfh842666fgfdg45hfgh84tttthhhhhh115666yt6d8888888888seeeef444487yjt77jop41m41hvj=".$wtlu['valeur1']."\"><img src=\"img/delete.png\"></a></td></tr>");
							}
						echo("</tr></tbody></table></center>");
					}			
		}else if(isset($_GET['type']) && ($_GET['type'] == "auu")){
			if(isset($_GET['act']) && ($_GET['act'] == "modif")){
				if(isset($_GET['id'])){
					mysql_select_db($base, $connexion);
					$requetesearchutilisystem=sprintf("SELECT * FROM ".$tableparam." WHERE valeur1='".$_GET['id']."' AND type='utilisateur'");
					$requeteservs1searchutilisystem=mysql_query($requetesearchutilisystem, $connexion) or die(mysql_error());
					$varservsearchutilisystem=mysql_fetch_assoc($requeteservs1searchutilisystem);
					$opservsearchutilisystem=mysql_num_rows($requeteservs1searchutilisystem);?>
						<table style="text-align: center; width: 100%; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">
						<tbody><tr><td style="vertical-align: top; text-align: left;">
						<input name="" type="button" onClick="self.location.href='identification.php?gestion=utilisateurs&type=glu'" value="Retour">
						</td><td style="vertical-align: top; text-align: right;">
						<input name="" type="button" onClick="self.location.href='identification.php?gestion=utilisateurs&type=auu'" value="Cr&eacute;er un nouvel utilisateur">
						</td><td style="vertical-align: top; text-align: right;">
						<input name="" type="button" onClick="self.location.href='identification.php?gestion=utilisateurs&type=suu'" value="Supprimer un utilisateur">
						</td></tr></tbody></table><br /><?php
					echo('<form action="identification.php" method="post" name="modifuser" id="modifuser"><input name="id" type="hidden" value="'.$_GET['id'].'"><input name="modifverifuser" type="hidden" value="csa"><table width="500" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#eeeeee" style="text-align: center; color:#000000;"><tr><td width="100">Identifiant</td><td width="150">');
					echo('<input name="login-identificateurmodification" type="text" id="login-identificateurmodification" value="'.$varservsearchutilisystem['valeur4'].'"></td></tr><tr><td>Mot de passe</td><td><a href="identification.php?gestion=utilisateurs&type=auu&act=modifpass&id='.$_GET['id'].'" class="changemdp">Changer le mot de passe</a></td></tr>');
					echo('<tr><td>Nom</td><td><input name="nom" type="text" id="nom" value="'.$varservsearchutilisystem['valeur2'].'"></td></tr><tr><td>Pr&eacute;nom</td><td><input name="prenom" type="text" id="prenom" value="'.$varservsearchutilisystem['valeur3'].'"></td></tr><tr><td>Privil&egrave;ge</td><td><select name="privilege" id="privilege">');
						if($varservsearchutilisystem['valeur6'] == "sa"){
							echo('<option value="sa">Super Administrateur (Acc&egrave;s total)</option><option value="a">Administrateur (G&egrave;re tout sauf la gestion des utilisateurs)</option><option value="u">Utilisateur (N\'a aucun droit sur le param&egrave;trage)</option><option value="i">Invit&eacute; (Lecture seule)</option>');
						}else if($varservsearchutilisystem['valeur6'] == "a"){
							echo('<option value="a">Administrateur (G&egrave;re tout sauf la gestion des utilisateurs)</option><option value="u">Utilisateur (N\'a aucun droit sur le param&egrave;trage)</option><option value="i">Invit&eacute; (Lecture seule)</option><option value="sa">Super Administrateur (Acc&egrave;s total)</option>');
						}else if($varservsearchutilisystem['valeur6'] == "u"){
							echo('<option value="u">Utilisateur (N\'a aucun droit sur le param&egrave;trage)</option><option value="i">Invit&eacute; (Lecture seule)</option><option value="sa">Super Administrateur (Acc&egrave;s total)</option><option value="a">Administrateur (G&egrave;re tout sauf la gestion des utilisateurs)</option>');
						}else if($varservsearchutilisystem['valeur6'] == "i"){
							echo('<option value="i">Invit&eacute; (Lecture seule)</option><option value="sa">Super Administrateur (Acc&egrave;s total)</option><option value="a">Administrateur (G&egrave;re tout sauf la gestion des utilisateurs)</option><option value="u">Utilisateur (N\'a aucun droit sur le param&egrave;trage)</option>');
						}else{
							echo('<option value="i">Invit&eacute; (Lecture seule)</option><option value="sa">Super Administrateur (Acc&egrave;s total)</option><option value="a">Administrateur (G&egrave;re tout sauf la gestion des utilisateurs)</option><option value="u">Utilisateur (N\'a aucun droit sur le param&egrave;trage)</option>');
						}
					echo('</select></td></tr><tr><td height="50" colspan="2"><div align="center"><p><input type="submit" name="Submit" value="Modifier l\'utilisateur"><input value="Annuler" onclick="self.location.href=\'identification.php?gestion=utilisateurs&type=glu\'" type="button" >');
					echo('</p></div></td></tr></table></form>');
			}}else if(isset($_GET['act']) && ($_GET['act'] == "modifpass")){
			// Zone de changement mot de passe utilisateur 
			?><script language="JavaScript" type="text/javascript">
			cachebar();
			changeaffsiscript();
			</script><?php
			if(isset($_GET['id'])){
				mysql_select_db($base, $connexion);
					$rekchangemdpus=sprintf("SELECT * FROM ".$tableparam." WHERE valeur1='".$_GET['id']."' AND type='utilisateur'");
					$rekserv1changemdpus=mysql_query($rekchangemdpus, $connexion) or die(mysql_error());
					$varservchangemdpus=mysql_fetch_assoc($rekserv1changemdpus);
					$opservchangemdpus=mysql_num_rows($rekserv1changemdpus);
					if($opservchangemdpus > "0"){
					if($varservchangemdpus['valeur6'] == "sa"){
						if($varservchangemdpus['valeur1'] == $_SESSION['id_user']){}else{
						$superadminorno = "yes";
						echo('<span id="messages"><div class="alert"><ul>Attention, vous ne pouvez pas modifier le mot de passe d\'un super administrateur sans son autorisation.<br />De ce fait, vous pouvez lui en attribuer un secondaire, mais il pourrait dans tous les cas garder l\'ancien.</ul></div></span><br />'); }}
			if(isset($_GET['nbr']) && ($_GET['nbr'] == "bcl")){echo('<span id="messages"><div class="infos"><ul>Attention, vous devez recommencer le changement du mot de passe depuis le d&eacute;but !</ul></div></span><br />');}
			echo('<form action="identification.php" method="post" name="modifusersystem"><center><table style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; background-color:#EEEEEE; color:black;" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align: top; text-align: center;">Nouveau Mot de Passe pour '.$varservchangemdpus['valeur3'].'&nbsp;'.$varservchangemdpus['valeur2'].' ('.$varservchangemdpus['valeur4'].') --></td><td style="vertical-align: top; text-align: center;"><input name="modifusersystempass" type="password"></td></tr><tr><td width="100%"><input name="modifusersystemid" type="hidden" value="'.$varservchangemdpus['valeur1'].'">');
			if(isset($superadminorno) && ($superadminorno == "yes")){
			echo('<input name="" type="submit" value="Faire une proposition de modification de mot de passe">');
			}else{
			echo('<input name="" type="submit" value="Modifier le mot de passe">');}
			echo('</td></tr></table></center></form><script language="JavaScript"> document.forms.modifusersystem.modifusersystempass.focus(); </script>');
			}else{ echo('<span id="messages"><div class="error"><ul>#AR0025 Arr&ecirc;t de la requ&ecirc;te : Aucun utilisateur appartenant &agrave; l\'id envoy&eacute; !</ul></div></span>'); }
			}else{ echo('<span id="messages"><div class="error"><ul>#AIR012 Arr&ecirc;t inopin&eacute; de la requ&ecirc;te : Identifiant utilisateur maquant !</ul></div></span>'); }
			}else{?>
			<table style="text-align: center; width: 100%; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">
<tbody><tr><td style="vertical-align: top; text-align: left;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=utilisateurs'" value="Retour">
</td><td style="vertical-align: top; text-align: right;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=utilisateurs&type=glu'" value="G&eacute;rer les utilisateurs">
</td><td style="vertical-align: top; text-align: right;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=utilisateurs&type=suu'" value="Supprimer un utilisateur">
</td></tr></tbody></table><br /><?php
				echo('<form action="identification.php" method="post" name="adduser" id="adduser"><table width="500" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#eeeeee" style="text-align: center; color:#000000;"><tr><td width="100">Identifiant*</td><td width="150">');
				echo('<input name="login-identificateurinscription" type="text" id="login-identificateurinscription"></td></tr><tr><td>Mot de passe*</td><td><input name="pass" type="password" id="pass"></td></tr><tr><td>Mot de passe&sup2;*</td><td><input name="pass2" type="password" id="pass2"></td></tr>');
				echo('<tr><td>Nom</td><td><input name="nom" type="text" id="nom"></td></tr><tr><td>Pr&eacute;nom</td><td><input name="prenom" type="text" id="prenom"></td></tr><tr><td>Privil&egrave;ge*</td><td><select name="privilege" id="privilege">');
				echo('<option value="sa">Super Administrateur (Acc&egrave;s total)</option><option value="a">Administrateur (G&egrave;re tout sauf la gestion des utilisateurs)</option><option value="u">Utilisateur (N\'a aucun droit sur le param&egrave;trage)</option>');
				echo('<option value="i">Invit&eacute; (Lecture seule)</option></select><input name="datepourinscriptionobligatoire" type="hidden" value="'.date("d/m/Y").'"></td></tr><tr><td height="50" colspan="2"><div align="center"><p><input type="submit" name="Submit" value="Cr&eacute;er !"><input value="Annuler" onclick="self.location.href=\'identification.php?gestion=utilisateurs\'" type="button" >');
				echo('<br /><font size="-1">(* = champ obligatoire)</font></p></div></td></tr></table></form>');
			}
		}else if(isset($_GET['type']) && ($_GET['type'] == "suu")){
			mysql_select_db($base, $connexion);
			$recherchedesutilisateurs = "SELECT * FROM ".$tableparam." WHERE type='utilisateur' ORDER BY valeur2 ASC";
			$querydesutilisateurs = mysql_query($recherchedesutilisateurs, $connexion) or die(mysql_error());
			$onbalancelasauce = mysql_fetch_assoc($querydesutilisateurs);?>
			<table style="text-align: center; width: 100%; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">
<tbody><tr><td style="vertical-align: top; text-align: left;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=utilisateurs'" value="Retour">
</td><td style="vertical-align: top; text-align: right;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=utilisateurs&type=glu'" value="G&eacute;rer les utilisateurs">
</td><td style="vertical-align: top; text-align: right;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=utilisateurs&type=auu'" value="Cr&eacute;er un nouvel utilisateur">
</td></tr></tbody></table><br /><?php
				echo('<form action="identification.php" method="post" name="suppr"><div align="center"><table width="500" border="0" cellpadding="5" cellspacing="0"><tr><td width="240"><div align="center">');
				echo('<select name="suppr" size="5" class="textform" id="select2">');
					do {
						echo('<option value="'.$onbalancelasauce['valeur1'].'">');
							if($onbalancelasauce['valeur6']== "sa") echo ">> ";echo $onbalancelasauce['valeur2']; echo " "; echo $onbalancelasauce['valeur3']; echo " ("; echo $onbalancelasauce['valeur4']; echo ")"; if($onbalancelasauce['valeur6']== "sa") echo " <<";
								echo('</option>');
						} while ($onbalancelasauce = mysql_fetch_assoc($querydesutilisateurs));
							$recherchedesutilisateurs = mysql_num_rows($querydesutilisateurs);
								if($recherchedesutilisateurs > 0) {
									mysql_data_seek($$querydesutilisateurs, 0);
									$onbalancelasauce = mysql_fetch_assoc($querydesutilisateurs);}
										echo('</select></div></td><td width="157"><input type="submit" name="Submit2" value="Supprimer cet utilisateur"></td></tr></table></div></form>');
							}else{
								echo('<center><br /><br /><br /><form><input value="- G&eacute;rer les utilisateurs" onclick="self.location.href=\'identification.php?gestion=utilisateurs&type=glu\'" type="button" size="1000"><br /><br /><br /><input value="- Ajouter un utilisateur" onclick="self.location.href=\'identification.php?gestion=utilisateurs&type=auu\'" type="button"><br /><br /><br /><input value="- Supprimer un utilisateur" onclick="self.location.href=\'identification.php?gestion=utilisateurs&type=suu\'" type="button"></form></center>');
							}
	}else if(isset($_POST['suppreven'])){ // Suppression d'événement
	$recherchedelatabledeleven = sprintf("SELECT valeur4 FROM ".$tableparam." WHERE type='serveur' AND valeur1='".$_POST['suppreven']."'");
			mysql_select_db($base, $connexion);
			$rdltdlequery = mysql_query($recherchedelatabledeleven, $connexion); // Là on met la recherche dans une variable
				if($rdltdlequery){ // Si recherche bonne alors on continue
					$rdltdleqwhile = mysql_fetch_assoc($rdltdlequery); // Là on fait on while-variable
									$deletebaseeven = sprintf("DROP TABLE ".$rdltdleqwhile['valeur4'].""); // Et là on fait la requête pour supprimer la table supprimer la table
										mysql_select_db($base, $connexion);
											if(mysql_query($deletebaseeven, $connexion)){ // Ensuite on balance la requête
												$deleteeven = sprintf("DELETE FROM ".$tableparam." WHERE valeur1='".$_POST['suppreven']."' AND type='serveur'"); // Et une dernière requête pour supprimer dans la table paramètres
												mysql_select_db($base, $connexion);
												mysql_query($deleteeven, $connexion); //et on la balance
												echo('<center><img src="img/load.gif"><meta http-equiv="refresh" content="0; URL=identification.php?gestion=choixeven&type=evenements&modiffaite=suppression"></center>');
											}else{ 
												echo('<center><br />erreur !<br /><img src="img/loaderreur.gif"><br />'.mysql_error().'</center>');
											}
							
					}else{
						echo mysql_error();
					}
	}else if(isset($_POST['suppr'])){
		$delete_user = sprintf("DELETE FROM ".$tableparam." WHERE valeur1='".$_POST['suppr']."' AND type='utilisateur'");
				mysql_select_db($base, $connexion);
					if(mysql_query($delete_user, $connexion)){
						echo('<center><img src="img/load.gif"><meta http-equiv="refresh" content="0; URL=identification.php?gestion=utilisateurs&type=glu&modiffaite=suppression"></center>');
					}else{
						echo mysql_error();
					}
	}else if(isset($_GET['415bgfnjhjyj4gfh842666fgfdg45hfgh84tttthhhhhh115666yt6d8888888888seeeef444487yjt77jop41m41hvj'])){
		$delete_user = sprintf("DELETE FROM ".$tableparam." WHERE valeur1='".$_GET['415bgfnjhjyj4gfh842666fgfdg45hfgh84tttthhhhhh115666yt6d8888888888seeeef444487yjt77jop41m41hvj']."' AND type='utilisateur'");
				mysql_select_db($base, $connexion);
					if(mysql_query($delete_user, $connexion)){
						echo('<center><img src="img/load.gif"><meta http-equiv="refresh" content="0; URL=identification.php?gestion=utilisateurs&type=glu&modiffaite=suppression"></center>');
					}else{
						echo mysql_error();
					}
  }else if(isset($_POST['datepourinscriptionobligatoire'])){
		if(isset($_POST['login-identificateurinscription']) && ($_POST['pass']) && ($_POST['pass2']) && ($_POST['privilege'])){
			if($_POST['pass'] == $_POST['pass2']){
				$mdp=hash('sha512', $_POST['pass']);
							$iddi=0;
							do{
								$iddi++;
								mysql_select_db($base, $connexion);
								$iddisearch = mysql_query('SELECT * FROM '.$tableparam.' WHERE type="utilisateur" AND valeur1="'.$iddi.'"');
								$iddisearchnr = mysql_num_rows($iddisearch);
							}while ($iddisearchnr > 0);							
						$add_user = sprintf("INSERT INTO ".$tableparam." (type, valeur1, valeur2, valeur3, valeur4, valeur5, valeur6, valeur7, valeur8, valeur9, valeur10, valeur11, valeur12, valeur13, valeur14, valeur15) VALUES ('utilisateur', '".$iddi."', '".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['login-identificateurinscription']."', '".$mdp."', '".$_POST['privilege']."', '".$_POST['datepourinscriptionobligatoire']."', '".$_SESSION['prenom_user']." ".$_SESSION['nom_user']."', '', '', '', '', '', '', '')");
								mysql_select_db($base, $connexion);
									$resultadd_user = mysql_query($add_user, $connexion) or die(mysql_error());
									echo('<center><img src="img/load.gif"><meta http-equiv="refresh" content="0; URL=identification.php?gestion=utilisateurs&type=glu&modiffaite=creation&idnewuser='.$iddi.'"></center>');
			}else{echo('error 1');}
		}else{die('error 2');}
	}else if(isset($_POST['modifverifuser']) && ($_POST['modifverifuser'] == "csa")){
		if(isset($_POST['login-identificateurmodification']) && ($_POST['id']) && ($_POST['privilege'])){
			if(isset($_POST['pass'])){$pass=$_POST['pass'];}else{$pass="";}
			if(isset($_POST['nom'])){$nom=$_POST['nom'];}else{$nom="--";}
			if(isset($_POST['prenom'])){$prenom=$_POST['prenom'];}else{$prenom="--";}
		mysql_select_db($base, $connexion);
		$recpamd = mysql_query('SELECT valeur5 FROM '.$tableparam.' WHERE type="utilisateur" AND valeur5="'.$_POST['pass'].'" AND valeur1="'.$_POST['id'].'" ORDER BY valeur1 DESC LIMIT 1');
			if(!mysql_num_rows($recpamd)){
				$varpost=$pass;
				$password=hash('sha512', $varpost);
					mysql_select_db($base, $connexion);
					$modifadduser=mysql_query('UPDATE '.$tableparam.' SET valeur2="'.$nom.'", valeur3="'.$prenom.'", valeur4="'.$_POST['login-identificateurmodification'].'", valeur5="'.$password.'", valeur6="'.$_POST['privilege'].'" WHERE valeur1="'.$_POST['id'].'" AND type="utilisateur"');
					echo(mysql_error());
					echo("Ok");
				} else {
				mysql_select_db($base, $connexion);
					$modifadduser=mysql_query('UPDATE '.$tableparam.' SET valeur2="'.$nom.'", valeur3="'.$prenom.'", valeur4="'.$_POST['login-identificateurmodification'].'", valeur6="'.$_POST['privilege'].'" WHERE valeur1="'.$_POST['id'].'" AND type="utilisateur"');
					echo(mysql_error());
					echo("Ok");
			}
		}else{echo("error !!!!!!!!!!!!!!!!");}
	}else if(isset($_GET['gestion']) && ($_GET['gestion'] == "choixeven")){
		if(isset($_GET['type']) && ($_GET['type'] == "newgrades")){
			if(isset($_GET['enregistrement']) && ($_GET['enregistrement'] == "ok")){
			if(isset($_GET['cds'])){ $cds=$_GET['cds']; }else{ $cds="#F0F0F0";}
			$nds = htmlentities($_GET['nds'], ENT_QUOTES);
			mysql_select_db($base, $connexion);
			$searchpciddstat = mysql_query('SELECT valeur5 FROM '.$tableparam.' WHERE type="grade" ORDER BY valeur1');
			$nbrofstat=0;
			do{
				$nbrofstat++;
					mysql_select_db($base, $connexion);
					$nbrofstatsearch = mysql_query('SELECT * FROM '.$tableparam.' WHERE type="grade" AND valeur1="'.$nbrofstat.'"');
					$nbrofstatsearchnr = mysql_num_rows($nbrofstatsearch);
			}while ($nbrofstatsearchnr > 0);
			$newidforstat = $nbrofstat;
			$insertnewgrade = mysql_query("INSERT  INTO ".$tableparam." (type, valeur1, valeur2, valeur3, valeur4, valeur5, valeur6, valeur7, valeur8, valeur9, valeur10, valeur11, valeur12, valeur13, valeur14, valeur15, valeur16, valeur17, valeur18, valeur19, valeur20) VALUES ('grade', '".$newidforstat."', '".$_GET['ideven']."', '".$nds."', '".$_GET['tds']."', '".$cds."', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')");
			if($insertnewgrade){
			echo ('<center><img src="img/load.gif"><meta http-equiv="refresh" content="0; url=identification.php?gestion=choixeven&type=grades&even='.$_GET['ideven'].'&modiffaite=creation"></center>');
			}else{
			echo('Une erreur est survenue, veuillez vous r&eacute;f&eacute;rer aux informations ci-dessous :<br />'.mysql_error().'');
			}
			}else{?>
			<link rel="stylesheet" type="text/css" href="img/colorchoice.css" />
<script type="text/javascript" src="img/colorchoice.js"></script>
<script type="text/javascript">
window.onload = function(){
 fctLoad();
}
window.onscroll = function(){
 fctShow();
}
window.onresize = function(){
 fctShow();
}
</script>
			<center><form name="form1" method="get" action="identification.php"><input name="gestion" type="hidden" value="choixeven"><input name="type" type="hidden" value="newgrades"><input name="ideven" type="hidden" value="<?php echo $_GET['ideven'];?>"><input name="enregistrement" type="hidden" value="ok"> 
<table class="statutsgestion" style="text-align: center; width: 40%; border-collapse : collapse; color:#000000;" border="1" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE"><tbody><tr> 
<td style="text-align: center;"><strong><font size="2" face="Arial, Helvetica, sans-serif">Nom du Statut</font></strong></td><td style="text-align: center;">
<input type="text" name="nds" ></td></tr><tr><td style="text-align: center;"><strong><font size="2" face="Arial, Helvetica, sans-serif">Tarif du statut</font></strong></td>
<td style="text-align: center;"><input type="text" name="tds" ></td></tr><tr><td style="text-align: center;"><strong><font size="2" face="Arial, Helvetica, sans-serif">Couleur du Statut</font></strong></td><td style="text-align: center;">
<input type="text" name="cds" ><img src="img/colorchoice.png" width="32" height="19" border="0" align="absmiddle" onClick="fctShow(document.form1.cds);" style="cursor:pointer;"></td></tr></table><input name="bouton" type="submit" value="Cr&eacute;er"><input name="bouton" type="button" value="Annuler"></form></center>
		<?php }} else if(isset($_GET['type']) && ($_GET['type'] == "evenements")){
			if(isset($_GET['grade'])){
}else if(isset($_GET['act']) && ($_GET['act'] == "modifoption")){// =1 >> On cherche la variable "act" égale à modifoption
	if(isset($_GET['id'])){ //=2 >> Là on cherche le get "id"
		if(isset($_GET['valeurchange']) && ($_GET['valeurchange']=="valeur9") or ($_GET['valeurchange']=="valeur10") or ($_GET['valeurchange']=="valeur11") or ($_GET['valeurchange']=="valeur12")){//=3 >> On vérifie que la get 'valeurchange' existe, si oui en valeur9,10,11,12
			if(isset($_GET['rotatechange']) && ($_GET['rotatechange'] == "0" or "1")){//=4 >> et là variable get 'rotatechange' en 0 ou 1
				if(isset($_GET['valeurauto']) && ($_GET['valeurauto'] == "ok")){ //=5 >> on vérifie si la valeur envoyée est là (elle est utilisée en automatique lorsque javascript activé, sinon elle est envoyée en confirmation manuelle)
					mysql_select_db($base, $connexion);
					//requête de mise à jour
					$fader0=mysql_query('UPDATE '.$tableparam.' SET '.$_GET['valeurchange'].'="'.$_GET['rotatechange'].'" WHERE type="serveur" AND valeur1="'.$_GET['id'].'"'); 
					//Vérification de la première requête pour mettre à jour la base de donnée
					echo('<center><div style="background-color:#eeeeee; height=10px;">');
						if(isset($fader0) && (!$fader0)){ // affichage erreur si ya
							echo('<img src="img/erreur.png">'); //donc évidemment l'image
							echo(mysql_error()); // et le blabla
							if(isset($_GET['noscript']) && ($_GET['noscript'] == "yes")){ // affichage de la pae d'erreur si noscript
								echo('<img src="img/delete.png">&nbsp;&nbsp;<font color="#FF8000">Un erreur est survenue!</font><br /><br /><form action="identification.php?gestion=choixeven&type=evenements"><input type="submit" value="Ok..."></form>');
							}else{ // si ya pas noscript on a déjà affiché l'image
							} // fin des si noscript
						}else{ // donc si ya pas derreur
							if(isset($_GET['noscript']) && ($_GET['noscript'] == "yes")){ // avec noscript, on affiche la page : c bon !
								echo('<img src="img/valider.png">&nbsp;&nbsp;<font color="#00B000">Op&eacute;ration execut&eacute;e avec succ&egrave;s!</font><br /><br /><form action="identification.php?gestion=choixeven&type=evenements"><input type="submit" value="Ok"></form>');
							}else{ // si script activé on chage les imgs
								if(isset($_GET['valeurchange']) && ($_GET['valeurchange'] == "valeur9")){ // valeur 9 ? ou pas.
									if(isset($_GET['rotatechange']) && ($_GET['rotatechange'] == "1")){//Afficher la bonne image selon le type de paramètre modifié
										echo('<div><a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$_GET['id'].'&valeurchange=valeur9&rotatechange=0&nomeven='.$_GET['nomeven'].'\', \'idfader-'.$_GET['nomeven'].'\')" target="_parent"><img src="img/valider.png"></a></div>');
									}else if(isset($_GET['rotatechange']) && ($_GET['rotatechange'] == "0")){
										echo('<a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$_GET['id'].'&valeurchange=valeur9&rotatechange=1&nomeven='.$_GET['nomeven'].'\', \'idfader-'.$_GET['nomeven'].'\')" target="_parent"><img src="img/delete.png"></a>');
									}else{
										echo('<img src="img/erreur.png">');
									}
								}else if(isset($_GET['valeurchange']) && ($_GET['valeurchange'] == "valeur10")){ // valeur 10 ? ou pas.
									if(isset($_GET['rotatechange']) && ($_GET['rotatechange'] == "1")){//Afficher la bonne image selon le type de paramètre modifié
										echo('<a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$_GET['id'].'&valeurchange=valeur10&rotatechange=0&nomeven='.$_GET['nomeven'].'\', \'idfadsr-'.$_GET['nomeven'].'\')" target="_parent"><img src="img/valider.png"></a>');
									}else if(isset($_GET['rotatechange']) && ($_GET['rotatechange'] == "0")){
										echo('<a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$_GET['id'].'&valeurchange=valeur10&rotatechange=1&nomeven='.$_GET['nomeven'].'\', \'idfadsr-'.$_GET['nomeven'].'\')" target="_parent"><img src="img/delete.png"></a>');
									}else{
										echo('<img src="img/erreur.png">');
									}
								}else if(isset($_GET['valeurchange']) && ($_GET['valeurchange'] == "valeur11")){ // valeur 11 ? ou pas.
									if(isset($_GET['rotatechange']) && ($_GET['rotatechange'] == "1")){//Afficher la bonne image selon le type de paramètre modifié
										echo('<a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$_GET['id'].'&valeurchange=valeur11&rotatechange=0&nomeven='.$_GET['nomeven'].'\', \'idfndrlr-'.$_GET['nomeven'].'\')" target="_parent"><img src="img/valider.png"></a>');
									}else if(isset($_GET['rotatechange']) && ($_GET['rotatechange'] == "0")){
										echo('<a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$_GET['id'].'&valeurchange=valeur11&rotatechange=1&nomeven='.$_GET['nomeven'].'\', \'idfndrlr-'.$_GET['nomeven'].'\')" target="_parent"><img src="img/delete.png"></a>');
									}else{
										echo('<img src="img/erreur.png">');
									}
								}else if(isset($_GET['valeurchange']) && ($_GET['valeurchange'] == "valeur12")){ // valeur 12 ? ou pas.
									if(isset($_GET['rotatechange']) && ($_GET['rotatechange'] == "1")){//Afficher la bonne image selon le type de paramètre modifié
										echo('<a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$_GET['id'].'&valeurchange=valeur12&rotatechange=0&nomeven='.$_GET['nomeven'].'\', \'idftdrlr-'.$_GET['nomeven'].'\')" target="_parent"><img src="img/valider.png"></a>');
									}else if(isset($_GET['rotatechange']) && ($_GET['rotatechange'] == "0")){
										echo('<a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$_GET['id'].'&valeurchange=valeur12&rotatechange=1&nomeven='.$_GET['nomeven'].'\', \'idftdrlr-'.$_GET['nomeven'].'\')" target="_parent"><img src="img/delete.png"></a>');
									}else{
										echo('<img src="img/erreur.png">');
									}
								}else{ // ou pas. =D
									echo('<img src="img/erreur.png">');
								}	
							}
						}
					echo('</div></center>');
				}else{//=5 >> sinon on va afficher la confirmation visuelle
				echo('<center>Voulez-vous vraiment modifier ');
					if(isset($_GET['valeurchange']) && ($_GET['valeurchange'] == "valeur9")){
						echo("la valeur \"Autorisation d'entr&eacute;e requise\"");
					}else if(isset($_GET['valeurchange']) && ($_GET['valeurchange'] == "valeur10")){
						echo("la valeur \"Autorisation de sortie requise\"");
					}else if(isset($_GET['valeurchange']) && ($_GET['valeurchange'] == "valeur11")){
						echo("la valeur \"Noms des responsables légaux requis\"");
					}else if(isset($_GET['valeurchange']) && ($_GET['valeurchange'] == "valeur12")){
						echo("la valeur \"T&eacute;l&eacute;phone des responsables légaux requis\"");
					}else{
						echo('<img src="img/erreur.png">');
					}
					if(isset($_GET['rotatechange']) && ($_GET['rotatechange'] == "0")){
						echo(' qui sera équivalente &agrave; "<font color="#FF0000">non</font>", apr&egrave;s la confirmation ?');
					}else if(isset($_GET['rotatechange']) && ($_GET['rotatechange'] == "1")){
						echo(' qui sera équivalente &agrave; "<font color="#00B000">oui</font>", apr&egrave;s la confirmation ?');
					}else{
						echo('<img src="img/erreur.png">');
					}
				echo('</br /><br /><form action="identification.php?gestion=choixeven&type=evenements" method="get"><input name="act" type="hidden" value="modifoption"><input name="id" type="hidden" value="'.$_GET['id'].'"><input name="valeurchange" type="hidden" value="'.$_GET['valeurchange'].'"><input name="rotatechange" type="hidden" value="'.$_GET['rotatechange'].'"><input name="valeurauto" type="hidden" value="ok"><input name="noscript" type="hidden" value="yes"><input type="submit" value="Ok, continuer..."></form><form action="identification.php?gestion=choixeven&type=evenements"><input type="submit" value="Annuler"></form></center>');
				}
			}else{echo('<img src="img/erreur.png">');}//=4
		}else{echo('<img src="img/erreur.png">');}//=3
	}else{echo('<img src="img/erreur.png">');}//=2
}else{//=1
	if(isset($_GET['newtitre']) && ($_GET['id'])){ //change titre
		$nettoyertitr = htmlentities($_GET['newtitre'], ENT_QUOTES);
			mysql_select_db($base, $connexion);
			//requête de mise à jour du titre
			$reqprltrdleven=mysql_query('UPDATE '.$tableparam.' SET valeur2="'.$nettoyertitr.'" WHERE type="serveur" AND valeur1="'.$_GET['id'].'"');
				if(isset($reqprltrdleven) && (!$reqprltrdleven)){
					echo('<img src="img/erreur.png">'); 
					echo(mysql_error());
						if(isset($_GET['noscript']) && ($_GET['noscript'] == "yes")){
							echo('<img src="img/delete.png">&nbsp;&nbsp;<font color="#FF8000">Un erreur est survenue!</font><br /><br /><form action="identification.php?gestion=choixeven&type=evenements"><input type="submit" value="Ok..."></form>');
						}
				}else{ // rien vu qui si ya une erreur ya l'image d'erreur
				}
	}else  if(isset($_GET['newnbrpers']) && ($_GET['id'])){
		$verifnocaracttransformoisa = array ('@[éèêëÊË]@i','@[àâäÂÄ]@i','@[îïÎÏ]@i','@[ûùüÛÜ]@i','@[ôöÔÖ]@i','@[ç]@i','@[ ]@i','@[^a-zA-Z0-9_]@', '@[abcdefghijklmnopqrstuvwxyz]@i');
		$verifnocaractensa = array ('','','','','','','','', '');
		$verifnocaract = preg_replace($verifnocaracttransformoisa, $verifnocaractensa, $_GET['newnbrpers']); // préparation vérif caractères pas + loin que 1-9 
			if($verifnocaract == $_GET['newnbrpers']){ //C ok
				mysql_select_db($base, $connexion);
					//requête de mise à jour du titre
					$reqprnbrperswen=mysql_query('UPDATE '.$tableparam.' SET valeur8="'.$_GET['newnbrpers'].'" WHERE type="serveur" AND valeur1="'.$_GET['id'].'"');
						if(isset($reqprnbrperswen) && (!$reqprnbrperswen)){
							echo('<img src="img/erreur.png">'); 
							echo(mysql_error());
								if(isset($_GET['noscript']) && ($_GET['noscript'] == "yes")){
									echo('<img src="img/delete.png">&nbsp;&nbsp;<font color="#FF8000">Un erreur est survenue!</font><br /><br /><form action="identification.php?gestion=choixeven&type=evenements"><input type="submit" value="Ok..."></form>');
								}
						}else{ // rien vu qui si ya une erreur ya l'image d'erreur
						}
			}else{
			echo("error 1");
			}
	}else if(isset($_GET['newdatej']) && ($_GET['id'])){ // partie date (jour)
		$verifnocaractndjtransformoisa = array ('@[éèêëÊË]@i','@[àâäÂÄ]@i','@[îïÎÏ]@i','@[ûùüÛÜ]@i','@[ôöÔÖ]@i','@[ç]@i','@[ ]@i','@[^a-zA-Z0-9_]@', '@[abcdefghijklmnopqrstuvwxyz]@i');
		$verifnocaractndjensa = array ('','','','','','','','', '');
		$verifnocaractndj = preg_replace($verifnocaractndjtransformoisa, $verifnocaractndjensa, $_GET['newdatej']); // préparation vérif caractères pas + loin que 1-9 
			if($_GET['newdatej'] == $verifnocaractndj){ // vérif caractère
				if(strlen($_GET['newdatej']) == 2 || strlen($_GET['newdatej']) == 1){ // verif si valeur entrée fait 1 ou 2 et pas +
					if($_GET['newdatej'] == 1 || $_GET['newdatej'] == 01 || $_GET['newdatej'] == 2 || $_GET['newdatej'] == 02 || $_GET['newdatej'] == 3 || $_GET['newdatej'] == 03 || $_GET['newdatej'] == 4 || $_GET['newdatej'] == 04 || $_GET['newdatej'] == 5 || $_GET['newdatej'] == 05 || $_GET['newdatej'] == 6 || $_GET['newdatej'] == 06 || $_GET['newdatej'] == 7 || $_GET['newdatej'] == 07 || $_GET['newdatej'] == 8 || $_GET['newdatej'] == 08 || $_GET['newdatej'] == 9 || $_GET['newdatej'] == 09 || $_GET['newdatej'] == 10 || $_GET['newdatej'] == 11 || $_GET['newdatej'] == 12 || $_GET['newdatej'] == 13 || $_GET['newdatej'] == 14 || $_GET['newdatej'] == 15 || $_GET['newdatej'] == 16 || $_GET['newdatej'] == 17 || $_GET['newdatej'] == 18 || $_GET['newdatej'] == 19 || $_GET['newdatej'] == 20 || $_GET['newdatej'] == 21 || $_GET['newdatej'] == 22 || $_GET['newdatej'] == 23 || $_GET['newdatej'] == 24 || $_GET['newdatej'] == 25 || $_GET['newdatej'] == 26 || $_GET['newdatej'] == 27 || $_GET['newdatej'] == 28 || $_GET['newdatej'] == 29 || $_GET['newdatej'] == 30 || $_GET['newdatej'] == 31){
						mysql_select_db($base, $connexion);
							$reqdatendj=mysql_query('UPDATE '.$tableparam.' SET valeur5="'.$_GET['newdatej'].'" WHERE type="serveur" AND valeur1="'.$_GET['id'].'"');
								if(isset($reqdatendj) && (!$reqdatendj)){echo("<span id=\"messages\"><div class=\"error\"><ul>une erreur inattendue est survenue!<br />Infos d&eacute;boguage :<br/>".mysql_error()."</ul></div></span><br />");}else{echo("<span id=\"messages\"><div class=\"ok\"><ul>Modification enregistr&eacute;e avec succ&egrave;s!</ul></div></span><br />");}
					}else{ echo("<span class=\"messages\" id=\"messages\"><div class=\"alert\" id=\"error\"><ul>Vous ne pouvez pas indiquer un nombre plus grand que 31!</ul></div></span><br />");}
				}else{ echo("<span class=\"messages\" id=\"messages\"><div class=\"alert\" id=\"error\"><ul>Vous devez seulement mettre  1 ou 2 chiffres!</ul></div></span><br />");}
			}else{ echo("<span class=\"messages\" id=\"messages\"><div class=\"alert\" id=\"error\"><ul>Vous ne pouvez mettre que des chiffres!</ul></div></span><br />");}
	}else if(isset($_GET['newdatem']) && ($_GET['id'])){ // partie date (mois)
		$verifnocaractndmtransformoisa = array ('@[éèêëÊË]@i','@[àâäÂÄ]@i','@[îïÎÏ]@i','@[ûùüÛÜ]@i','@[ôöÔÖ]@i','@[ç]@i','@[ ]@i','@[^a-zA-Z0-9_]@', '@[abcdefghijklmnopqrstuvwxyz]@i');
		$verifnocaractndmensa = array ('','','','','','','','', '');
		$verifnocaractndm = preg_replace($verifnocaractndmtransformoisa, $verifnocaractndmensa, $_GET['newdatem']); // préparation vérif caractères pas + loin que 1-9 
			if($_GET['newdatem'] == $verifnocaractndm){ // vérif caractère
				if(strlen($_GET['newdatem']) == 2 || strlen($_GET['newdatem']) == 1){ // verif si valeur entrée fait 1 ou 2 et pas +
					if($_GET['newdatem'] == 1 || $_GET['newdatem'] == 01 || $_GET['newdatem'] == 2 || $_GET['newdatem'] == 02 || $_GET['newdatem'] == 3 || $_GET['newdatem'] == 03 || $_GET['newdatem'] == 4 || $_GET['newdatem'] == 04 || $_GET['newdatem'] == 5 || $_GET['newdatem'] == 05 || $_GET['newdatem'] == 6 || $_GET['newdatem'] == 06 || $_GET['newdatem'] == 7 || $_GET['newdatem'] == 07 || $_GET['newdatem'] == 8 || $_GET['newdatem'] == 08 || $_GET['newdatem'] == 9 || $_GET['newdatem'] == 09 || $_GET['newdatem'] == 10 || $_GET['newdatem'] == 11 || $_GET['newdatem'] == 12){
						mysql_select_db($base, $connexion);
							$reqdatendm=mysql_query('UPDATE '.$tableparam.' SET valeur6="'.$_GET['newdatem'].'" WHERE type="serveur" AND valeur1="'.$_GET['id'].'"');
								if(isset($reqdatendm) && (!$reqdatendm)){echo("<span id=\"messages\"><div class=\"error\"><ul>une erreur inattendue est survenue!<br />Infos d&eacute;boguage :<br/>".mysql_error()."</ul></div></span><br />");}else{echo("<span id=\"messages\"><div class=\"ok\"><ul>Modification enregistr&eacute;e avec succ&egrave;s!</ul></div></span><br />");}
					}else{ echo("<span class=\"messages\" id=\"messages\"><div class=\"alert\" id=\"error\"><ul>Vous ne pouvez pas indiquer un nombre plus grand que 12!</ul></div></span><br />");}
				}else{ echo("<span class=\"messages\" id=\"messages\"><div class=\"alert\" id=\"error\"><ul>Vous devez seulement mettre  1 ou 2 chiffres!</ul></div></span><br />");}
		}	else{ echo("<span class=\"messages\" id=\"messages\"><div class=\"alert\" id=\"error\"><ul>Vous ne pouvez mettre que des chiffres!</ul></div></span><br />");}
	}else if(isset($_GET['newdatea']) && ($_GET['id'])){ // partie date (année)
		$verifnocaractndatransformoisa = array ('@[éèêëÊË]@i','@[àâäÂÄ]@i','@[îïÎÏ]@i','@[ûùüÛÜ]@i','@[ôöÔÖ]@i','@[ç]@i','@[ ]@i','@[^a-zA-Z0-9_]@', '@[abcdefghijklmnopqrstuvwxyz]@i');
		$verifnocaractndaensa = array ('','','','','','','','', '');
		$verifnocaractnda = preg_replace($verifnocaractndatransformoisa, $verifnocaractndaensa, $_GET['newdatea']); // préparation vérif caractères pas + loin que 1-9 
			if($_GET['newdatea'] == $verifnocaractnda){ // vérif caractère
				if(strlen($_GET['newdatea']) == 4){ // verif si valeur entrée fait 1 ou 2 et pas +
					mysql_select_db($base, $connexion);
						$reqdatenda=mysql_query('UPDATE '.$tableparam.' SET valeur7="'.$_GET['newdatea'].'" WHERE type="serveur" AND valeur1="'.$_GET['id'].'"');
							if(isset($reqdatenda) && (!$reqdatenda)){echo("<span id=\"messages\"><div class=\"error\"><ul>une erreur inattendue est survenue!<br />Infos d&eacute;boguage :<br/>".mysql_error()."</ul></div></span><br />");}else{echo("<span id=\"messages\"><div class=\"ok\"><ul>Modification enregistr&eacute;e avec succ&egrave;s!</ul></div></span><br />");}
				}else{ echo("<span id=\"messages\"><div class=\"alert\"><ul>Vous devez mettre 4 chiffres!</ul></div></span><br />");}
			}else{ echo("<span id=\"messages\"><div class=\"alert\"><ul>Vous ne pouvez mettre que des chiffres!</ul></div></span><br />");}
	}else if(isset($_GET['newage1']) && ($_GET['id'])){
		$verifnocaractna1transformoisa = array ('@[éèêëÊË]@i','@[àâäÂÄ]@i','@[îïÎÏ]@i','@[ûùüÛÜ]@i','@[ôöÔÖ]@i','@[ç]@i','@[ ]@i','@[^a-zA-Z0-9_]@', '@[abcdefghijklmnopqrstuvwxyz]@i');
		$verifnocaractna1ensa = array ('','','','','','','','', '');
		$verifnocaractna1 = preg_replace($verifnocaractna1transformoisa, $verifnocaractna1ensa, $_GET['newage1']); // préparation vérif caractères pas + loin que 1-9 
			if($_GET['newage1'] == $verifnocaractna1){ // vérif caractère
				mysql_select_db($base, $connexion);
					$reqdatena1=mysql_query('UPDATE '.$tableparam.' SET valeur13="'.$_GET['newage1'].'" WHERE type="serveur" AND valeur1="'.$_GET['id'].'"');
						if(isset($reqdatena1) && (!$reqdatena1)){echo("<span id=\"messages\"><div class=\"error\"><ul>une erreur inattendue est survenue!<br />Infos d&eacute;boguage :<br/>".mysql_error()."</ul></div></span><br />");}else{echo("<span id=\"messages\"><div class=\"ok\"><ul>Modification enregistr&eacute;e avec succ&egrave;s!</ul></div></span><br />");}
			}else{ echo("<span id=\"messages\"><div class=\"alert\"><ul>Vous ne pouvez mettre que des chiffres!</ul></div></span><br />");}
	}else if(isset($_GET['newage2']) && ($_GET['id'])){
		$verifnocaractna2transformoisa = array ('@[éèêëÊË]@i','@[àâäÂÄ]@i','@[îïÎÏ]@i','@[ûùüÛÜ]@i','@[ôöÔÖ]@i','@[ç]@i','@[ ]@i','@[^a-zA-Z0-9_]@', '@[abcdefghijklmnopqrstuvwxyz]@i');
		$verifnocaractna2ensa = array ('','','','','','','','', '');
		$verifnocaractna2 = preg_replace($verifnocaractna2transformoisa, $verifnocaractna2ensa, $_GET['newage2']); // préparation vérif caractères pas + loin que 1-9 
			if($_GET['newage2'] == $verifnocaractna2){ // vérif caractère
				mysql_select_db($base, $connexion);
					$reqdatena2=mysql_query('UPDATE '.$tableparam.' SET valeur14="'.$_GET['newage2'].'" WHERE type="serveur" AND valeur1="'.$_GET['id'].'"');
						if(isset($reqdatena2) && (!$reqdatena2)){echo("<span id=\"messages\"><div class=\"error\"><ul>une erreur inattendue est survenue!<br />Infos d&eacute;boguage :<br/>".mysql_error()."</ul></div></span><br />");}else{echo("<span id=\"messages\"><div class=\"ok\"><ul>Modification enregistr&eacute;e avec succ&egrave;s!</ul></div></span><br />");}
			}else{ echo("<span id=\"messages\"><div class=\"alert\"><ul>Vous ne pouvez mettre que des chiffres!</ul></div></span><br />");}
	}
?>
<script type="text/javascript">
function fonction(url, position)
{
var xhr_object = null;
var suiteurl = "&valeurauto=ok";
var urltraitee = url+suiteurl;
if(window.XMLHttpRequest) xhr_object = new XMLHttpRequest();
else
if (window.ActiveXObject) xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
// On ouvre la requete vers la page désirée
xhr_object.open("GET", urltraitee, true);
xhr_object.onreadystatechange = function(){
if ( xhr_object.readyState == 4 )
{
// j'affiche dans la DIV spécifiées le contenu retourné par le fichier
document.getElementById(position).innerHTML = xhr_object.responseText;
}
}
// dans le cas du get
xhr_object.send(null);
}

function chatitr(id, vt){
var newtitre = prompt("Comment voulez-vous renommer le titre ?", vt);
   if(newtitre!=null){
      var url = "identification.php?gestion=choixeven&type=evenements&newtitre=";
      var varget = newtitre;
	  var urlid = "&id=";
	  var vargetid = id;
	  var urlvarget = url + varget + urlid + vargetid;
         window.location.href = urlvarget;
   }
}

function date(id, typ, date){
	if(typ == "j"){
		var newdatej = prompt("Quel jour voulez-vous programmer l'événement ? (jj)", date);
			if(newdatej!=null){
				var urlj = "identification.php?gestion=choixeven&type=evenements&newdatej=";
				var vargetj = newdatej;
				var urlidj = "&id=";
				var vargetidj = id;
				var ttj = urlj + vargetj + urlidj + vargetidj;
					window.location.href = ttj;
					}
	}else if(typ == "m"){
		var newdatem = prompt("Quel mois voulez-vous programmer l'événement ? (mm)", date);
			if(newdatem!=null){
				var urlm = "identification.php?gestion=choixeven&type=evenements&newdatem=";
				var vargetm = newdatem;
				var ttm = urlm + vargetm;
				var urlidm = "&id=";
				var vargetidm = id;
				var ttm = urlm + vargetm + urlidm + vargetidm;
					window.location.href = ttm;
					}
	}else if(typ == "a"){
		var newdatea = prompt("Quel année voulez-vous programmer l'événement ? (aaaa)", date);
			if(newdatea!=null){
				var urla = "identification.php?gestion=choixeven&type=evenements&newdatea=";
				var vargeta = newdatea;
				var urlida = "&id=";
				var vargetida = id;
				var tta = urla + vargeta + urlida + vargetida;
					window.location.href = tta;
					
				}
	}
}

function nbrpers(id, old){
var newnbrpers = prompt("Choisissez le nombre de personne maximum (0 pour illimité)", old);
   if(newnbrpers!=null){
      var urlazerty = "identification.php?gestion=choixeven&type=evenements&newnbrpers=";
      var vargetazerty = newnbrpers;
	  var urlidazerty = "&id=";
	  var vargetidazerty = id;
	  var urlvargetazerty = urlazerty + vargetazerty + urlidazerty + vargetidazerty;
         window.location.href = urlvargetazerty;
	}
}

function changage(idag, typage, oldage){
	if(typage == "1"){
		var newage1 = prompt("Quelle nouvelle limite d'âge minimum voulez-vous imposer?", oldage);
			if(newage1!=null){
				var urlag1 = "identification.php?gestion=choixeven&type=evenements&newage1=";
				var vargetag1 = newage1;
				var urlidag1 = "&id=";
				var vargetidag1 = idag;
				var ttag1 = urlag1 + vargetag1 + urlidag1 + vargetidag1;
					window.location.href = ttag1;
					}
	}else 	if(typage == "2"){
		var newage2 = prompt("Quelle nouvelle limite d'âge maximum voulez-vous imposer?", oldage);
			if(newage2!=null){
				var urlag2 = "identification.php?gestion=choixeven&type=evenements&newage2=";
				var vargetag2 = newage2;
				var urlidag2 = "&id=";
				var vargetidag2 = idag;
				var ttag2 = urlag2 + vargetag2 + urlidag2 + vargetidag2;
					window.location.href = ttag2;
					}
	}
}
</script>
<?php if(isset($_GET['modiffaite']) && ($_GET['modiffaite'] == "suppression")){ echo('<span id="messages"><div class="ok"><ul>Suppression de l\'&eacute;v&eacute;nement effectu&eacute;e avec succ&egrave;s!</ul></div></span><br />'); } ?>
	<table style="text-align: center; width: 100%; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">
<tbody><tr><td style="vertical-align: top; text-align: left;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=choixeven'" value="Retour">
</td><td style="vertical-align: top; text-align: right;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=choixeven&type=suppreven'" value="Supprimer un &eacute;v&eacute;nement">
</td><td style="vertical-align: top; text-align: right;">
<input name="" type="button" onClick="self.location.href='identification.php?option=newserveur'" value="Cr&eacute;er un nouvel &eacute;v&eacute;nement">
</td></tr></tbody></table><br />
<?php
mysql_select_db($base, $connexion);
$tlu = mysql_query('SELECT valeur1, valeur2, valeur3, valeur4, valeur5, valeur6, valeur7, valeur8, valeur9, valeur10, valeur11, valeur12, valeur13, valeur14, valeur15 FROM '.$tableparam.' WHERE type="serveur" ORDER BY valeur1');
	if(mysql_num_rows($tlu) == 0){ 
		echo ('<span id="messages"><div class="alert"><ul>Aucun &eacute;v&eacute;nement disponible !</ul></div></span>'); 
	}else{?>
		
<center><div style="background-color:#749CAC;"><table class="evenementsgestion" style="text-align: center; width: 100%; border-collapse : collapse; color:#000000;" border="1" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE"><tbody><tr>
		<td style="text-align: center;"><strong><u><font size="2" face="Arial, Helvetica, sans-serif">Id</font></u></strong></td>
		<td style="text-align: center;"><strong><u><font size="2" face="Arial, Helvetica, sans-serif">Nom</font></u></strong></td>
	 	<td style="text-align: center;"><strong><u><font size="2" face="Arial, Helvetica, sans-serif">Nombre de<br />personnes max.</font></u></strong></td>
	  	<td style="text-align: center;"><strong><u><font size="2" face="Arial, Helvetica, sans-serif">Date de<br />l'&eacute;v&eacute;nemet</font></u></strong></td>
	 	<td style="text-align: center;"><strong><u><font size="2" face="Arial, Helvetica, sans-serif">tranche d'&acirc;ge</font></u></strong></td>
		<td style="text-align: center;"><strong><u><font size="2" face="Arial, Helvetica, sans-serif">Autorisation<br />d'entr&eacute;e requise</font></u></strong></td>
		<td style="text-align: center;"><strong><u><font size="2" face="Arial, Helvetica, sans-serif">Autorisation de<br />sortie requise</font></u></strong></td>
		<td style="text-align: center;"><strong><u><font size="2" face="Arial, Helvetica, sans-serif">Nom des responsables<br />légaux requis</font></u></strong></td>
		<td style="text-align: center;"><strong><u><font size="2" face="Arial, Helvetica, sans-serif">T&eacute;l&eacute;phone des<br />responsables légaux requis</font></u></strong></td>
		<td style="text-align: center;"><strong><u><font size="2" face="Arial, Helvetica, sans-serif">Statuts et tarifs</font></u></strong></td>
<?php 	
	function enlevecaracteres($chaine){ 
  				$chaine = strtr($chaine,  "'\"",  "  "); 
  				return $chaine; 
  				} 
					while($wtlu = mysql_fetch_array($tlu)){?>
						<?php
				$titre=enlevecaracteres($wtlu['valeur2']);
				if(isset($wtlu['valeur8']) && ($wtlu['valeur8'] == "0")){$pmax="<img src=\"img/infini.png\">";}else if(isset($wtlu['valeur8'])){$pmax=$wtlu['valeur8'];}else{$pmax="Aucune donn&eacute;e re&ccedil;ue!";} // préparation de la valeur pmax pour définir le nombre de personnes maximum
				echo("<tr><td style=\"text-align: center;\">".$wtlu['valeur1']."</td>"); // affichage de l'id
				echo("<td style=\"text-align: center;\"><div id=\"nom\"><input type=\"submit\" onclick=\"chatitr('".$wtlu['valeur1']."', '".$titre."')\" value='".$titre."'></input></form></div></td>"); //affichage du titre dans un bouton
	 					
				echo("<td style=\"text-align: center;\"><div onclick=\"nbrpers('".$wtlu['valeur1']."', '".$wtlu['valeur8']."')\"><strong>".$pmax."</strong></div></td>"); // 	affichage de $pmax (personnes max)
	 			echo("<td style=\"text-align: center;\"><span onClick=\"date('".$wtlu['valeur1']."', 'j', '".$wtlu['valeur5']."')\"><strong>".$wtlu['valeur5']."</strong></span>/<span onClick=\"date('".$wtlu['valeur1']."', 'm', '".$wtlu['valeur6']."')\"><strong>".$wtlu['valeur6']."</strong></span>/<span onClick=\"date('".$wtlu['valeur1']."', 'a', '".$wtlu['valeur7']."')\"><strong>".$wtlu['valeur7']."</strong></span></td>"); // affichage de la date
				if(isset($wtlu['valeur13']) && ($wtlu['valeur14']) && ($wtlu['valeur13'] < $wtlu['valeur14'])){$ta="<span onClick=\"changage('".$wtlu['valeur1']."', '1', '".$wtlu['valeur13']."')\"><strong>".$wtlu['valeur13']."</strong></span> - <span onClick=\"changage('".$wtlu['valeur1']."', '2', '".$wtlu['valeur14']."')\"><strong>".$wtlu['valeur14']."</strong></span>&nbsp;ans";}else if(isset($wtlu['valeur13']) && ($wtlu['valeur14']) && ($wtlu['valeur13'] > $wtlu['valeur14'])){$ta="<span onClick=\"changage('".$wtlu['valeur1']."', '2', '".$wtlu['valeur14']."')\"><strong>".$wtlu['valeur14']."</strong></span> - <span onClick=\"changage('".$wtlu['valeur1']."', '1', '".$wtlu['valeur13']."')\"><strong>".$wtlu['valeur13']."</strong></span>&nbsp;ans";}else 
					if(isset($wtlu['valeur13']) && ($wtlu['valeur14']) && ($wtlu['valeur13'] = $wtlu['valeur14'])){$ta="<span onClick=\"changage('".$wtlu['valeur1']."', '1', '".$wtlu['valeur13']."')\"><strong>".$wtlu['valeur13']."</strong></span> - <span onClick=\"changage('".$wtlu['valeur1']."', '2', '".$wtlu['valeur14']."')\"><strong>".$wtlu['valeur14']."</strong></span>&nbsp;ans";}else{$ta="<span onClick=\"changage('".$wtlu['valeur1']."', '1', '".$wtlu['valeur13']."')\"><strong>".$wtlu['valeur13']."</strong></span> - <span onClick=\"changage('".$wtlu['valeur1']."', '2', '".$wtlu['valeur14']."')\"><strong>".$wtlu['valeur14']."</strong></span>&nbsp;ans";} // préparation de l'affichage de la tranche d'âge
				echo("<td style=\"text-align: center;\">".$ta."</td>"); // affichage de la tranche d'âge
	  			echo("<td style=\"text-align: center;\"><div id=\"idfader-".$wtlu['valeur3']."\">"); // autorisation d'entrée requise ?
	  				if(isset($wtlu['valeur9']) && ($wtlu['valeur9'] == "1")){
						echo('<a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$wtlu['valeur1'].'&valeurchange=valeur9&rotatechange=0&nomeven='.$wtlu['valeur3'].'\', \'idfader-'.$wtlu['valeur3'].'\')"><img src="img/valider.png"></a><noscript><br /><form action="identification.php?gestion=choixeven&type=evenements" method="get"><input name="act" type="hidden" value="modifoption"><input name="id" type="hidden" value="'.$wtlu['valeur1'].'"><input name="valeurchange" type="hidden" value="valeur9"><input name="rotatechange" type="hidden" value="0"><input type="submit" value="Inverser"></form></noscript>');
					}else if(isset($wtlu['valeur9']) && ($wtlu['valeur9'] == "0")){
						echo('<a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$wtlu['valeur1'].'&valeurchange=valeur9&rotatechange=1&nomeven='.$wtlu['valeur3'].'\', \'idfader-'.$wtlu['valeur3'].'\')"><img src="img/delete.png"></a><noscript><br /><form action="identification.php?gestion=choixeven&type=evenements" method="get"><input name="act" type="hidden" value="modifoption"><input name="id" type="hidden" value="'.$wtlu['valeur1'].'"><input name="valeurchange" type="hidden" value="valeur9"><input name="rotatechange" type="hidden" value="1"><input type="submit" value="Inverser"></form></noscript>');
					}else{
						echo('<img src="img/erreur.png">');
					}
	  			echo("</div></td><td style=\"text-align: center;\"><div id=\"idfadsr-".$wtlu['valeur3']."\">"); // autorisation de sortie requise ?
					if(isset($wtlu['valeur10']) && ($wtlu['valeur10'] == "1")){
						echo('<a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$wtlu['valeur1'].'&valeurchange=valeur10&rotatechange=0&nomeven='.$wtlu['valeur3'].'\', \'idfadsr-'.$wtlu['valeur3'].'\')"><img src="img/valider.png"></a><noscript><br /><form action="identification.php?gestion=choixeven&type=evenements" method="get"><input name="act" type="hidden" value="modifoption"><input name="id" type="hidden" value="'.$wtlu['valeur1'].'"><input name="valeurchange" type="hidden" value="valeur10"><input name="rotatechange" type="hidden" value="0"><input type="submit" value="Inverser"></form></noscript>');
					}else if(isset($wtlu['valeur10']) && ($wtlu['valeur10'] == "0")){
						echo('<a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$wtlu['valeur1'].'&valeurchange=valeur10&rotatechange=1&nomeven='.$wtlu['valeur3'].'\', \'idfadsr-'.$wtlu['valeur3'].'\')"><img src="img/delete.png"></a><noscript><br /><form action="identification.php?gestion=choixeven&type=evenements" method="get"><input name="act" type="hidden" value="modifoption"><input name="id" type="hidden" value="'.$wtlu['valeur1'].'"><input name="valeurchange" type="hidden" value="valeur10"><input name="rotatechange" type="hidden" value="1"><input type="submit" value="Inverser"></form></noscript>');
					}else{
						echo('<img src="img/erreur.png">');
					}
				echo("</div></td><td style=\"text-align: center;\"><div id=\"idfndrlr-".$wtlu['valeur3']."\">"); // nom des repsonsables légaux requis ?
					if(isset($wtlu['valeur11']) && ($wtlu['valeur11'] == "1")){
						echo('<a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$wtlu['valeur1'].'&valeurchange=valeur11&rotatechange=0&nomeven='.$wtlu['valeur3'].'\', \'idfndrlr-'.$wtlu['valeur3'].'\')"><img src="img/valider.png"></a><noscript><br /><form action="identification.php?gestion=choixeven&type=evenements" method="get"><input name="act" type="hidden" value="modifoption"><input name="id" type="hidden" value="'.$wtlu['valeur1'].'"><input name="valeurchange" type="hidden" value="valeur11"><input name="rotatechange" type="hidden" value="0"><input type="submit" value="Inverser"></form></noscript>');
					}else if(isset($wtlu['valeur11']) && ($wtlu['valeur11'] == "0")){
						echo('<a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$wtlu['valeur1'].'&valeurchange=valeur11&rotatechange=1&nomeven='.$wtlu['valeur3'].'\', \'idfndrlr-'.$wtlu['valeur3'].'\')"><img src="img/delete.png"></a><noscript><br /><form action="identification.php?gestion=choixeven&type=evenements" method="get"><input name="act" type="hidden" value="modifoption"><input name="id" type="hidden" value="'.$wtlu['valeur1'].'"><input name="valeurchange" type="hidden" value="valeur11"><input name="rotatechange" type="hidden" value="1"><input type="submit" value="Inverser"></form></noscript>');
					}else{
						echo('<img src="img/erreur.png">');
					}
				echo("</div></td><td style=\"text-align: center;\"><div id=\"idftdrlr-".$wtlu['valeur3']."\">"); // tel des responsables légaux requis ?
					if(isset($wtlu['valeur12']) && ($wtlu['valeur12'] == "1")){
						echo('<a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$wtlu['valeur1'].'&valeurchange=valeur12&rotatechange=0&nomeven='.$wtlu['valeur3'].'\', \'idftdrlr-'.$wtlu['valeur3'].'\')"><img src="img/valider.png"></a><noscript><br /><form action="identification.php?gestion=choixeven&type=evenements" method="get"><input name="act" type="hidden" value="modifoption"><input name="id" type="hidden" value="'.$wtlu['valeur1'].'"><input name="valeurchange" type="hidden" value="valeur12"><input name="rotatechange" type="hidden" value="0"><input type="submit" value="Inverser"></form></noscript>');
					}else if(isset($wtlu['valeur12']) && ($wtlu['valeur12'] == "0")){
						echo('<a onClick="fonction(\'identification.php?gestion=choixeven&type=evenements&act=modifoption&id='.$wtlu['valeur1'].'&valeurchange=valeur12&rotatechange=1&nomeven='.$wtlu['valeur3'].'\', \'idftdrlr-'.$wtlu['valeur3'].'\')"><img src="img/delete.png"></a><noscript><br /><form action="identification.php?gestion=choixeven&type=evenements" method="get"><input name="act" type="hidden" value="modifoption"><input name="id" type="hidden" value="'.$wtlu['valeur1'].'"><input name="valeurchange" type="hidden" value="valeur12"><input name="rotatechange" type="hidden" value="1"><input type="submit" value="Inverser"></form></noscript>');
					}else{
						echo('<img src="img/erreur.png">');
					}
				echo("</div></td><td style=\"text-align: center;\"><form><input name=\"\" type=\"button\" onclick=\"self.location.href='identification.php?gestion=choixeven&type=grades&even=".$wtlu['valeur1']."'\" value=\"Administrer...\"></form></td></tr>");
			}?>
		</tr></tbody></table></div></center>
<?php }}
		}else if(isset($_GET['type']) && ($_GET['type'] == "grades")){
			if(isset($_GET['action']) && ($_GET['action'] == "supprimer")){
				$deletegrade = sprintf("DELETE FROM ".$tableparam." WHERE valeur1='".$_GET['idstatut']."' AND type='grade'"); //Requête pour supprimer grade
				mysql_select_db($base, $connexion);
					if(mysql_query($deletegrade, $connexion)){ //et on la balance
						echo('<center><img src="img/load.gif"><meta http-equiv="refresh" content="0; URL=identification.php?gestion=choixeven&type=grades&even='.$_GET['even'].'&modiffaite=suppression"></center>');
					}else{
						echo('Une erreur est survenue, code d&eacute;boguage :<br />'.mysql_error().'');
					}
			}else if(isset($_GET['action']) && ($_GET['action'] == "modifier")){
				if(isset($_GET['enregistrement']) && ($_GET['enregistrement'] == "nomodif")){
					$modifadduser=mysql_query('UPDATE '.$tableparam.' SET valeur3="'.$_GET['nds'].'", valeur4="'.$_GET['tds'].'", valeur5="'.$_GET['cds'].'" WHERE valeur1="'.$_GET['idstatut'].'" AND type="grade" AND valeur2="'.$_GET['even'].'"');
					echo(mysql_error());
					echo('<center><img src="img/load.gif"><meta http-equiv="refresh" content="0; URL=identification.php?gestion=choixeven&type=grades&even='.$_GET['even'].'&modiffaite=modification"></center>');
					
				}else{?>
				<link rel="stylesheet" type="text/css" href="img/colorchoice.css" />
<script type="text/javascript" src="img/colorchoice.js"></script>
<script type="text/javascript">
window.onload = function(){
 fctLoad();
}
window.onscroll = function(){
 fctShow();
}
window.onresize = function(){
 fctShow();
}
var strColor = "<?php echo "#".$_GET['couleur']."";?>";
</script>
				<center><form name="form1" method="get" action="identification.php"><input name="gestion" type="hidden" value="choixeven"><input name="type" type="hidden" value="grades"><input name="even" type="hidden" value="<?php echo $_GET['even'];?>"><input name="action" type="hidden" value="modifier"><input name="idstatut" type="hidden" value="<?php echo $_GET['idstatut'];?>"> <input name="enregistrement" type="hidden" value="nomodif">
<table class="statutsgestion" style="text-align: center; width: 40%; border-collapse : collapse; color:#000000;" border="1" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE"><tbody><tr> 
<td style="text-align: center;"><strong><font size="2" face="Arial, Helvetica, sans-serif">Nom du Statut</font></strong></td><td style="text-align: center;">
<input type="text" name="nds" value="<?php echo $_GET['titre'];?>"></td></tr><tr><td style="text-align: center;"><strong><font size="2" face="Arial, Helvetica, sans-serif">Tarif du statut</font></strong></td>
<td style="text-align: center;"><input type="text" name="tds" value="<?php echo $_GET['tarif'];?>" ></td></tr><tr><td style="text-align: center;"><strong><font size="2" face="Arial, Helvetica, sans-serif">Couleur du statut</font></strong></td>
<td style="text-align: center;"><input type="text" name="cds" id="cds" value="<?php echo "#".$_GET['couleur']."";?>" onFocus="this.style.backgroundColor=strColor" ><img src="img/colorchoice.png" width="32" height="19" border="0" align="absmiddle" onClick="fctShow(document.form1.cds);" style="cursor:pointer;"></td></tr></table><input name="bouton" type="submit" value="Modifier"><input onClick="self.location.href='identification.php?gestion=choixeven&type=grades&even=<?php echo $_GET['even'];?>'" value="Annuler" type="button" ></form></center>
				<?php }
				if(isset($_GET['idstatut'])){
				}else if(isset($_POST['idstatut'])){
				}
			}else{
				if(isset($_GET['even'])){
				mysql_select_db($base, $connexion);
$recherchesurlesgrades = mysql_query('SELECT * FROM '.$tableparam.' WHERE type="grade" AND valeur2="'.$_GET['even'].'" ORDER BY valeur1');
if(isset($_GET['modiffaite']) && ($_GET['modiffaite'] == "creation")){ echo('<span id="messages"><div class="ok"><ul>Cr&eacute;ation du nouveau statut effectu&eacute;e avec succ&egrave;s!</ul></div></span><br />'); }else if(isset($_GET['modiffaite']) && ($_GET['modiffaite'] == "modification")){ echo('<span id="messages"><div class="ok"><ul>Modification du statut effectu&eacute;e avec succ&egrave;s!</ul></div></span><br />'); }else if(isset($_GET['modiffaite']) && ($_GET['modiffaite'] == "suppression")){ echo('<span id="messages"><div class="ok"><ul>Suppression du statut effectu&eacute;e avec succ&egrave;s!</ul></div></span><br />'); }
	?>
	<table style="text-align: left; width: 100%; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">
<tbody><tr><td style="vertical-align: top; text-align: left;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=choixeven&type=evenements'" value="Retour">
</td><td style="vertical-align: top; text-align: right;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=choixeven&type=newgrades&ideven=<?php echo $_GET['even'];?>'" value="Cr&eacute;er un nouveau statut">
</td></tr></tbody></table>
	<center><br />
		<?php if(mysql_num_rows($recherchesurlesgrades) == 0){}else{?>
	<table class="statutsgestion" style="text-align: center; width: 75%; border-collapse : collapse; color:#000000;" border="1" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE"><tbody><tr>
		<td style="text-align: center;"><strong><u><font size="2" face="Arial, Helvetica, sans-serif">Nom du Statut</font></u></strong></td>
		<td style="text-align: center;"><strong><u><font size="2" face="Arial, Helvetica, sans-serif">Tarif du Statut</font></u></strong></td>
	 	<td style="text-align: center;"><strong><u><font size="2" face="Arial, Helvetica, sans-serif">Options</font></u></strong></td>
	
	<?php
	while($wrslg = mysql_fetch_array($recherchesurlesgrades)){
			if(isset($wrslg['valeur4']) == ($wrslg['valeur4'] == "0")){$tarifdustatut="<span style=\"color:#00C000;\">Gratuit</span>"; }else{$tarifdustatut="<span style=\"color:#0029C0;\">".$wrslg['valeur4']."€</span>";}
			if(isset($wrslg['valeur4']) == ($wrslg['valeur5'] == "")){$cds="#F0F0F0"; }else{$cds=$wrslg['valeur5'];}
		echo("<tr><td style=\"text-align: center;\"><span style=\"background:".$cds."\">".$wrslg['valeur3']."</span></td>"); // affichage du nom de statut
		echo("<td style=\"text-align: center;\">".$tarifdustatut."</td>"); // affichage du nom de statut
		echo("<td style=\"text-align: center;\"><span><a title=\"Modifier le statut\" href=\"identification.php?gestion=choixeven&type=grades&even=".$_GET['even']."&action=modifier&idstatut=".$wrslg['valeur1']."&titre=".$wrslg['valeur3']."&tarif=".$wrslg['valeur4']."&couleur=".substr($wrslg['valeur5'],1)."\"><img src=\"img/param.png\"></a></span>&nbsp;&nbsp;&nbsp;<span><a title=\"Supprimer le statut\" href=\"identification.php?gestion=choixeven&type=grades&even=".$_GET['even']."&action=supprimer&idstatut=".$wrslg['valeur1']."\"><img src=\"img/delete.png\"></a></span></td>");
	}
	?>
	</tr></tbody></table>
	<?php } ?>
	<?php if(mysql_num_rows($recherchesurlesgrades) == 0){ 
		echo('<span id="messages"><div class="alert"><ul>Aucun statut disponible !</ul></div></span>'); 
	}else{$infosgrd=""; }?></center>
	<?php
			}else{}
			}
		}else if(isset($_GET['type']) && ($_GET['type'] == "suppreven")){
			mysql_select_db($base, $connexion);
			$recherchedesevenements = "SELECT * FROM ".$tableparam." WHERE type='serveur' ORDER BY valeur1 ASC";
			$querydesevenements = mysql_query($recherchedesevenements, $connexion) or die(mysql_error());
			$onbalancelasauceeven = mysql_fetch_assoc($querydesevenements);
			?>	<table style="text-align: center; width: 100%; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">
<tbody><tr><td style="vertical-align: top; text-align: left;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=choixeven'" value="Retour">
</td><td style="vertical-align: top; text-align: right;">
<input name="" type="button" onClick="self.location.href='identification.php?gestion=choixeven&type=evenements'" value="G&eacute;rer un &eacute;v&eacute;nement">
</td><td style="vertical-align: top; text-align: right;">
<input name="" type="button" onClick="self.location.href='identification.php?option=newserveur'" value="Cr&eacute;er un nouvel &eacute;v&eacute;nement">
</td></tr></tbody></table><br /><?php
				echo('<form action="identification.php" method="post" name="suppreven"><div align="center"><table width="500" border="0" cellpadding="5" cellspacing="0"><tr><td width="240"><div align="center">');
				echo('<select name="suppreven" size="5" class="textform" id="select2">');
					do{
						echo('<option value="'.$onbalancelasauceeven['valeur1'].'">');
							echo $onbalancelasauceeven['valeur2'];
								echo('</option>');
						} while ($onbalancelasauceeven = mysql_fetch_assoc($querydesevenements));
							$recherchedesevenements = mysql_num_rows($querydesevenements);
								if($recherchedesevenements > 0) {
									mysql_data_seek($querydesevenements, 0);
									$onbalancelasauceeven = mysql_fetch_assoc($querydesevenements);}
										echo('</select></div></td><td width="157"><input type="submit" name="envoie" value="Supprimer cet &Eacute;v&eacute;nement"></td></tr></table></div></form>');
		}else{
		echo('<center><br /><br /><br /><form><input value="- G&eacute;rer les &eacute;v&eacute;nements" onclick="self.location.href=\'identification.php?gestion=choixeven&type=evenements\'" type="button" size="1000"><br /><br /><br /><input value="- Ajouter un &eacute;v&eacute;nement" onclick="self.location.href=\'identification.php?option=newserveur\'" type="button"><br /><br /><br /><input value="- Supprimer un &eacute;v&eacute;nement" onclick="self.location.href=\'identification.php?gestion=choixeven&type=suppreven\'" type="button"></form></center>');
		}
	}else if(isset($_POST['changeserv'])){ //#S004
		if($_POST['changeserv'] == "newserveur"){echo("<meta http-equiv=\"refresh\" content=\"0; URL=identification.php?option=newserveur\">");}else{
			mysql_select_db($base, $connexion);
			$requetechangeserv=sprintf("SELECT * FROM ".$tableparam." WHERE valeur3='".$_POST['changeserv']."'");
			$requetechangeservs1=mysql_query($requetechangeserv, $connexion) or die(mysql_error());
			$varchangeserv=mysql_fetch_assoc($requetechangeservs1);
			$opchangeserv=mysql_num_rows($requetechangeservs1);
				if($opchangeserv){
					$_SESSION['idbdd'] = $varchangeserv['valeur1'];
	echo("<meta http-equiv=\"refresh\" content=\"0; URL=identification.php?option=ok\">");
				}else{}
				}
	}else if(isset($_GET['option']) && ($_GET['option'] == "choixserveur")){ //#S003
		echo('<center><form action="identification.php" method="post"><table width="400" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#999999" style="text-align : center;"><tr><td width="109">Serveur</td><td width="180">');
		echo('<select name="changeserv"><option value="newserveur">Nouveau Serveur</option><option disabled>- -</option>');
						mysql_select_db($base, $connexion); 
							$rechercheserveur=mysql_query('SELECT * FROM '.$tableparam.' WHERE type="serveur"'); 
								while($datarechercheserveur = mysql_fetch_array($rechercheserveur)){ 
									echo("<option value=\"".$datarechercheserveur['valeur3']."\">".$datarechercheserveur['valeur2']."</option>");
								}
echo('</select></td></tr><tr><td height="30" colspan="2"><input type="submit" value="Connexion"></td></tr></table></form></center>');		
	}else if(isset($_GET['option']) && ($_GET['option'] == "ok")){
		echo('<meta http-equiv="refresh" content="0; URL=index.php">');
	}else if(isset($_POST['modifusersystempass'])){// #S001 
	$unomdp = hash('sha512', $_POST['modifusersystempass']);?>
<script language="JavaScript" type="text/javascript">
cachebar();
changeaffsiscript();
</script><?php
			if(isset($_POST['modifusersystemid'])){
				mysql_select_db($base, $connexion);
					$rek2changemdpus=sprintf("SELECT * FROM ".$tableparam." WHERE valeur1='".$_POST['modifusersystemid']."' AND type='utilisateur'");
					$rek2serv1changemdpus=mysql_query($rek2changemdpus, $connexion) or die(mysql_error());
					$var2servchangemdpus=mysql_fetch_assoc($rek2serv1changemdpus);
					$op2servchangemdpus=mysql_num_rows($rek2serv1changemdpus);
				if($op2servchangemdpus > "0"){
				if($var2servchangemdpus['valeur6'] == "sa"){ $superadminornot2 = "yes";
				if($var2servchangemdpus['valeur1'] == $_SESSION['id_user']){}else{
				echo('<span id="messages"><div class="alert"><ul>Attention, vous ne pouvez pas modifier le mot de passe d\'un super administrateur sans son autorisation.<br />De ce fait, vous pouvez lui en attribuer un secondaire, mais il pourrait dans tous les cas garder l\'ancien.</ul></div></span><br />'); }}
					echo('<center>Voulez-vous vraiment modifier le mot de passe de l\'utilisateur '.$var2servchangemdpus['valeur3'].' '.$var2servchangemdpus['valeur2'].' ?<br /><table style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; background-color:#EEEEEE; color:black;" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align: top; text-align: center;"><span style="color:#C00000;">Pour continuer, vous devez retaper le mot de passe :</span><br />');
					echo('<div align="center"><form action="identification.php" method="post" name="modifusersystemact2"><input name="modifusersystemact2id" type="hidden" value="'.$var2servchangemdpus['valeur1'].'"><input name="modifusersystemact2mdp1" type="hidden" value="'.$unomdp.'"><input name="modifusersystemact2mdp2" type="password"><input name="" type="submit" value="Continuer..."></form><script language="JavaScript">document.forms.modifusersystemact2.modifusersystemact2mdp2.focus(); </script></div></td></tr></table></center>');
			}else{ echo('<span id="messages"><div class="error"><ul>#AR0025 Arr&ecirc;t de la requ&ecirc;te : Aucun utilisateur appartenant &agrave; l\'id envoy&eacute; !</ul></div></span>'); }
			}else{ echo('<span id="messages"><div class="error"><ul>#AIR012 Arr&ecirc;t inopin&eacute; de la requ&ecirc;te : Identifiant utilisateur maquant !</ul></div></span>'); }
	}else if(isset($_POST['modifusersystemact2mdp1'])){ // _______________________________________ act 2
		if(isset($_POST['modifusersystemact2mdp2'])){
	$mdp1 = $_POST['modifusersystemact2mdp1'];
	$mdp2 = hash('sha512', $_POST['modifusersystemact2mdp2']);
	?><script language="JavaScript" type="text/javascript">
			cachebar();
			changeaffsiscript();
			</script><?php
				if(isset($_POST['modifusersystemact2id'])){
				mysql_select_db($base, $connexion);
					$rek3changemdpus=sprintf("SELECT * FROM ".$tableparam." WHERE valeur1='".$_POST['modifusersystemact2id']."' AND type='utilisateur'");
					$rek3serv1changemdpus=mysql_query($rek3changemdpus, $connexion) or die(mysql_error());
					$var3servchangemdpus=mysql_fetch_assoc($rek3serv1changemdpus);
					$op3servchangemdpus=mysql_num_rows($rek3serv1changemdpus);
				if($op3servchangemdpus > "0"){
				if($var3servchangemdpus['valeur6'] == "sa"){ $superadminornot3 = "yes";
				if($var3servchangemdpus['valeur1'] == $_SESSION['id_user']){}else{
				echo('<span id="messages"><div class="alert"><ul>Attention, vous ne pouvez pas modifier le mot de passe d\'un super administrateur sans son autorisation.<br />De ce fait, vous pouvez lui en attribuer un secondaire, mais il pourrait dans tous les cas garder l\'ancien.</ul></div></span><br />'); }}
					if($mdp1 == $mdp2){
					echo('<center>Voulez-vous vraiment modifier le mot de passe de l\'utilisateur '.$var3servchangemdpus['valeur3'].' '.$var3servchangemdpus['valeur2'].' ?<br /><table style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; background-color:#EEEEEE; color:black;" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align: top; text-align: center;"><span style="color:#C00000;">Pour confirmer la modification, vous devez taper votre mot de passe :</span><br /></center>');
					echo('<div align="center"><form action="identification.php" method="post" name="modifusersystemact3"><input name="modifusersystemact3id" type="hidden" value="'.$var3servchangemdpus['valeur1'].'"><input name="modifusersystemact3mdp1" type="hidden" value="'.$mdp1.'"><input name="modifusersystemact3mdp2" type="hidden" value="'.$mdp2.'"><input name="modifusersystemact3mypass" type="password"><input name="" type="submit" value="Valider"></form></div></td></tr></table></center>');
					}else{echo('<div align="center"><img src="img/erreur.png"> Attention, les deux mot de passe ne correspondent pas!<br /><form action="identification.php" method="get"><input name="gestion" type="hidden" value="utilisateurs"><input name="type" type="hidden" value="auu"><input name="act" type="hidden" value="modifpass"><input name="id" type="hidden" value="'.$var3servchangemdpus['valeur1'].'"><input name="nbr" type="hidden" value="bcl"><input name="" value="Retour à l\'étape 1" type="submit"></form></div>');}
		}else{ echo('<span id="messages"><div class="error"><ul>#AR0025 Arr&ecirc;t de la requ&ecirc;te : Aucun utilisateur appartenant &agrave; l\'id envoy&eacute; !</ul></div></span>'); }
		}else{ echo('<span id="messages"><div class="error"><ul>#AIR012 Arr&ecirc;t inopin&eacute; de la requ&ecirc;te : Identifiant utilisateur maquant !</ul></div></span>'); }
		}else{ echo('<span id="messages"><div class="error"><ul>#AR0042 Arr&ecirc;t de la requ&ecirc;te : Mot de passe de confirmation manquant !</ul></div></span>'); }
	}else if(isset($_POST['modifusersystemact3mdp1'])){ /// # ________________________________ act3
		if(isset($_POST['modifusersystemact3mdp2'])){
	$mdp1 = $_POST['modifusersystemact3mdp1'];
	$mdp2 = $_POST['modifusersystemact3mdp2'];
		if($mdp1 == $mdp2){
	?><script language="JavaScript" type="text/javascript">
			cachebar();
			changeaffsiscript();
			</script><?php
				if(isset($_POST['modifusersystemact3id'])){
				mysql_select_db($base, $connexion);
					$rek4changemdpus=sprintf("SELECT * FROM ".$tableparam." WHERE valeur1='".$_POST['modifusersystemact3id']."' AND type='utilisateur'");
					$rek4serv1changemdpus=mysql_query($rek4changemdpus, $connexion) or die(mysql_error());
					$var4servchangemdpus=mysql_fetch_assoc($rek4serv1changemdpus);
					$op4servchangemdpus=mysql_num_rows($rek4serv1changemdpus);
				if($op4servchangemdpus > "0"){
				if($var4servchangemdpus['valeur1'] == $_SESSION['id_user']){$cmoioupa = "oui";}
				if($var4servchangemdpus['valeur6'] == "sa"){ $superadminornot4 = "yes";
				if($var4servchangemdpus['valeur1'] == $_SESSION['id_user']){}else{
				echo('<span id="messages"><div class="alert"><ul>Attention, vous ne pouvez pas modifier le mot de passe d\'un super administrateur sans son autorisation.<br />De ce fait, vous pouvez lui en attribuer un secondaire, mais il pourrait dans tous les cas garder l\'ancien.</ul></div></span><br />'); }}
					if($mdp1 == $mdp2){
						if($var4servchangemdpus['valeur6'] == "sa"){
							if($var4servchangemdpus['valeur1'] == $_SESSION['id_user']){//si c'est nous
							echo('<span id="messages"><div class="alert"><ul><center>Attention ! Vous allez modifier votre propre mot de passe, vous devrez donc vous reconnecter avec votre nouvelle cl&eacute; d\'identification !<br /><form action="identification.php" method="post" name="reconnexion"><input name="useractive" type="hidden" value="'.$var4servchangemdpus['valeur1'].'"><input name="newmdp" type="hidden" value=""><input value="Changer mon mot de passe et me reconnecter" type="submit"><input name="" type="button" value="Annuler" onClick="parent.$.fancybox.close();"></form></center></ul></div></span><br />');
							}else{
								//si c'est pas nous l'admin
								}
						}else{
							mysql_select_db($base, $connexion);
							$upmdpsqlutnorm=mysql_query('UPDATE '.$tableparam.' SET valeur5="'.$mdp1.'" WHERE type="utilisateur" AND valeur1="'.$_POST['modifusersystemact3id'].'"'); 
								if(isset($upmdpsqlutnorm) && (!$upmdpsqlutnorm)){
									echo('<br /><span id="messages"><div class="error"><ul>Une erreur est survenue !<br />'.mysql_error().'</ul></div></span>');
									}else{ echo('<br /><span id="messages"><div class="ok"><ul>Le changement du mot de passe s\'est ex&eacute;cut&eacute; avec succ&egrave;s pour l\'utilisateur '.$var4servchangemdpus['valeur3'].' '.$var4servchangemdpus['valeur2'].' ('.$var4servchangemdpus['valeur4'].').</ul></div></span><br /><div align="center"><input name="" type="button" onClick="parent.$.fancybox.close();" value="Terminé !"></div>'); }
								}
					}else{echo('<div align="center"><img src="img/erreur.png"> Attention, les deux mot de passe ne correspondent pas!<br /><form action="identification.php" method="get"><input name="gestion" type="hidden" value="utilisateurs"><input name="type" type="hidden" value="auu"><input name="act" type="hidden" value="modifpass"><input name="id" type="hidden" value="'.$var4servchangemdpus['valeur1'].'"><input name="nbr" type="hidden" value="bcl"><input name="" value="Retour à l\'étape 1" type="submit"></form></div>');}
		}else{ echo('<span id="messages"><div class="error"><ul>#AR0025 Arr&ecirc;t de la requ&ecirc;te : Aucun utilisateur appartenant &agrave; l\'id envoy&eacute; !</ul></div></span>'); }
		}else{ echo('<span id="messages"><div class="error"><ul>#AIR012 Arr&ecirc;t inopin&eacute; de la requ&ecirc;te : Identifiant utilisateur maquant !</ul></div></span>'); }
		}else{ echo('<span id="messages"><div class="error"><ul>#AR0042 Arr&ecirc;t de la requ&ecirc;te : Mot de passe de confirmation manquant !</ul></div></span>'); }}else{echo('<span id="messages"><div class="error"><ul>Le nouveau mot de passe et le mot de passe de confirmation ne correspondent pas !</ul></div></span>');}
	}else{ //#S002
		if(isset($_SESSION['id_user'])){
			if(isset($_SESSION['idbdd'])){
				echo("<meta http-equiv=\"refresh\" content=\"0; URL=index.php\">");
			}else{
				echo("<meta http-equiv=\"refresh\" content=\"0; URL=identification.php?option=choixserveur\">");
			}
		}else{
		echo('<center><strong>');
			if(isset($_GET['msg']) && ($_GET['msg'] == "gb")){ echo('<font color="#008040">D&eacute;connexion r&eacute;ussie... &Agrave; bient&ocirc;t !</font><br /><br />');
			} else if (isset($_GET['msg']) && ($_GET['msg'] == "erreur")){echo('<font color="#FF0000">Echec d\'authentification !!! &gt; login ou mot de passe incorrect</font><br /><br />');
			} else if (isset($_GET['msg']) && ($_GET['msg'] == "na")){echo('<font color="#008040">Veuillez vous identifier pour commencer...</font><br /><br />');}
				echo("</strong>");
					echo('<center><form action="identification.php" method="post"><table width="400" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#999999" style="text-align : center;"><tr><td width="109">Serveur</td><td width="180"><select name="servbdd"><option value="newserveur">Nouveau Serveur</option><option disabled>- -</option>');
						mysql_select_db($base, $connexion); 
							$rechercheserveur=mysql_query('SELECT * FROM '.$tableparam.' WHERE type="serveur"'); 
								while($datarechercheserveur = mysql_fetch_array($rechercheserveur)){ 
									echo("<option value=\"".$datarechercheserveur['valeur3']."\">".$datarechercheserveur['valeur2']."</option>");
								}
				echo('</select></td></tr><tr><td width="109">Identifiant</td><td width="180"><input name="login" type="text"></td></tr><tr><td>Mot de passe</td><td><input name="pass" type="password"></td></tr><tr><td height="30" colspan="2"><input name="Input" type="submit" value="Ok"></td></tr></table></form></center>');
		}
	}
	echo('</body></html>');							
?></div></div></body></html>