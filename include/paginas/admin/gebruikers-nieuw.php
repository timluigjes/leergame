<?php
$gadoor1 = 0;
$gadoor2 = 0;
$gadoor3 = 0;
$gadoor4 = 0;

if(isset($_POST['submit']))
{
	if($_POST['leerlingennummer'] == '')
	{
		echo '<p class="error">Leerlingennnummer is leeg</p>';
		$gadoor1 = 0;
	}
	else
	{
		$gadoor1 = 1;	
	}
	if($_POST['naam'] == '')
	{
		echo '<p class="error">Naam is leeg</p>';
		$gadoor2 = 0;
	}
	else
	{
		$gadoor2 = 1;	
	}
	
	if($_POST['email'] == '')
	{
		echo '<p class="error">email is leeg</p>';
		$gadoor3 = 0;
	}
	else
	{
		$gadoor3 = 1;
	}
	
	if($_POST['wachtwoord'] == '')
	{
		echo '<p class="error">wachtwoord is leeg</p>';
		$gadoor4 = 0;
	}
	else
	{
		$gadoor4 = 1;
	}
	
	if($gadoor1 == 1 && $gadoor2 == 1 && $gadoor3 == 1 && $gadoor4 == 1)
	{
		
		if($_FILES['image']['name'] == '')
		{
			$afbeelding = $afbeelding;
		}
		else
		{
			//max 500kb
			define ('MAX_FILE_SIZE', 1024 * 500);
			//path to avatars folder
			define('UPLOAD_DIR', '_img/avatars/');
			
			//replace spaces with underscores
			$afbeelding = str_replace(' ', '_', $_FILES['image']['name']);
			
			//allowed formats
			$allowed = array('image/gif', 'image/jpeg', 'image/pjeg', 'image/png');
			
			//Is de afbeelding toepasbaar?
			if(in_array($_FILES['image']['type'], $allowed) && $_FILES['image']['size'] > 0 && $_FILES['image']['size'] <= MAX_FILE_SIZE)
			{
				//groen licht tijd voor verdere controle
				
				 switch($_FILES['image']['error']) {
					case 0:
						 // check if a file of the same name has been uploaded
						if (!file_exists(UPLOAD_DIR . $afbeelding)) {
						  // move the file to the upload folder and rename it 
							$file_ext = explode('.',$afbeelding);
							$file_ext = end($file_ext);
							$afbeelding = md5($afbeelding.rand(5,15)).'.'.$file_ext;
							$success = move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_DIR . $afbeelding);
						 } else {
						  $result = 'Een bestand bestaat al met die naam.';
						 }
					break;
					
					case 4:
						$result = "Er is geen bestand geselecteerd";
					break;
					
					case 8:
						$result = "Fout met het uploaden. Probeer het nogmaals.";
					break;
				 }
					
			}
			else
			{
				$result = "Het bestand is te groot.";
			}
			
			
		}
		
		$leerlingennummer = mysqli_real_escape_string($con,$_POST['leerlingennummer']);
		$naam = mysqli_real_escape_string($con,$_POST['naam']);
		$wachtwoord = md5(mysqli_real_escape_string($con,$_POST['wachtwoord']));
		$email = mysqli_real_escape_string($con,$_POST['email']);
		
		$checkleerlingennummer = mysqli_query($con, "SELECT * FROM gebruikers WHERE leerlingennummer = '".$leerlingennummer."'");
		
		if(mysqli_num_rows($checkleerlingennummer) == 1)
		{
			echo '<p class="error">Dit leerlingennummer is al in gebruik.</p>';	
		}
		else
		{
			$query = mysqli_query($con, "INSERT INTO gebruikers (leerlingennummer,naam,email,wachtwoord,afbeelding,actief) VALUES ('".$leerlingennummer."','".$naam."','".$email."','".$wachtwoord."','".$afbeelding."','1')");	
			
			echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/admin/gebruikers/">';
		}
	}
}
?>
<h1>Gebruiker toevoegen</h1>
<div id="instellingencontent">
<form enctype="multipart/form-data" method="post" action="">
    <ul id="registratieform">
        <li><label for="leerlingennummer">Leerlingennummer</label><input type="text" name="leerlingennummer" class="text" id="leerlingennummer" value=""></li>
        <li><label for="naam">Naam</label><input type="text" name="naam" class="text" id="naam" value=""></li>
        <li><label for="email">Email</label><input type="email" name="email" class="text" id="email" value=""></li>
        <li><label for="wachtwoord">Wachtwoord</label><input type="password" name="wachtwoord" class="text" id="wachtwoord" value=""></li>
        <li><label for="avatar">Afbeelding <span id="upload-warning">Maximaal 500kb</span></label><input type="file" name="image" class="tet" id="image" /></li>
    </ul>
	<input type="submit" name="submit" value="Registreer" id="submit" class="button_big">
</form>
</div>