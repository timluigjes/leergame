<h1 style="margin-bottom:15px !important;">Woordzoeker</h1>
<?php
$lijst = '';
$query = mysqli_query($con, "SELECT * FROM woordzoeker WHERE game_id = '".$game_id."'");
if(mysqli_num_rows($query) >0)
{
	$woorden = array();
	while($row = mysqli_fetch_array($query))
	{
		array_push($woorden, $row['woord']);	
	}
	
	
}

?>
<script>
var score = 0;
var credit = 0;
$(document).ready( function () {
	var words = "<?php 
	foreach ($woorden as $woord) {
   		$lijst .= $woord.",";
	}
	echo substr_replace($lijst,"",-1);
	
	?>";
	//attach the game to a div
	$("#wrapper").css("height", "730");
	$("#theGrid").wordsearchwidget({"wordlist" : words,"gridsize" :11 });
});
</script>


 <div id="theGrid"></div>