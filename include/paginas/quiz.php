<h1>Quiz</h1>
<?php
if(isset($_SESSION['ingelogd']))
{
	$query = mysqli_query($con, "SELECT * FROM quiz WHERE game_id = '".$game_id."' ORDER BY quiz_id");
	if(mysqli_num_rows($query) >0)
		{
			$vraag = array();
			$antwoord1 = array();
			$antwoord2 = array();
			$antwoord3 = array();
			$antwoord4 = array();
			$soort_vraag = array();
			$goede_antwoord = array();
			while($row = mysqli_fetch_array($query))
			{
					$vraag[] = $row['vraag'];
					$antwoord1[] = $row['antwoord_1'];
					$antwoord2[] = $row['antwoord_2'];
					$antwoord3[] = $row['antwoord_3'];
					$antwoord4[] = $row['antwoord_4'];
					$soort_vraag[] = $row['soort_vraag'];
					$goede_antwoord[] = $row['goede_antwoord'];
					
			}
		}
		
		//JSON magic
		echo '<script>
		var i = 0;
		var score = 0;
		var credit = 0;
		var upload = false;
		var continueCountDown = true;
		var newElement = document.createElement("p");
		var eindscore = document.createElement("input");
		var eindcredits = document.createElement("input");
		var content = document.getElementById("content");
		var arrayVraag ='.json_encode($vraag).';
		var arrayAntwoord1 ='.json_encode($antwoord1).';
		var arrayAntwoord2 ='.json_encode($antwoord2).';
		var arrayAntwoord3 ='.json_encode($antwoord3).';
		var arrayAntwoord4 ='.json_encode($antwoord4).';
		var arraySoortVraag ='.json_encode($soort_vraag).';
		var arrayGoedeAntwoord ='.json_encode($goede_antwoord).';
		var goedeantwoordCheck = "";
		
		
		function countDown()
		{
			if(continueCountDown == true)
			{
				$("#timebar").animate({
					width: "0px"
				},10000, function(){
					console.log("done");
					i++;
					reloadQuestion();
					antwoordLaat();
				});
			}
		}
		
		function antwoordGoed()
		{
			
			$("#answer").html("Goed");
			$("#answer").animate({
   			 opacity: 1.00
 			 }, 1000, "linear" ,function() {
    			$("#answer").animate({
					opacity: 0.00
					}, 1000);
  			});
			$("#timebar").stop();
			$("#timebar").animate({
				width: "960px"
			}, 2000, function() {
				countDown();
			});
		}
		
		function antwoordLaat()
		{
			$("#answer").html("Tijd voorbij");
			$("#answer").animate({
   			 opacity: 1.00
 			 }, 1000, "linear" ,function() {
    			$("#answer").animate({
					opacity: 0.00
					}, 1000);
  			});
			$("#timebar").animate({
				width: "960px"
			}, 2000, function() {
				countDown();
			});
		}
		
		function antwoordFout()
		{
			$("#answer").html("Fout");
			$("#answer").animate({
   			 opacity: 1.00
 			 }, 1000, "linear" ,function() {
    			$("#answer").animate({
					opacity: 0.00
					}, 1000);
  			});
			$("#timebar").stop();
			$("#timebar").animate({
				width: "960px"
			}, 2000, function() {
				countDown();
			});
		}
		
		function cheat()
		{
			//-10 credits
			$.get("/include/updateCredits.php");
			updateScore();
			
			//bepaal welk antwoord er weggaat
			var arrayKeuzes = new Array("1","2","3","4");
			arrayKeuzes.splice($.inArray(goedeantwoordCheck, arrayKeuzes),1);
			var keuze = arrayKeuzes[Math.floor(Math.random()*arrayKeuzes.length)];
			window.verwijderkeuze = "quiz_antwoord" + keuze;
			$("."+verwijderkeuze+"").remove();
			arrayKeuzes.splice($.inArray(keuze, arrayKeuzes),1);

				
		}
		function reloadQuestion()
		{	
			if(i < arrayVraag.length)
			{	
				console.log("iets");
				$("#quiz_antwoorden,.question").animate({
   				opacity: 0.00
 				 }, 1500, function() {
					 $(".question").html(arrayVraag[i]);
					 if(arraySoortVraag[i] == "afbeelding")
					 {
						 $(".quiz_antwoord1").html("A <br><img src=\"/_img/quiz_afbeeldingen/" + arrayAntwoord1[i] + "\" width=\"150\"> ");
						 $(".quiz_antwoord2").html("B <br><img src=\"/_img/quiz_afbeeldingen/" + arrayAntwoord2[i] + "\" width=\"150\"> ");
						 $(".quiz_antwoord3").html("C <br><img src=\"/_img/quiz_afbeeldingen/" + arrayAntwoord3[i] + "\" width=\"150\"> ");
						$(".quiz_antwoord4").html("D <br><img src=\"/_img/quiz_afbeeldingen/" + arrayAntwoord4[i] + "\" width=\"150\"> ");
						 $("#quiz_antwoorden").css({"width": "600", "height": "425"});
					 }
					 else
					 {
						 $(".quiz_antwoord1").html("A <br>" + arrayAntwoord1[i]);
						 $(".quiz_antwoord2").html("B <br>" + arrayAntwoord2[i]);
						 $(".quiz_antwoord3").html("C <br>" + arrayAntwoord3[i]);
						 $(".quiz_antwoord4").html("D <br>" + arrayAntwoord4[i]);
						 $("#quiz_antwoorden").css({"width": "450", "height": "200"});
					 }
				 	$(".goedeantwoord").val(arrayGoedeAntwoord[i]);
				 
				 	goedeantwoordCheck = document.getElementById("goedeantwoord").value;
					$("#quiz_antwoorden,.question").animate({
   					opacity: 1.00
 				 	}, 1500);
  				});
			}
			else
			{
				console.log("einde quiz");
				$("#quiz_antwoorden,.question").animate({
   				opacity: 0.00
				}, 1500, function() {
					$("#timebar").stop();
					continueCountDown = false;
					$("#quiz_antwoorden,.question,.cheat").remove();
					$("#content").append("<h3 class=\"question\">Einde quiz</h3>");
					content.appendChild(newElement);
					newElement.className="eindscore";
					$(".eindscore").html("Uw eindscore is: "+score);
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
						if(upload == false)
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
		}
		
		$(document).ready(function(){
 				 $(".question").append(arrayVraag[i]);
				  if(arraySoortVraag[i] == "afbeelding")
					{
						$(".quiz_antwoord1").html("A <br><img src=\"/_img/quiz_afbeeldingen/" + arrayAntwoord1[i] + "\" width=\"150\"> ");
						 $(".quiz_antwoord2").html("B <br><img src=\"/_img/quiz_afbeeldingen/" + arrayAntwoord2[i] + "\" width=\"150\"> ");
						 $(".quiz_antwoord3").html("C <br><img src=\"/_img/quiz_afbeeldingen/" + arrayAntwoord3[i] + "\" width=\"150\"> ");
						 $(".quiz_antwoord4").html("D <br><img src=\"/_img/quiz_afbeeldingen/" + arrayAntwoord4[i] + "\" width=\"150\"> ");
						 $("#quiz_antwoorden").css({"width": "600", "height": "425"});
					}
					else
					{
					 $(".quiz_antwoord1").append(arrayAntwoord1[i]);
					 $(".quiz_antwoord2").append(arrayAntwoord2[i]);
					 $(".quiz_antwoord3").append(arrayAntwoord3[i]);
					 $(".quiz_antwoord4").append(arrayAntwoord4[i]);
					  $(".quiz_antwoord1").removeClass("quiz_afbeelding1");
					  $("#quiz_antwoorden").css({"width": "450", "height": "200"});
					}
				 $(".goedeantwoord").val(arrayGoedeAntwoord[i]);
				 countDown();
				 
				 goedeantwoordCheck = document.getElementById("goedeantwoord").value;
				 
				 $(".quiz_antwoord1").click(function(){
					 if(goedeantwoordCheck == 1)
					 {
						 console.log("Antwoord is goed");
						 score+=10;
						 credit++;
						 i++;
						 reloadQuestion();
						 antwoordGoed();
					 }
					 else
					 {
						console.log("Antwoord is fout"); 
						i++;
						reloadQuestion();
						antwoordFout();
					 }
				 });
				 
				  $(".quiz_antwoord2").click(function(){
					 if(goedeantwoordCheck == 2)
					 {
						 console.log("Antwoord is goed");
						 score+=10;
						 credit++;
						 i++;
						 reloadQuestion();
						 antwoordGoed();
					 }
					 else
					 {
						console.log("Antwoord is fout");
						i++;
						reloadQuestion();
						antwoordFout();
					 }
				 });
				 
				  $(".quiz_antwoord3").click(function(){
					 if(goedeantwoordCheck == 3)
					 {
						 console.log("Antwoord is goed");
						 score+=10;
						 credit++;
						 i++;
						 reloadQuestion();
						 antwoordGoed();
					 }
					 else
					 {
						console.log("Antwoord is fout");
						i++;
						reloadQuestion();
						antwoordFout();
					 }
				 });
				 
				  $(".quiz_antwoord4").click(function(){
					 if(goedeantwoordCheck == 4)
					 {
						 console.log("Antwoord is goed");
						 score+=10;
						 credit++;
						 i++;
						 reloadQuestion();
						 antwoordGoed(); 
					 }
					 else
					 {
						console.log("Antwoord is fout");
						i++;
						reloadQuestion();
						antwoordFout();
					 }
				 });
				 
				});';
		echo '</script>';
?>
	<h3 class="question"></h3>
    <span class="cheat fr" onclick="cheat()">Cheat<br /><span style="font-size:13px;" onclick="cheat()">10 credits</span></span>
	<div id="quiz_antwoorden">
	<span class="quiz_antwoord1">A<br></span>
    <span class="quiz_antwoord2">B<br></span>
    <span class="quiz_antwoord3">C<br></span>
    <span class="quiz_antwoord4">D<br></span>
	</div>
    <form action="" id="hiddenForm" method="POST"><input type="hidden" value="" class="goedeantwoord" id="goedeantwoord"></form>
    <h3 class="answer" id="answer"></h3>
    <div id="timebar"></div>
        
<?php
}
else
{
	echo '<meta http-equiv="REFRESH" content="0;url=http://'.$siteAddress.'/">';
}
?>
