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
    	<h1 class="padding" >Berichtsheft</h1>
   </head>
   <body>
		<h2 class="padding" >Fertige Eintraege ansehen</h2> 
		
			<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="./ausbilder_offene.php">Offene Eintraege ansehen</a></li>
      <li><a href="./ausbilder_abgegebene.php">Abgegebene Eintraege bearbeiten</a></li>
      <li><a href="./ausbilder_fertige.php">Fertige Eintraege ansehen</a></li>
    </ul>
  </div>
</nav>
		<br></br>
		<div class="padding textblue1">Hier können Sie die fertigen Einträge der Teilnehmer nach Name oder Datum filtern</div>
		<br></br>
		
		<form class="padding" method="POST" action="ausbilder_formular.php">
		<input type="text" name="name3" placeholder="Name des Teilnehmers">
		<input type="submit" name="submit5" value="Absenden">
		<input type="date" name="date3" placeholder="Datum eintragen">
		<input type="submit" name="submit6" value="Absenden">
		</form>
		
   </body>
</html>