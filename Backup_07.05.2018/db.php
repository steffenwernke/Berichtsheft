<?php 


switch($benutzer){

case "root":
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "berichtsheft";

	break;

case "initialisierung":
	$servername = "localhost";
	$username = "initialisierung";
	$password = "123";
	$dbname = "berichtsheft";

	break;

case "ausbilder":	
	$servername = "localhost";
	$username = "ausbilder";
	$password = "123";
	$dbname = "berichtsheft";

	break;

case "teilnehmer":
	$servername = "localhost";
	$username = "teilnehmer";
	$password = "123";
	$dbname = "berichtsheft";
	break;
	
default: 
}
?>