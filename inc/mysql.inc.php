<?php
function dQuery($s, $f, $w = '', $o = ''){
	$query = 'SELECT '.$s.' FROM '.$f;
	if($w != ''){
		$query .= ' WHERE '.$w;
	}
	if($o != ''){
		$query .= ' ORDER BY '.$o;
	}
	return mysql_query($query);
}

function dFa($q){
	return mysql_fetch_array($q);	
}

function dNr($q){
	return mysql_num_rows($q);
}
?>