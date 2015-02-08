<?php

$folder_tmpl = 'default';

$n = 0;
$f = opendir(dirname(__FILE__).'..\tmpl\/'.$folder_tmpl.'\/');
while(false !== ($g = readdir($f)))
{
	if($g != '.' && $g != '..' && $g != 'main.inc.php'){
		$n++;
		include $g;
	}
} 
?>