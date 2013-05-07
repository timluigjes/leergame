<?php
if(isset($_POST['submit']))
{
		$leerlingennummer = mysqli_real_escape_string($con,$_POST['leerlingennummer']);
		$wachtwoord = md5(mysqli_real_escape_string($con,$_POST['wachtwoord']));
		$query = mysqli_query($con, "SELECT * FROM gebruikers WHERE leerlingennummer = '".$leerlingennummer."' AND wachtwoord = '".$wachtwoord."'")or die("error");
		if(mysqli_num_rows($query) == 1)
		{
			$row = mysqli_fetch_array($query);
			$naam = $row['naam'];
			$_SESSION['leerlingennummer'] = $leerlingennummer;
			$_SESSION['naam'] = $naam;
			$_SESSION['admin'] = $row['admin'];
			$_SESSION['ingelogd'] = 1;
			
			echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/">';
		}
}
?>
<img src="_img/logo.png" height="140" width="140" alt="Pictor">
<h2 class="title">Leergame</h2>

<form enctype="multipart/form-data" method="post" action="">
    <ul id="registratieform">
        <li><label for="leerlingennummer">Leerlingennummer</label><input type="text" name="leerlingennummer" class="text" id="leerlingennummer" value=""></li>
        <li><label for="wachtwoord">Wachtwoord</label><input type="password" name="wachtwoord" class="text" id="wachtwoord" value=""></li>
    </ul>
	<input type="submit" name="submit" value="Login" id="submit" class="button_big">
</form>