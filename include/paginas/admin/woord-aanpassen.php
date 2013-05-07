<?php
$query =  mysqli_query($con, "SELECT woord FROM raad_het_woord WHERE woord_id = '".$game_id."'");

if(mysqli_num_rows($query) == 1)
{
	$row = mysqli_fetch_array($query);
	$woord = $row['woord'];
}
if(isset($_POST['submit']))
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
			define('UPLOAD_DIR', '_img/woord_afbeeldingen/');
			
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
		
		$woord = mysqli_real_escape_string($con,$_POST['woord']);
		
			$query = mysqli_query($con, "UPDATE raad_het_woord SET woord = '".$woord."', afbeelding = '".$afbeelding."' WHERE woord_id = '".$game_id."'");
			
			echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/admin/categories/">';
	}
}
?>
<h1>Woord aanpassen</h1>
<div id="instellingencontent">
<form enctype="multipart/form-data" method="post" action="">
    <ul id="registratieform">
        <li><label for="woord">Woord</label><input type="text" name="woord" class="text" id="woord" value="<?php if($woord != '') {  echo $woord; } ?>"></li>
        <li><label for="avatar">Afbeelding <span id="upload-warning">Maximaal 500kb</span></label><input type="file" name="image" class="tet" id="image" /></li>
    </ul>
	<input type="submit" name="submit" value="Aanpassen" id="submit" class="button_big">
</form>
</div>