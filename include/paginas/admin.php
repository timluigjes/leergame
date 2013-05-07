<?php
$p2 = $game_id;
$leerlingennummer = $_GET['leerlingennummer'];
$actie = $_GET['actie'];
if($p2 == '')
{
	$p2 = 'home'; 	
}
if($leerlingennummer == 'nieuw')
{
	$leerlingennummer = 0;
	$actie = 'nieuw'; 	
}
if($p2 == 'categories' || $p2 == 'quiz' || $p2 == 'woord' || $p2 == 'woordzoeker')
{
	$game_id = $leerlingennummer;	
}

if(isset($_SESSION['ingelogd']) && $_SESSION['admin'] == '1')
{
?>
<div id="admin-content">

<?php 
if($p2 != '' && $actie!= '')
{
	include('include/paginas/admin/'.$p2.'-'.$actie.'.php');
}
else
{
	include('include/paginas/admin/'.$p2.'.php');
}
?>
</div>

<?php
}
else
{
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/">';
}
?>