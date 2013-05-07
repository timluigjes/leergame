<h1>Categorie&euml;n</h1>
<?php
if(isset($_SESSION['ingelogd']))
{
	$query = mysqli_query($con, "SELECT * FROM games ORDER BY game_id");
	if(mysqli_num_rows($query) >0)
		{
			$i = 0;
			echo '<table id="games">';
			echo '<tr> <td class="column1">#</td> <td class="column2">Naam</td> <td class="column3">Soort game</td>  <td class="column4">Aantal</td></tr>';
			while($row = mysqli_fetch_array($query))
			{
				$i++;
				echo '<tr><td class="column1">'.$i.'</td><td class="column2"><a href="/'.$row['soort_game'].'/'.$row['game_id'].'">'.$row['naam'].'</a></td><td class="column3">'.$row['soort_game'].'</td><td class="column4">'.$row['aantal_vragen'].'</td></tr>';	
			}
			echo '</table>';
		}
}
else
{
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/">';
}
?>