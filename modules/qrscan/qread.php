<?php 
$mysql_serveur = "127.0.0.1";
$mysql_base = "cmj";
$mysql_utilisateur = "cmj";
$mysql_pass = "catherine";
$mysql_table = "us_event_tesquitoi";
try
{
	$bdd = new PDO('mysql:host='.$mysql_serveur.';dbname='.$mysql_base, $mysql_utilisateur, $mysql_pass);
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}?><?php
if(isset($_POST['qrdata'])){
	if(isset($_POST['m'])){
	$idbillet = explode("=", $_POST['qrdata']);
	$assocName = $_POST['m'];
	$req = $bdd->prepare('SELECT COUNT(*) AS total FROM '.$mysql_table.' WHERE id = "'.$idbillet[1].'" AND commentaires = "'.$assocName.'"');
	$req-> execute();
	$nbr = $req->fetch();
	$req->closeCursor();
		$req2 = $bdd->prepare('SELECT COUNT(*) AS total FROM '.$mysql_table.' WHERE id = "'.$idbillet[1].'" AND commentaires = "'.$assocName.'" AND rentre = "0"');
	$req2-> execute();
	$nbr2 = $req2->fetch();
	$req2->closeCursor();
	if($nbr['total'] == "1"){
		if($nbr2['total'] == "1"){
		$act = $bdd->exec('UPDATE '.$mysql_table.' SET rentre = "1" WHERE id = "'.$idbillet[1].'" AND commentaires = "'.$assocName.'"');
		echo('etat=success&i='.$idbillet[1].'&m='.$assocName);
		}else{
		echo('etat=warning&i='.$idbillet[1].'&m='.$assocName);}
		}else{
		echo('etat=error&i='.$idbillet[1].'&m='.$assocName); }
	}else{
		echo('etat=error');
	}
}else if(isset($_POST['i'])){?>
<html><head>
<style type="text/css">
.trebuchet {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
}
</style>
</head><?php
	$req = $bdd->prepare('SELECT COUNT(*) AS total FROM '.$mysql_table.' WHERE id = "'.$_POST['i'].'"');
	$req-> execute();
	$nbr = $req->fetch();
	$req->closeCursor();
	if($nbr['total'] == "1"){
		$act = $bdd->exec('UPDATE '.$mysql_table.' SET rentre = "1" WHERE id = "'.$_POST['i'].'"');
	$all = $bdd->prepare('SELECT nom,prenom, commentaires FROM '.$mysql_table.' WHERE id = "'.$_POST['i'].'"');
	$all->execute();
	$data = $all->fetch();
	$all->closeCursor();
echo('
    <body bgcolor="#00CC00" class="trebuchet"><b><h1 align="center">Ticket #'.$_POST['i'].' mis &agrave; jour</h1></b>
        <b><h1 align="center">avec succ&egrave;s !</h1>
        <p align="center">&nbsp;</p>
        <h1 align="center">'.strtoupper($data['nom']).' '.$data['prenom'].'</h1>
        <h1 align="center">'.$data['commentaires'].'</h1>
        </b>
        <p align="center"><img src="valide.png" /></p><meta http-equiv="refresh" content="5; URL=qread.php">
        
</body>
    '); }else{echo('
        <body bgcolor="#FF0000" class="trebuchet"><b>
        <h1 align="center">Ticket #'.$_POST['i'].' introuvable !</h1></b>
        <p align="center"><img src="erreur.png" /></p><meta http-equiv="refresh" content="5; URL=qread.php">
        
</body> ');}
}else{
	?>
	<html><head>
<style type="text/css">
.trebuchet {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
}
</style>
</head>
<body bgcolor="#000" class="trebuchet" style="color:#FFFFFF; text-align:center;"><b>
<h1>Mode Manuel</h1>
<p>
<form id="form1" name="form1" method="post" action="qread.php">
  <p>    <input type="submit" name="button" id="button" value="Valider" /><br />
    <label for="numero"><b>Num&eacute;ro du ticket</b></label> 
    <input type="text" name="i" id="numero" />

  </p>
</form></p>
<p align="center"></p>
<p align="center"><a href="index.php">Mode automatique</a></p>

        
</body>
	
	<?php
	}
?>
</html>