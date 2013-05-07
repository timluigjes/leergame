<h1>Categorie&euml;n</h1>
<?php
$query = mysqli_query($con, "SELECT * FROM games WHERE soort_game = 'quiz' ORDER BY game_id");
			echo '<ul id="menu"><li><a href="/admin/categories/nieuw" class="button" style="margin-left:0 !important; margin-bottom:10px;">Nieuw</a></li></ul>';
if(mysqli_num_rows($query) >0)
		{
			echo '<table id="categories-admin">';
			echo '<tr><td class="categories-naam">Naam</td> <td class="categories-soort-game">Soort Game</td> <td class="categories-aantal">Aantal</td>  <td class="categories-acties"></td></tr>';
			while($row = mysqli_fetch_array($query))
			{
				echo '<tr><td class="categories-naam">'.$row['naam'].'</td> <td class="categories-soort-game">'.$row['soort_game'].'</td> <td class="categories-aantal-vragen">'.$row['aantal_vragen'].'</td> <td class="categories-acties"><ul id="menu" class="fr"><li><a href="/admin/categories/'.$row['game_id'].'/aanpassen" class="button">Aanpassen</a></li><li><a href="/admin/categories/'.$row['game_id'].'/verwijderen" class="button" style="margin-right:10px;">Verwijderen</a></li></ul></td></tr>';	
			}
			echo '</table>';
		}
		
$query = mysqli_query($con, "SELECT * FROM games WHERE soort_game = 'woord' ORDER BY game_id");
if(mysqli_num_rows($query) >0)
		{
			echo '<table id="categories-admin">';
			echo '<tr><td class="categories-naam">Naam</td> <td class="categories-soort-game">Soort Game</td> <td class="categories-aantal">Aantal</td>  <td class="categories-acties"></td></tr>';
			while($row = mysqli_fetch_array($query))
			{
				echo '<tr><td class="categories-naam">'.$row['naam'].'</td> <td class="categories-soort-game">'.$row['soort_game'].'</td> <td class="categories-aantal-vragen">'.$row['aantal_vragen'].'</td> <td class="categories-acties"><ul id="menu" class="fr"><li><a href="/admin/categories/'.$row['game_id'].'/aanpassen" class="button">Aanpassen</a></li><li><a href="/admin/categories/'.$row['game_id'].'/verwijderen" class="button" style="margin-right:10px;">Verwijderen</a></li></ul></td></tr>';	
			}
			echo '</table>';
		}
		
$query = mysqli_query($con, "SELECT * FROM games WHERE soort_game = 'woordzoeker' ORDER BY game_id");
if(mysqli_num_rows($query) >0)
		{
			echo '<table id="categories-admin">';
			echo '<tr><td class="categories-naam">Naam</td> <td class="categories-soort-game">Soort Game</td> <td class="categories-aantal">Aantal</td>  <td class="categories-acties"></td></tr>';
			while($row = mysqli_fetch_array($query))
			{
				echo '<tr><td class="categories-naam">'.$row['naam'].'</td> <td class="categories-soort-game">'.$row['soort_game'].'</td> <td class="categories-aantal-vragen">'.$row['aantal_vragen'].'</td> <td class="categories-acties"><ul id="menu" class="fr"><li><a href="/admin/categories/'.$row['game_id'].'/aanpassen" class="button">Aanpassen</a></li><li><a href="/admin/categories/'.$row['game_id'].'/verwijderen" class="button" style="margin-right:10px;">Verwijderen</a></li></ul></td></tr>';	
			}
			echo '</table>';
		}
?>