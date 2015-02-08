<?php
if(isset($_POST['m']) && isset($_POST['qrdata'])){

echo('etat=warning&i=515114515&m=ff@gmail.com');

}else if(isset($_GET['m']) && isset($_GET['qrdata'])){
	echo $_GET['qrdata'];
}
?>