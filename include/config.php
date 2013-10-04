<?php
session_start();  
 
//error_reporting(E_ALL);
//ini_set('display_errors', 'on'); 

$dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ  
$dbname = ""; // the name of the database that you are going to use for this project  
$dbuser = ""; // the username that you created, or were given, to access your database  
$dbpass = ""; // the password that you created, or were given, to access your database 

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("MySQL Error: " . mysqli_error($con)); 

$siteAddress = 'examen.pictor.ws';
?>
