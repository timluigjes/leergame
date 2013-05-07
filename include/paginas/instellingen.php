<h1>Instellingen</h1>
<?php
$file_ext = '';
if(isset($_SESSION['ingelogd']))
{
	$query = mysqli_query($con, "SELECT * FROM gebruikers WHERE leerlingennummer = '".$_SESSION['leerlingennummer']."'");
	if(mysqli_num_rows($query) == 1)
		{
			$row = mysqli_fetch_array($query);
			$naam = $row['naam'];
			$email = $row['email'];
			$wachtwoord = $row['wachtwoord'];
			$afbeelding = $row['afbeelding'];
		}
	
	if(isset($_POST['submit']))
	{
		if($_POST['naam'] == '')
		{
			echo '<p class="error">Naam is leeg</p>';
			exit();
		}
		if($_POST['email'] == '')
		{
			echo '<p class="error">email is leeg</p>';
			exit();
		}
		if($_POST['wachtwoord'] != '')
		{
			$wachtwoord = md5($_POST['wachtwoord']);	
		}
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
							$afbeelding = md5($afbeelding).'.'.$file_ext;
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
		
		//
		
		
		$query = mysqli_query($con, "UPDATE gebruikers SET naam = '".mysqli_real_escape_string($con,$_POST['naam'])."', email = '".mysqli_real_escape_string($con,$_POST['email'])."', wachtwoord = '".mysqli_real_escape_string($con,$wachtwoord)."', afbeelding = '".$afbeelding."' WHERE leerlingennummer = '".$_SESSION['leerlingennummer']."'");
		
		echo '<script>$("#instellingencontent").append("<p class=\"success\">Instellingen zijn opgeslagen.</p>"); updateScore();</script>';
			
			if(!empty($result))
			{
				echo '<p>'.$result.'</p>';
			}
	}
?>

<div id="instellingencontent">
<form enctype="multipart/form-data" method="post" action="" name="instellingenform">
    <ul id="instellingenformlist">
        <li><label for="naam">Naam</label><input type="text" name="naam" class="text" id="naam" value="<?php echo $naam; ?>"></li>
        <li><label for="email">Email</label><input type="email" name="email" class="text" id="email" value="<?php echo $email; ?>"></li>
        <li><label for="wachtwoord">Wachtwoord</label><input type="password" name="wachtwoord" class="text" id="wachtwoord" value=""></li>
        <li><label for="avatar">Afbeelding <span id="upload-warning">Maximaal 500kb</span></label><input type="file" name="image" class="tet" id="image" /></li>
    </ul>
	<input type="submit" name="submit" value="Update" id="submit" class="button_big">
</form>
</div>
<?php
}
else
{
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/">';
}
?>