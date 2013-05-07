<?php
if(isset($_SESSION['ingelogd']))
{
	echo '<h1>Leergame</h1><p style="text-align:center;">Welkom, op deze website kun je het leermateriaal van de les oefenen.</p>';	
}
else
{
	echo '
<img src="_img/logo.png" height="140" width="140" alt="Pictor">
<h2 class="title">Leergame</h2>
<div class="button_big fl" style="margin-top:20px;">
<a href="/registratie">Registratie</a>
</div>
<div class="button_big fr" style="margin-top:20px; margin-right:80px;">
<a href="/login" >Login</a>
</div>
';
}
?>