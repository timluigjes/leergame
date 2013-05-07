<?php
include($_SERVER['DOCUMENT_ROOT'].'/include/config.php');
$query = mysqli_query($con, "SELECT score,credits FROM gebruikers WHERE leerlingennummer = ".$_SESSION['leerlingennummer']."");
	if(mysqli_num_rows($query) == 1)
	{
		$score = $row['score'];
		$credits = $row['credits'];
		
		echo $score;
		//echo 'var usercredits = '.$credits.';';
	}
?>