<?php
include($_SERVER['DOCUMENT_ROOT'].'/include/config.php');
$query = mysqli_query($con, "SELECT naam,score,credits FROM gebruikers WHERE leerlingennummer = ".$_SESSION['leerlingennummer']."");
	if(mysqli_num_rows($query) == 1)
	{
		$row = mysqli_fetch_array($query);
		//get the current score and credits
		$naam = $row['naam'];
		$score = $row['score'];
		$credits = $row['credits'];
		$array = array($score, $credits, $naam);
		$_SESSION['naam'] = $naam;
	}
	
	echo json_encode($array);
?>