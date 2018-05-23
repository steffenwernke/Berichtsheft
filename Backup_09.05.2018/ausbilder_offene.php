<?php
include("header.php");

$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}   


?>


<html>
   <head>
	 	<meta charset="utf-8">
      <title>Berichtsheft</title>
   </head>
   <body>
		<strong>Offene Eintraege ansehen</strong> <br />
		<strong>==============================</strong> <br /><br />
		
		<a href="./ausbilder_offene.php">Offene Eintraege ansehen</a> <br /><br /><br />
		<a href="./ausbilder_abgegebene.php">Abgegebene Eintraege bearbeiten</a> <br /><br /><br />
		<a href="./ausbilder_fertige.php">Fertige Eintraege ansehen</a> <br /><br /><br />
		
		<form method="POST" action="ausbilder_formular.php">
		<input type="text" name="name1" placeholder="Name des Teilnehmers">
		<input type="submit" name="submit1" value="Absenden">
		<input type="date" name="date1" placeholder="Datum eintragen">
		<input type="submit" name="submit2" value="Absenden">
		</form>
		
		
   </body>
</html>