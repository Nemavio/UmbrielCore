<?php
class tmplSummary {
	static function details (){	
	global $requete_rentres, $personnes_venues, $requete_sortis, $requete_nodeclare, $inscrits_total, $varserv, $tableparam, $argent_total;
		?>
        <html><body bgcolor="#749CAC"><center>
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
</center></body></html>
        <?php
	}
}
?>