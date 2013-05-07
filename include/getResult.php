<?php
include($_SERVER['DOCUMENT_ROOT'].'/include/config.php');
$finalscore = $_POST['finalscore'];
$finalcredits = $_POST['finalcredits'];
$query = mysqli_query($con, "SELECT score,credits FROM gebruikers WHERE leerlingennummer = ".$_SESSION['leerlingennummer']."");
	if(mysqli_num_rows($query) == 1)
	{
		$row = mysqli_fetch_array($query);
		//get the current score and credits
		$score = $row['score'];
		$credits = $row['credits'];
	}
	
	//update score and credits with new score
		$score = $score + $finalscore;
		$credits = $credits + $finalcredits;
	$query = mysqli_query($con, "UPDATE gebruikers SET score= '".$score."', credits= '".$credits."' WHERE leerlingennummer = '".$_SESSION['leerlingennummer']."'");
	
	echo 'score = '.$score.' credits = '.$credits.' leerlingennummer = '.$_SESSION['leerlingennummer'].' finalscore = '.$finalscore.' finalcredits = '.$finalcredits;

?>