<?php
include('include/config.php');
include('include/content.php');
include('include/functions.php');
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Leergame</title>
<link rel="stylesheet" href="/_css/core.css" media="screen">
<link href='http://fonts.googleapis.com/css?family=Cabin:400,700' rel='stylesheet' type='text/css'>
<?php
if($p != 'woordzoeker')
{
	echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>';
}
else
{
	echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>';
}
?>
<script src="/_js/jquery.backstretch.min.js"></script>
<script src="/_js/functions.js"></script>
<?php
if($p == 'woordzoeker')
{
	echo '<script src="/_js/jquery-ui-1.8.16.custom.min.js"></script>';
	echo '<script src="/_js/jquery.wordsearchgame.js"></script>';
	echo '<link  rel="stylesheet" type="text/css" href="/_css/jquery.wordsearchgame.css">';
}
?>
<script>
$(function(){
    $('#wrapper').css({'height':($(document).height())+'px'});
    $(window).resize(function(){
        $('#wrapper').css({'height':($(document).height())+'px'});
    });
});
</script>
</head>

<body id="<?php echo $body; ?>">
<div id="wrapper">
	<?php if($body != 'registratie')
	{
		echo '<div id="masthead">';
    		include('include/elements/masthead.php');	
		echo '</div>';
	}
	?>
    <div id="content">
    	<?php include('include/paginas/'.$p.'.php');?>
    </div>
</div>
<script>
	$.backstretch("/_img/achtergrond.jpg");
</script>
</body>
</html>