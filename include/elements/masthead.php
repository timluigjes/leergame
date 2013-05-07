<?php
if(isset($_SESSION['ingelogd']))
{
	$query = mysqli_query($con, "SELECT * FROM gebruikers WHERE leerlingennummer = '".$_SESSION['leerlingennummer']."'");
		if(mysqli_num_rows($query) == 1)
		{
			$row = mysqli_fetch_array($query);
			$score = $row['score'];
			$credits = $row['credits'];
			$afbeelding = $row['afbeelding'];
			
		}
	echo '<div id="userinfo" class="fl">';
	echo '<img src="/_img/avatars/'.$afbeelding.'" width="30" height="30" alt="avatar"><span class="m5">'.$_SESSION['naam'].'</span><span class="m50" id="userscore">Score: '.$score.' </span> <span class="m50" id="usercredits">Credits: '.$credits.'</span>';	
	echo '</div>';
	
	echo '<div id="menu" class="fr">';
	if($p != 'admin')
	{
	echo '<ul><li><a href="/" class="button">Home</a></li> <li><a href="/categories" class="button">Categorie&euml;n</a></li> <li><a href="/instellingen" class="button">Instellingen</a></li>'; if($_SESSION['admin'] == '1') { echo '<li><a href="/admin" class="button">Admin</a></li>'; } echo '<li><a href="/logout" class="login_btn">Log uit</a></li>';
	}
	else
	{
		echo '<ul><li><a href="/admin" class="button">Home</a></li> <li><a href="/admin/gebruikers" class="button">Gebruikers</a></li> <li><a href="/admin/categories" class="button">Categorie&euml;n</a></li> <li><a href="/" class="button">Leergame</a></li> <li><a href="/logout" class="login_btn">Log uit</a></li>';
	}
	echo '</div>';
}
?>