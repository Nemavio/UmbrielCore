<?php
function comptage($base, $connexion, $tableparam, $idbdd, $connexion, $varserv){
	global $requete_rentres, $requete_sortis, $requete_nodeclare, $inscrits_total, $argent_total, $personnes_venues;
		$requete_rentres = mysql_num_rows(mysql_query('SELECT id FROM '.$varserv['valeur4'].' WHERE rentre="1" AND sorti="0"'));
		$requete_sortis = mysql_num_rows(mysql_query('SELECT id FROM '.$varserv['valeur4'].' WHERE rentre="0" AND sorti="1"'));
		$requete_nodeclare = mysql_num_rows(mysql_query('SELECT id FROM '.$varserv['valeur4'].' WHERE nodeclare="1"'));
		$requete_sortiemaiscompterevenir = mysql_num_rows(mysql_query('SELECT id FROM '.$varserv['valeur4'].' WHERE rentre="1" AND sorti="1"'));
		$inscrits_total = mysql_num_rows(mysql_query('SELECT id FROM '.$varserv['valeur4'].''));
		$personnes_venues = $requete_rentres+$requete_sortis+$requete_sortiemaiscompterevenir;
			$sousdebase=0;
			
			$searchallstat=mysql_query('SELECT * FROM '.$tableparam.' WHERE type="grade"'); 
				while($affichallstat = mysql_fetch_array($searchallstat)){ 
					
					$searchalluserwithstat=mysql_query('SELECT * FROM '.$varserv['valeur4'].' WHERE tarif="'.$affichallstat['valeur1'].'"');
					$nbralluserwithstat=mysql_num_rows($searchalluserwithstat);
					$sousdecegradeegal = $nbralluserwithstat*$affichallstat['valeur4'];
					$sousdebase=$sousdebase+$sousdecegradeegal;
				}
				$argent_total = $sousdebase;
}
?>