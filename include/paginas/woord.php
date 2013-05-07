<h1 id="titel">Raad het woord</h1>
<?php
if(isset($_SESSION['ingelogd']))
{
	$query = mysqli_query($con, "SELECT * FROM raad_het_woord WHERE game_id = '".$game_id."' ORDER BY woord_id");
	if(mysqli_num_rows($query) >0)
		{
			$afbeelding = array();
			$woord = array();
			while($row = mysqli_fetch_array($query))
			{
					$afbeelding[] = $row['afbeelding'];
					$woord[] = $row['woord'];
					
			}
		}
?>
		<script>
		var i = 0;
		var score = 0;
		var credit = 0;
		var randomKey = '';
		var randomValue  = '';
		var aantalgoedeLetters = 0;
		var continueCountDown = true;
		var newElement = document.createElement("p");
		var eindespelTeken = document.createElement("h3");
		var eindscore = document.createElement("input");
		var eindcredits = document.createElement("input");
		var content = document.getElementById("content");
		var upload = false;
		var alfabet = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
		var arrayAfbeeldingen = <?php echo json_encode($afbeelding); ?>;
		var arrayWoorden = <?php echo json_encode($woord);?>;
		var arrayRandomLetters = [];
		var arrayLetters = [];
		var arrayKeuzes = [];
		var arrayCheat = [];
		
		
		$(document).ready(function(){
				"use strict";
				console.log("geladen");
				nieuwWoord();
				countDown();
			});
			
		function countDown()
		{
			if(continueCountDown == true)
			{
				$("#timebar").animate({
					width: "0px"
				},20000, function(){
					console.log("done");
					i++;
					antwoordLaat();
				});
			}
		}
		
		function antwoordLaat()
		{	
			$(".woord_letter, .image, .letter_keuze").animate({
					opacity:0
				}, 1000);
				setTimeout(function() {
				$(".woord_letter").remove();
				$(".letter_keuze").remove();
				if(i < arrayWoorden.length)
				{
					nieuwWoord();
				}
				else
				{
					reloadQuestion();	
				}
				},2000);
			$("#timebar").animate({
				width: "960px"
			}, 2000, function() {
				countDown();
			});
		}
		
		function laatLetterZien(nummer)
			{
				if(aantalgoedeLetters < woord.length)
				{
					$(".woord_letter").filter(function (index) {
					  return index === nummer;
					})
					.animate({
					opacity: 1
					}, 500 );
					if(nummer >= woord.length)
					{
						score--;	
					}
					else
					{
						aantalgoedeLetters++;
					}
					$("span[name="+nummer+"].letter_keuze").animate({
						opacity: 0
					}, 500, function(){
						$(this).remove();
					});
					Woordcompleet();
				}
			}
			
		function cheat()
		{
			//-10 credits
			$.get("/include/updateCredits.php");
			updateScore();
			console.log("iets1");
			//bepaal welk antwoord er weggaat
			if(arrayCheat.length == 0)
			{
				for(var u=0; u<arrayLetters.length;u++)
				{
					arrayCheat.push(u);
				}
			}
			console.log("iets2");
			for(var u=0; u<woord.length;u++)
			{
				arrayCheat.splice(0,1);	
			}
			console.log("iets3");
			
			randomKey = Math.floor(Math.random() * arrayCheat.length);
			randomValue = arrayCheat[randomKey];
			console.log("iets4");
			$("span[name="+randomValue+"].letter_keuze").animate({
				opacity: 0
			}, 500,function() {
				$(this).remove();
				console.log("iets5");	
			});
			
		}
		
		
		function Woordcompleet()
		{
			if(aantalgoedeLetters === woord.length)
			{
				$("#timebar").stop();
				$("#timebar").animate({
					width: "960px"
				}, 2000, function() {
					countDown();
				});
				i++;
				score += 10;
				credit++;
				if(i < arrayWoorden.length)
				{
					console.log("iet4s");
					$(".woord_letter, .image, .letter_keuze").animate({
					opacity:0
				}, 1000);
				setTimeout(function() {
				$(".woord_letter").remove();
				$(".letter_keuze").remove();
				nieuwWoord();
				},2000);
				console.log("volgende woord");
				}
				else{
					reloadQuestion();
				}
			}
		}
			
			
			
			function reloadQuestion()
			{	
				console.log("einde spel");
					$("#timebar").stop();
					$(".image,.woord_letter,.letter_keuze").animate({
					opacity: 0.00
					}, 1500, function() {
						continueCountDown = false;
						$(".image, #woord_letters, #letter_keuzes,.cheat").remove();
						content.appendChild(eindespelTeken);
						content.appendChild(newElement);
						newElement.className="eindscore";
						eindespelTeken.className="question";
						$(".eindscore").html("Uw eindscore is: "+score);
						$(".question").html("Einde spel");
						eindscore.type = "hidden";
						eindcredits.type = "hidden";
						eindscore.name = "finalscore";
						eindcredits.name = "finalcredits";
						eindscore.id = "finalscore";
						eindcredits.id = "finalcredits";
						eindscore.value = score;
						eindcredits.value = credit;
						document.getElementById("hiddenForm").appendChild(eindscore);
						document.getElementById("hiddenForm").appendChild(eindcredits);
						setTimeout(function(){
							if(upload === false)
							{
								upload = true;
								$.post("/include/getResult.php", { finalscore:score, finalcredits:credit }, function(data){
									console.log("Data: " + data);
								});
								updateScore();
							}
						},800);
					});
				}
			
			function nieuwWoord()
			{
				console.log("1");
				aantalgoedeLetters = 0;
				alfabet = [];
				alfabet = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
				arrayRandomLetters = [];
				arrayLetters = [];
				arrayKeuzes = [];
				woord = [];
				$("#antwoord").val(arrayWoorden[i]);
				$(".image").attr("src", "/_img/woord_afbeeldingen/" + arrayAfbeeldingen[i]);
				antwoord = document.getElementById("antwoord").value;
				woord = antwoord.split("");
		
			
				//split het antwoord en zet het op het veld
				for (var u=0;u<woord.length;u++)
				{
					$("#woord_letters").append("<span class=\"woord_letter\" name=\""+ u +"\">" +woord[u] + "</span>");
				}
				console.log("2");
				
				//haal alle gebruikte letters uit het alfabet.
				for(var u=0;u<woord.length;u++)
				{
					alfabet.splice($.inArray(woord[u], alfabet),1);
				}
				console.log("3");
				
				//haal 5 willekeurige letters uit het overige alfabet en voeg ze toe aan een array
				for(var u=0;u<5;u++)
				{
					arrayRandomLetters.push(alfabet[Math.floor(Math.random()*alfabet.length)]);	
				}
				console.log("4");
				
				//join de 2 arrays
				arrayLetters = woord.concat(arrayRandomLetters);
				console.log("5");
				for(var u=0;u<arrayLetters.length;u++)
				{
					arrayKeuzes.push("<span class=\"letter_keuze\" name=\""+u+"\" onclick=\"laatLetterZien("+u+")\">" +arrayLetters[u] + "</span>");
				}
				console.log("6");
				arrayKeuzes.randomize();
				
				//zet de letters op het veld
				for (var u=0;u<arrayLetters.length;u++)
				{
					$("#letter_keuzes").append(arrayKeuzes[u]);
				}
				console.log("7");
				
				$(".letter_keuze, .image").animate({
					opacity:1
				}, 1000);
				console.log("8");
				}
		
		</script>
		<img class="image" src="">
         <span class="cheat fr" onclick="cheat()">Cheat<br /><span style="font-size:13px;" onclick="cheat()">10 credits</span></span>
     	<div id="woord_letters">
        </div>
		<div id="letter_keuzes">
			
		</div>
        <form action="" id="hiddenForm" method="POST"><input type="hidden" id="antwoord" name="woord" value=""></form>
        <div id="timebar"></div>
<?php
}
else
{
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/">';
}
?>
