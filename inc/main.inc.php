<?php
$n = 0;
$f = opendir(dirname(__FILE__));
while(false !== ($g = readdir($f)))
{
	if($g != '.' && $g != '..' && $g != 'main.inc.php'){
		$n++;
		include $g;
	}
}
?>