<?php
include("header.php");
 

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
		<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" href="css/custom.css">
      <h1 class="padding">Berichtsheft</h1>
   </head>
   <body>
   <div class="textorange1 padding">
	
		<a href="./ausbilder_offene.php">Offene Eintraege ansehen</a> 
		<a href="./ausbilder_abgegebene.php">Abgegebene Eintraege bearbeiten</a> 
		<a href="./ausbilder_fertige.php">Fertige Eintraege ansehen</a> 
	</div>	
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