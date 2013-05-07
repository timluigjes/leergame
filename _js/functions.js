function updateScore()
{
	var once = false;
	if(once == false)
	{
		once = true;
		$(".m5,.m50").animate({
				 opacity: 0.00
				 }, 1000, "linear" ,function() {
					$.get("/include/updateScore.php", function(data) {
  						$("#userscore").html("Score: " + data[0]);
						$("#usercredits").html("Credits:" + data[1]);
						$(".m5").html(data[2]);
						console.log("score = " + data[0] + " credits = " + data[1] + "");
					}, "json");
				setTimeout(function(){
				$(".m5,.m50").animate({
					opacity: 1.00
					}, 1000);
				},1000);
		});
	}
}

Array.prototype.randomize = function randomize()
{
	var i = this.length, j, temp;
	while ( --i )
	{
		j = Math.floor( Math.random() * (i - 1) );
		temp = this[i];
		this[i] = this[j];
		this[j] = temp;
	}
}