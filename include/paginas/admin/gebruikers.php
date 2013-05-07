<h1>Gebruikers</h1>
<?php
$query = mysqli_query($con, "SELECT * FROM gebruikers ORDER BY id");
if(mysqli_num_rows($query) >0)
		{
			echo '<ul id="menu"<li><a href="/admin/gebruikers/nieuw" class="button" style="margin-left:0 !important;  margin-bottom:10px;">Nieuw</a></li></ul>';
			echo '<table id="gebruikers">';
			echo '<tr> <td class="gebruikers-afbeelding"></td> <td class="gebruikers-naam">Naam</td> <td class="gebruikers-credits">Credits</td> <td class="gebruikers-score">Score</td> <td class="gebruikers-leerlingennummer">Leerlingennummer</td> <td class="gebruikers-acties"></td>  </tr>';
			while($row = mysqli_fetch_array($query))
			{
				echo '<tr> <td class="gebruikers-afbeelding"><img src="/_img/avatars/'.$row['afbeelding'].'" height="50" width="50"></td> <td class="gebruikers-naam">'.$row['naam'].'</td> <td class="gebruikers-credits">'.$row['credits'].'</td> <td class="gebruikers-score">'.$row['score'].'</td> <td class="gebruikers-leerlingennummer">'.$row['leerlingennummer'].'</td> <td class="gebruikers-acties"><ul id="menu" class="fr"><li><a href="/admin/gebruikers/'.$row['leerlingennummer'].'/aanpassen" class="button">Aanpassen</a></li><li><a href="/admin/gebruikers/'.$row['leerlingennummer'].'/verwijderen" class="button" style="margin-right:10px;">Verwijderen</a></li></ul></td>  </tr>';	
			}
			echo '</table>';
		}
?>