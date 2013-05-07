<?php
$p = $_GET['p'];
$game_id = $_GET['game_id'];
if($p == '') {
	$p = 'home';
}

if($p == 'login') {
	$body = 'registratie';
}
else if(!isset($_SESSION['ingelogd']) && $p == 'home')
{
	$body = 'registratie';	
}else {
	$body = $p;
}
?>	