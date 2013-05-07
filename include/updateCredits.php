<?php
include($_SERVER['DOCUMENT_ROOT'].'/include/config.php');
$query = mysqli_query($con, "SELECT score,credits FROM gebruikers WHERE leerlingennummer = ".$_SESSION['leerlingennummer']."");
	if(mysqli_num_rows($query) == 1)
	{
		$row = mysqli_fetch_array($query);
		//get the current score and credits
		$credits = $row['credits'];
		
		$credits = $credits - 10;
		if( $credits < 0)
		{
			$credits = 0;	
		}
	}
$query = mysqli_query($con, "UPDATE gebruikers SET credits = '".$credits."' WHERE leerlingennummer = ".$_SESSION['leerlingennummer']."");
?>