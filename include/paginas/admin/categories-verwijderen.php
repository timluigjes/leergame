<?php
if(isset($_POST['submit']))
{
	$query = mysqli_query($con, "DELETE FROM games WHERE game_id = '".$game_id."'");
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/admin/categories/">';
}
if(isset($_POST['terug']))
{
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/admin/categories/">';
}

?>
<h1>Game verwijderen</h1>
<div id="instellingencontent">
<p style="text-align:center;">Weet u zeker dat u de game wilt verwijderen?</p>
<form enctype="multipart/form-data" method="post" action="">
	<input type="submit" name="submit" value="Ja" id="gebruikerverwijderen" class="button_big">
    <input type="submit" name="terug" value="Nee" id="gebruikerverwijderen" class="button_big">
</form>
</div>