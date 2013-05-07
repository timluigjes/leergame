<?php
if(isset($_POST['submit']))
{
	$query = mysqli_query($con, "DELETE FROM gebruikers WHERE leerlingennummer = '".$leerlingennummer."'");
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/admin/gebruikers/">';
}
if(isset($_POST['terug']))
{
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/admin/gebruikers/">';
}

?>
<h1>Gebruiker verwijderen</h1>
<div id="instellingencontent">
<p style="text-align:center;">Weet u zeker dat u de gebruiker met het leerlingennummer <?php echo $leerlingennummer; ?> wilt verwijderen?</p>
<form enctype="multipart/form-data" method="post" action="">
	<input type="submit" name="submit" value="Ja" id="gebruikerverwijderen" class="button_big">
    <input type="submit" name="terug" value="Nee" id="gebruikerverwijderen" class="button_big">
</form>
</div>