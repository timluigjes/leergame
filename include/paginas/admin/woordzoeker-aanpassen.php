<?php
$query =  mysqli_query($con, "SELECT woord FROM woordzoeker WHERE woordzoeker_id = '".$game_id."'");

if(mysqli_num_rows($query) == 1)
{
	$row = mysqli_fetch_array($query);
	$woord = $row['woord'];
}
if(isset($_POST['submit']))
{
		$woord = mysqli_real_escape_string($con,$_POST['woord']);
		
			$query = mysqli_query($con, "UPDATE woordzoeker SET woord = '".$woord."' WHERE woordzoeker_id = '".$game_id."'");
			
			echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/admin/categories/">';
}
?>
<h1>Woord aanpassen</h1>
<div id="instellingencontent">
<form enctype="multipart/form-data" method="post" action="">
    <ul id="registratieform">
        <li><label for="woord">Woord</label><input type="text" name="woord" class="text" id="woord" value="<?php if($woord != '') {  echo $woord; } ?>"></li>
    </ul>
	<input type="submit" name="submit" value="Aanpassen" id="submit" class="button_big">
</form>
</div>