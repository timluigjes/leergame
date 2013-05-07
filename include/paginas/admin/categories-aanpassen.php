<h1>Game aanpassen</h1>
<?php
$query = mysqli_query($con, "SELECT soort_game FROM games WHERE game_id = '".$game_id."'");
if(mysqli_num_rows($query) == 1)
{
	$row = mysqli_fetch_array($query);
	echo '<ul id="menu"><li><a href="/admin/'.$row['soort_game'].'/'.$game_id.'/nieuw" class="button" style="margin-left:0 !important; margin-bottom:10px;">Nieuw</a></li></ul>';
	if($row['soort_game'] == 'quiz')
	{
		$query = mysqli_query($con, "SELECT * FROM quiz WHERE game_id = '".$game_id."' ORDER BY  quiz_id");
		if(mysqli_num_rows($query) > 0)
		{
			echo '<table id="categories-admin">';
			echo '<tr><td class="quiz-vraag">Vraag</td> <td class="categories-soort-game">Soort Vraag</td> <td class="categories-acties"></td></tr>';
			while($row = mysqli_fetch_array($query))
			{
				echo '<tr><td class="quiz-vraag">'.$row['vraag'].'</td> <td class="categories-soort-game">'.$row['soort_vraag'].'</td><td class="categories-acties"><ul id="menu" class="fr"><li><a href="/admin/quiz/'.$row['quiz_id'].'/aanpassen" class="button">Aanpassen</a></li><li><a href="/admin/quiz/'.$row['quiz_id'].'/verwijderen" class="button" style="margin-right:10px;">Verwijderen</a></li></ul></td></tr>';	
			}
			echo '</table>';	
		}
	}
	else if($row['soort_game'] == 'woord')
	{
		$query = mysqli_query($con, "SELECT * FROM raad_het_woord WHERE game_id = '".$game_id."' ORDER BY  woord_id");
		if(mysqli_num_rows($query) > 0)
		{
			echo '<table id="categories-admin">';
			echo '<tr><td class="woord-woord">Woord</td><td class="categories-acties"></td></tr>';
			while($row = mysqli_fetch_array($query))
			{
				echo '<tr><td class="woord-woord">'.$row['woord'].'</td> <td class="categories-acties"><ul id="menu" class="fr"><li><a href="/admin/woord/'.$row['woord_id'].'/aanpassen" class="button">Aanpassen</a></li><li><a href="/admin/woord/'.$row['woord_id'].'/verwijderen" class="button" style="margin-right:10px;">Verwijderen</a></li></ul></td></tr>';	
			}
			echo '</table>';	
		}
	}
	else if($row['soort_game'] == 'woordzoeker')
	{
		$query = mysqli_query($con, "SELECT * FROM woordzoeker WHERE game_id = '".$game_id."' ORDER BY  woordzoeker_id");
		if(mysqli_num_rows($query) > 0)
		{
			echo '<table id="categories-admin">';
			echo '<tr><td class="woord-woord">Woord</td><td class="categories-acties"></td></tr>';
			while($row = mysqli_fetch_array($query))
			{
				echo '<tr><td class="woord-woord">'.$row['woord'].'</td> <td class="categories-acties"><ul id="menu" class="fr"><li><a href="/admin/woordzoeker/'.$row['woordzoeker_id'].'/aanpassen" class="button">Aanpassen</a></li><li><a href="/admin/woordzoeker/'.$row['woordzoeker_id'].'/verwijderen" class="button" style="margin-right:10px;">Verwijderen</a></li></ul></td></tr>';	
			}
			echo '</table>';	
		}
	}
	else
	{
		echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/admin/categories/">';
	}
}
else
{
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/admin/categories/">';	
}
?>