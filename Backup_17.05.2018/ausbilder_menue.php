<?php
include("header.php");
include("function.php");
 
if($_SESSION['benutzer'] == "ausbilder"){
 
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
		 <div class="container bg-faded mt-3">
		<h1 class=" pb-2 orange1 textblue1"><img src="logo.jpg" alt="firmensymbol" height="65" width="350">Berichtsheft<span class=" text-right size left textblue1"><?php echo "$Tname" . " " ?><a class='text-right size' href='index.php' onclick='logout()'>abmelden</a></span></h1>
		</div>
   </head>
   <body>
   <div class="padding contentleft">
  
		
		<br></br>
		<div class="padding textblue1">Hier können Sie die Einträge der Teilnehmer nach Name oder Datum filtern</div>
		<br></br>
		
		<form class="padding" method="POST" action="ausbilder_formular.php">
		<input type="text" name="name" placeholder="Name des Teilnehmers">
		<input type="submit" name="submit1" value="Absenden">
		<input type="date" name="date" placeholder="Datum eintragen">
		<input type="submit" name="submit2" value="Absenden">
		</form>	
   </body>
</html>
<?php


if(isset($_POST['bestätigen'])){
			echo "<span class='texteinrücken'>Bericht wurde bestätigt</span>";	
			
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
			echo "<span class='texteinrücken'>Bericht wurde abgelehnt</span>";	
			
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
}
else{
	echo "Auf dieses Menü haben Sie keinen Zugriff, bitte melden sie sich erneut an";
 	echo"<html>
		<head>
	 	<meta charset='utf-8'>
		</head>
		<body>
		<br></br>
		<form method='POST' action='index.php'>
		<input type='submit' name='back' value='zurück zum Anmeldefenster'>
		</form>
		<br></br>
		</body>
		</html>"; 
		
} 
?>