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
      <title>Berichtsheft</title>
   </head>
   <body>
		<strong>Fertige Eintraege ansehen</strong> <br />
		<strong>==============================</strong> <br /><br />
		<a href="./ausbilder_offene.php">Offene Eintraege ansehen</a> <br /><br /><br />
		<a href="./ausbilder_abgegebene.php">Abgegebene Eintraege bearbeiten</a> <br /><br /><br />
		<a href="./ausbilder_fertige.php">Fertige Eintraege ansehen</a> <br /><br /><br />
		
		<form method="POST" action="ausbilder_formular.php">
		
		<input type="text" name="name3" placeholder="Name des Teilnehmers">
		<input type="submit" name="submit5" value="Absenden">
		<input type="date" name="date3" placeholder="Datum eintragen">
		<input type="submit" name="submit6" value="Absenden">
		</form>
		
   </body>
</html>