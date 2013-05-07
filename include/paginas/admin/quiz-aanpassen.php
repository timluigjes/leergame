<?php
$vraag = '';
$antwoord1 = '';
$antwoord2 = '';
$antwoord3 = '';
$antwoord4 = '';
$query = mysqli_query($con, "SELECT * FROM quiz WHERE quiz_id = '".$game_id."'");
if(mysqli_num_rows($query) == 1)
{
	$row = mysqli_fetch_array($query);
	$vraag = $row['vraag'];
	$soort_vraag = $row['soort_vraag'];
	$antwoord1 = $row['antwoord_1'];
	$antwoord2 = $row['antwoord_2'];
	$antwoord3 = $row['antwoord_3'];
	$antwoord4 = $row['antwoord_4'];
	$goede_antwoord = $row['goede_antwoord'];
}


if(isset($_POST['submit']))
{
	$vraag = $_POST['vraag'];
	$soort_vraag = $_POST['soort_vraag'];
	$antwoord1 = $_POST['antwoord1'];
	$antwoord2 = $_POST['antwoord2'];
	$antwoord3 = $_POST['antwoord3'];
	$antwoord4 = $_POST['antwoord4'];
	$goede_antwoord = $_POST['goede_antwoord'];
	
	$query = mysqli_query($con, "UPDATE quiz SET vraag = '".$vraag."', soort_vraag = '".$soort_vraag."', antwoord_1 = '".$antwoord1."', antwoord_2 = '".$antwoord2."', antwoord_3 = '".$antwoord3."', antwoord_4 = '".$antwoord4."', goede_antwoord = '".$goede_antwoord."' WHERE quiz_id = '".$game_id."' ");
	
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/admin/categories/'.$game_id.'/aanpassen">';
}
?>
<h1>Vraag aanpassen</h1>
<div id="instellingencontent">
<form enctype="multipart/form-data" method="post" action="" name="instellingenform" style="width:450px !important">	
    <ul id="instellingenformlist">
        <li><label for="vraag">Vraag</label><input type="text" name="vraag" class="long" id="vraag" value="<?php if($vraag != '') { echo $vraag; } ?>"></li>
        <li><label for="antwoord1">Antwoord 1</label><input type="text" name="antwoord1" class="long" id="antwoord1" value="<?php if($antwoord1 != '') { echo $antwoord1; } ?>"></li>
        <li><label for="antwoord2">Antwoord 2</label><input type="text" name="antwoord2" class="long" id="antwoord2" value="<?php if($antwoord2 != '') { echo $antwoord2; } ?>"></li>
        <li><label for="antwoord3">Antwoord 3</label><input type="text" name="antwoord3" class="long" id="antwoord3" value="<?php if($antwoord3 != '') { echo $antwoord3; } ?>"></li>
        <li><label for="antwoord4">Antwoord 4</label><input type="text" name="antwoord4" class="long" id="antwoord4" value="<?php if($antwoord4 != '') { echo $antwoord4; } ?>"></li>
        <li>
        <label for="soort_vraag">Soort vraag</label>
        <select id="soort_vraag" name="soort_vraag">
        	<option value=""></option>
        	<option value="tekst" <?php if($soort_vraag == 'tekst') { echo 'selected'; } ?>>Tekst</option>
            <option value="afbeelding"  <?php if($soort_vraag == 'afbeelding') { echo 'selected'; } ?>>Afbeelding</option>
        </select>
        </li>
       	<li>
        <label for="goede_antwoord">Goede antwoord</label>
        <select id="goede_antwoord" name="goede_antwoord">
        	<option value="1" <?php if($goede_antwoord == '1') { echo 'selected'; }?>>1</option>
        	<option value="2"  <?php if($goede_antwoord == '2') { echo 'selected'; }?>>2</option>
            <option value="3"  <?php if($goede_antwoord == '3') { echo 'selected'; }?>>3</option>
            <option value="4"  <?php if($goede_antwoord == '4') { echo 'selected'; }?>>4</option>
        </select>
        </li>
    </ul>
	<input type="submit" name="submit" value="Aanpassen" id="submit" class="button_big" style="margin-right:30px !important;">
</form>
</div>