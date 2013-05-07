<?php
if(isset($_POST['submit']))
{
	$query = mysqli_query($con, "SELECT game_id FROM woordzoeker WHERE woordzoeker_id = '".$game_id."'");
	if(mysqli_num_rows($query) == 1)
	{
		$row = mysqli_fetch_array($query);
		$gameId = $row['game_id'];
	}
	$query = mysqli_query($con, "DELETE FROM woordzoeker WHERE woordzoeker_id = '".$game_id."'");
	
	$query = mysqli_query($con, "SELECT game_id FROM woordzoeker WHERE game_id = '".$gameId."'");
	if(mysqli_num_rows($query) > 0)
	{
		$query = mysqli_query($con, "UPDATE games SET aantal_vragen = '".mysqli_num_rows($query)."' WHERE game_id = '".$gameId."'");
	}
	
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/admin/categories/">';
}
if(isset($_POST['terug']))
{
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/admin/categories/">';
}

?>
<h1>Woord verwijderen</h1>
<div id="instellingencontent">
<p style="text-align:center;">Weet u zeker dat u dit woord wilt verwijderen?</p>
<form enctype="multipart/form-data" method="post" action="">
	<input type="submit" name="submit" value="Ja" id="gebruikerverwijderen" class="button_big">
    <input type="submit" name="terug" value="Nee" id="gebruikerverwijderen" class="button_big">
</form>
</div>