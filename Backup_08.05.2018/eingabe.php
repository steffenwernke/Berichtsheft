<?php
include("header.php");

$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}   
$Tname = $_SESSION['loginname'];	

$ENr=$_GET['ENr'];
echo "!!!!ENR!".$ENr;


?>


<html>
   <head>
	 	<meta charset="utf-8">
      <title>Berichtsheft</title>
   </head>
   <body>
		<strong>Berichtsheft</strong> <br />
		<strong>==============================</strong> <br /><br />
		
		<form method='POST' action='teilnehmer_menue.php?ENr=<?php echo $ENr?>'>
		<input type="text" name="name" placeholder="Name eingeben"><label> Name</label><br></br>
		<input type="text" name="abteilung" placeholder="Abteilung eingeben"><label> Abteilung</label><br></br>
		<input type="integer" name="nummer" placeholder="Nummer eingeben"><label> Berichtsnummer</label><br></br>
		<input type="date" name="vom" placeholder="Start Datum eingeben"><label> Start Datum</label><br></br>
		<input type="date" name="bis" placeholder="End Datum eingeben"><label> Ende Datum</label><br></br>
		<textarea rows="17" cols="90" maxlength="1500" type="text" name="betrieb" placeholder="Betriebliche Tätigkeiten eingeben"></textarea><br/><label> Betriebliche Tätigkeiten</label><br></br>
		<textarea rows="17" cols="90" maxlength="1500" type="text" name="theorie" placeholder="Theorie Themen eingeben"></textarea><br/><label> Theorie Themen</label><br></br>
		<input type="date" name="unterschrift" placeholder="Datum Unterschrift eingeben"><label> Datum der Unterschrift</label><br></br>
		<input type="submit" name="laden" value="Laden">
		<input type="submit" name="speichern" value="Speichern">
		<input type="submit" name="abgeben" value="Abgeben">
			
		
		
   </body>
</html>