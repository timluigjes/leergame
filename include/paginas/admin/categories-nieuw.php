<?php
if(isset($_POST['submit']))
{
	$soortgame = $_POST['soort_game'];
	$naam = $_POST['naam'];
	
	$query = mysqli_query($con, "INSERT INTO games (naam, soort_game, aantal_vragen) VALUES ('".$naam."','".$soortgame."','0')");
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/admin/categories/">';
}
?>
<h1>Nieuwe game</h1>
<div id="instellingencontent">
<form enctype="multipart/form-data" method="post" action="" name="instellingenform">
    <ul id="instellingenformlist">
        <li><label for="naam">Naam</label><input type="text" name="naam" class="text" id="naam" value=""></li>
       	<li>
        <label for="soort">Soort game</label>
        <select id="soort_game" name="soort_game">
        	<option value=""></option>
        	<option value="quiz">Quiz</option>
            <option value="woord">Raad het woord</option>
            <option value="woordzoeker">Woordzoeker</option>
        </select>
        </li>
    </ul>
	<input type="submit" name="submit" value="Voeg toe" id="submit" class="button_big">
</form>
</div>