<?php
session_start();
require("config.php");
@$connexion=mysql_connect($serveur, $identifiant, $password)or die('<html><head><title>UmbrielSystem</title><link rel="stylesheet" type="text/css" href="img/style.css"></head><body><br /><span id="messages"><div class="error"><ul>Erreur de connexion &agrave; la base de donn&eacute;es "'.$base.'@'.$serveur.'" identifiant : "'.$identifiant.'"<br />Infos erreur :<br />'.mysql_error().'</ul></div></span></body></html>');
mysql_select_db($base, $connexion);
require("librairies/global.php");
?>