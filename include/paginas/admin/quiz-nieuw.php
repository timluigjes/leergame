<?php
$vraag = '';
$antwoord1 = '';
$antwoord2 = '';
$antwoord3 = '';
$antwoord4 = '';	
if(isset($_POST['submit']))
{
	$vraag = $_POST['vraag'];
	$soort_vraag = $_POST['soort_vraag'];
	if($_FILES['antwoord1']['name']!= '')
	{
		//max 500kb
			define ('MAX_FILE_SIZE', 1024 * 500);
			//path to avatars folder
			define('UPLOAD_DIR', '_img/quiz_afbeeldingen/');
			
			//replace spaces with underscores
			$antwoord1 = str_replace(' ', '_', $_FILES['antwoord1']['name']);
			
			//allowed formats
			$allowed = array('image/gif', 'image/jpeg', 'image/pjeg', 'image/png');
			
			//Is de afbeelding toepasbaar?
			if(in_array($_FILES['antwoord1']['type'], $allowed) && $_FILES['antwoord1']['size'] > 0 && $_FILES['antwoord1']['size'] <= MAX_FILE_SIZE)
			{
				//groen licht tijd voor verdere controle
				
				 switch($_FILES['antwoord1']['error']) {
					case 0:
						 // check if a file of the same name has been uploaded
						if (!file_exists(UPLOAD_DIR . $antwoord1)) {
						  // move the file to the upload folder and rename it 
							$file_ext = explode('.',$antwoord1);
							$file_ext = end($file_ext);
							$antwoord1 = md5($antwoord1.rand(5,15)).'.'.$file_ext;
							$success = move_uploaded_file($_FILES['antwoord1']['tmp_name'], UPLOAD_DIR . $antwoord1);
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
	else
	{
		$antwoord1 = $_POST['antwoord1'];
	}
	
	if($_FILES['antwoord2']['name']!= '')
	{
		//max 500kb
			define ('MAX_FILE_SIZE', 1024 * 500);
			//path to avatars folder
			define('UPLOAD_DIR', '_img/quiz_afbeeldingen/');
			
			//replace spaces with underscores
			$antwoord2 = str_replace(' ', '_', $_FILES['antwoord2']['name']);
			
			//allowed formats
			$allowed = array('image/gif', 'image/jpeg', 'image/pjeg', 'image/png');
			
			//Is de afbeelding toepasbaar?
			if(in_array($_FILES['antwoord2']['type'], $allowed) && $_FILES['antwoord2']['size'] > 0 && $_FILES['antwoord2']['size'] <= MAX_FILE_SIZE)
			{
				//groen licht tijd voor verdere controle
				
				 switch($_FILES['antwoord2']['error']) {
					case 0:
						 // check if a file of the same name has been uploaded
						if (!file_exists(UPLOAD_DIR . $antwoord2)) {
						  // move the file to the upload folder and rename it 
							$file_ext = explode('.',$antwoord2);
							$file_ext = end($file_ext);
							$antwoord2 = md5($antwoord2.rand(5,15)).'.'.$file_ext;
							$success = move_uploaded_file($_FILES['antwoord2']['tmp_name'], UPLOAD_DIR . $antwoord2);
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
	else
	{
		$antwoord2 = $_POST['antwoord2'];
	}
	
	if($_FILES['antwoord3']['name']!= '')
	{
		//max 500kb
			define ('MAX_FILE_SIZE', 1024 * 500);
			//path to avatars folder
			define('UPLOAD_DIR', '_img/quiz_afbeeldingen/');
			
			//replace spaces with underscores
			$antwoord3 = str_replace(' ', '_', $_FILES['antwoord3']['name']);
			
			//allowed formats
			$allowed = array('image/gif', 'image/jpeg', 'image/pjeg', 'image/png');
			
			//Is de afbeelding toepasbaar?
			if(in_array($_FILES['antwoord3']['type'], $allowed) && $_FILES['antwoord3']['size'] > 0 && $_FILES['antwoord3']['size'] <= MAX_FILE_SIZE)
			{
				//groen licht tijd voor verdere controle
				
				 switch($_FILES['antwoord3']['error']) {
					case 0:
						 // check if a file of the same name has been uploaded
						if (!file_exists(UPLOAD_DIR . $antwoord3)) {
						  // move the file to the upload folder and rename it 
							$file_ext = explode('.',$antwoord3);
							$file_ext = end($file_ext);
							$antwoord3 = md5($antwoord3.rand(5,15)).'.'.$file_ext;
							$success = move_uploaded_file($_FILES['antwoord3']['tmp_name'], UPLOAD_DIR . $antwoord3);
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
	else
	{
		$antwoord3 = $_POST['antwoord3'];
	}
	
	if($_FILES['antwoord4']['name']!= '')
	{
		//max 500kb
			define ('MAX_FILE_SIZE', 1024 * 500);
			//path to avatars folder
			define('UPLOAD_DIR', '_img/quiz_afbeeldingen/');
			
			//replace spaces with underscores
			$antwoord4 = str_replace(' ', '_', $_FILES['antwoord4']['name']);
			
			//allowed formats
			$allowed = array('image/gif', 'image/jpeg', 'image/pjeg', 'image/png');
			
			//Is de afbeelding toepasbaar?
			if(in_array($_FILES['antwoord4']['type'], $allowed) && $_FILES['antwoord4']['size'] > 0 && $_FILES['antwoord4']['size'] <= MAX_FILE_SIZE)
			{
				//groen licht tijd voor verdere controle
				
				 switch($_FILES['antwoord4']['error']) {
					case 0:
						 // check if a file of the same name has been uploaded
						if (!file_exists(UPLOAD_DIR . $antwoord4)) {
						  // move the file to the upload folder and rename it 
							$file_ext = explode('.',$antwoord4);
							$file_ext = end($file_ext);
							$antwoord4 = md5($antwoord4.rand(5,15)).'.'.$file_ext;
							$success = move_uploaded_file($_FILES['antwoord4']['tmp_name'], UPLOAD_DIR . $antwoord4);
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
	else
	{
		$antwoord4 = $_POST['antwoord4'];
	}
	
	$goede_antwoord = $_POST['goede_antwoord'];
	
	$query = mysqli_query($con, "INSERT INTO quiz (vraag, soort_vraag, antwoord_1, antwoord_2, antwoord_3, antwoord_4, goede_antwoord, game_id) VALUES ('".$vraag."','".$soort_vraag."','".$antwoord1."', '".$antwoord2."', '".$antwoord3."', '".$antwoord4."', '".$goede_antwoord."', '".$game_id."')");
	
	$query = mysqli_query($con, "SELECT game_id FROM quiz WHERE game_id = '".$game_id."'");
	if(mysqli_num_rows($query) > 0)
	{
		$query = mysqli_query($con, "UPDATE games SET aantal_vragen = '".mysqli_num_rows($query)."' WHERE game_id = '".$game_id."'");
	}
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/admin/categories/'.$game_id.'/aanpassen">';
}
?>
<script>
$(document).ready(function() {
	$("#soort_vraag").change(function() {
		if($(this).val() == "afbeelding")
		{
			$("#antwoord1").replaceWith('<input type="file" name="antwoord1" class="long" id="antwoord1" />');
			$("#antwoord2").replaceWith('<input type="file" name="antwoord2" class="long" id="antwoord2" />');
			$("#antwoord3").replaceWith('<input type="file" name="antwoord3" class="long" id="antwoord3" />');
			$("#antwoord4").replaceWith('<input type="file" name="antwoord4" class="long" id="antwoord4" />');
		}
		else
		{
			$("#antwoord1").replaceWith('<input type="text" name="antwoord1" class="long" id="antwoord1" value="">');
			$("#antwoord2").replaceWith('<input type="text" name="antwoord2" class="long" id="antwoord2" value="">');
			$("#antwoord3").replaceWith('<input type="text" name="antwoord3" class="long" id="antwoord3" value="">');
			$("#antwoord4").replaceWith('<input type="text" name="antwoord4" class="long" id="antwoord4" value="">');
		}
	});
});
</script>
<h1>Vraag toevoegen</h1>
<div id="instellingencontent">
<form enctype="multipart/form-data" method="post" action="" name="instellingenform"  style="width:450px !important">
    <ul id="instellingenformlist">
        <li><label for="vraag">Vraag</label><input type="text" name="vraag" class="long" id="vraag" value="<?php if($vraag != '') { echo $vraag; } ?>"></li>
       	
        <li><label for="antwoord1">Antwoord 1</label><input type="text" name="antwoord1" class="long" id="antwoord1" value="<?php if($antwoord1 != '') { echo $antwoord1; } ?>"></li>
        <li><label for="antwoord2">Antwoord 2</label><input type="text" name="antwoord2" class="long" id="antwoord2" value="<?php if($antwoord2 != '') { echo $antwoord2; } ?>"></li>
        <li><label for="antwoord3">Antwoord 3</label><input type="text" name="antwoord3" class="long" id="antwoord3" value="<?php if($antwoord3 != '') { echo $antwoord3; } ?>"></li>
        <li><label for="antwoord4">Antwoord 4</label><input type="text" name="antwoord4" class="long" id="antwoord4" value="<?php if($antwoord4 != '') { echo $antwoord4; } ?>"></li>
        <li>
        <label for="soort_vraag">Soort vraag</label>
        <select id="soort_vraag" name="soort_vraag">
        	<option value="tekst">Tekst</option>
            <option value="afbeelding">Afbeelding</option>
        </select>
        </li>
       	<li>
        <label for="goede_antwoord">Goede antwoord</label>
        <select id="goede_antwoord" name="goede_antwoord">
        	<option value="1">1</option>
        	<option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        </li>
    </ul>
	<input type="submit" name="submit" value="Voeg toe" id="submit" class="button_big"  style="margin-right:30px !important;">
</form>
</div>