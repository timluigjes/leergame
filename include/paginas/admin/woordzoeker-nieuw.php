<?php
if(isset($_POST['submit']))
{
	trim($_POST['woord']);
	$woorden = explode(",",$_POST['woord']);
	
	foreach($woorden as $woord)
	{
		$query = mysqli_query($con, "INSERT INTO woordzoeker (woord, game_id) VALUES ('".$woord."','".$game_id."')");
	}
	$query = mysqli_query($con, "SELECT game_id FROM woordzoeker WHERE game_id = '".$game_id."'");
	if(mysqli_num_rows($query) > 0)
	{
		$query = mysqli_query($con, "UPDATE games SET aantal_vragen = '".mysqli_num_rows($query)."' WHERE game_id = '".$game_id."'");
	}
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/admin/categories/">';
}
echo $game_id;
?>
<h1>Nieuw woord</h1>
<div id="instellingencontent">
<form enctype="multipart/form-data" method="post" action="" name="instellingenform">
    	<p>Gebruik een komma voor een nieuw woord</p>
        <textarea id="woord" name="woord" style="width:400px; height:150px; margin-top:15px;"></textarea>
	<input type="submit" name="submit" value="Voeg toe" id="submit" class="button_big" style="margin-right:0 !important; margin-top:10px;">
</form>
</div>