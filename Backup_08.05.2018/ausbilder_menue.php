<?php
include("header.php");


echo $_SESSION['benutzer']; 

$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}   
$Tname = $_SESSION['loginname'];


?>


<html>
   <head>
	 	<meta charset="utf-8">
      <title>Berichtsheft</title>
   </head>
   <body>
		<strong>Willkommen beim Berichtsheft-Manager</strong> <br />
		<strong>==============================</strong> <br /><br />
		<a href="./ausbilder_offene.php">Offene Eintraege ansehen</a> <br /><br /><br />
		<a href="./ausbilder_abgegebene.php">Abgegebene Eintraege bearbeiten</a> <br /><br /><br />
		<a href="./ausbilder_fertige.php">Fertige Eintraege ansehen</a> <br /><br /><br />
   </body>
</html>
<?php


if(isset($_POST['bestätigen'])){
			echo "Bericht wurde bestätigt";	
			
$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}   	

	$sessionENr = $_SESSION['ENr'];	
		
	$queryBestaetigen ="UPDATE eintraege SET EStatus = 2 WHERE ENr = '$sessionENr'";
	
	$stmt = $conn->prepare($queryBestaetigen); 
	$stmt->execute();
}	
	
if(isset($_POST['ablehnen'])){
			echo "Bericht wurde abgelehnt";	
			
$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}   	

	$sessionENr = $_SESSION['ENr'];	
		
	$queryBestaetigen ="UPDATE eintraege SET EStatus = 0 WHERE ENr = '$sessionENr'";
	
	$stmt = $conn->prepare($queryBestaetigen); 
	$stmt->execute();	
	
}

unset($_SESSION['ENr']);


?>