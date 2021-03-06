<?php 
include("header.php");

// automatisches Auffüllen von leeren einträgen
$conn = new mysqli($servername, $username, $password, $dbname);
 
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}  
	
$Tname = $_SESSION['loginname'];		
$query = "SELECT MAX(AusbildungsWocheEnde) FROM eintraege, teilnehmer WHERE eintraege.TNr = teilnehmer.TNr AND teilnehmer.Tname = '$Tname' and AusbildungsWocheEnde <= DATE(now()) and EStatus >= 0";

	$stmt = $conn->prepare($query); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	$row = $stmt->fetch_row();
	
	// Datum Datenbank	
	$datumDatenbank=strtotime($row[0]);
	
	// Datum actuelles
	$datumAktuel = date(time());
	
	//Datumsdifferenz
	$diff= $datumAktuel-$datumDatenbank;
	$diffmod=$diff%(60*60*24*7);
	$datumDif= $diff-$diffmod;
	$datumdifferenz=$datumDif/(60*60*24*7); //Datumdifferenz in Wochen!!!
	
	// Datum +1 week 
	$datumDatenbank1=date("Y-m-d",strtotime($row[0]));
	$date = new DateTime($datumDatenbank1);

	$stmt->free_result();
	$conn->close();
	
	$conn = new mysqli($servername, $username, $password, $dbname);
 
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}

	$Tname = $_SESSION['loginname'];		
	
	$datumDatenbank1=date("Y-m-d",strtotime($row[0]));
	$date = new DateTime($datumDatenbank1);
	
	
	for($i=1;$i<=$datumdifferenz;$i++)
	{
	
	$date->modify('+7 day');
	
	$wochefreitag=$date->format('Y-m-d');
	
	$date->modify('-4 day');
	
	$wochemontag=$date->format('Y-m-d');
	
	$query = "Insert into eintraege (EStatus, EName, EAbteilung, EBerichtsnummer, TextBetrieblich, TextTheorie, AusbildungsWocheBeginn, AusbildungsWocheEnde, DatumUnterschrift, TNr, ANr) VALUES(0,NULL,NULL,NULL,NULL,NULL,'$wochemontag','$wochefreitag',NULL,3,1)";
	
	$stmt = $conn->prepare($query); 
	$stmt->execute();
	
	$date->modify('+4 day');
	
	}
	



// Anzeige: offene Einträge //alle abgespeicherter Status 

$conn = new mysqli($servername, $username, $password, $dbname);
 
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}  
	
$Tname = $_SESSION['loginname'];		
$query = "SELECT ENr FROM eintraege, teilnehmer WHERE eintraege.TNr = teilnehmer.TNr AND teilnehmer.Tname = '$Tname' and AusbildungsWocheEnde <= DATE(now()) and EStatus < 1";

// Solange kein Neues Beichtsheft in der Datenbank existiert kann ich diese auch nicht mit select bekommen 
//1 Möglichkeit) ich ziehe mir mit dem select nach datum das letze berichtsheftwochenendedatum welches den status 1 oder 2 hat und bestimme dann mittels php den zeitabstand der wochen und somit den rückstand der in wochen und lasse mir diese als unbearbeitet ausgeben
//2 möglichkeit DAtenbank legt immer bis zum heutigen datum neue leere blätter 

	$stmt = $conn->prepare($query); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	$resultSQL = array();
	while($row = $stmt->fetch_array())
		{	
		$resultSQL[] = $row['ENr'];
		}	
	
	
	// $result in Sessions Array $_SESSION['ENr'] speichern
	$_SESSION['ENr_offeneEintraege']=$resultSQL;
	
	$stmt->free_result();
	$conn->close();
	
	


	
	
// Anzeige: fertige Einträge //alle Status = 1 	
	
	$conn = new mysqli($servername, $username, $password, $dbname);
 
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	
		
	$Tname = $_SESSION['loginname'];		
	$query = "SELECT ENr FROM eintraege, teilnehmer WHERE eintraege.TNr = teilnehmer.TNr AND teilnehmer.Tname = '$Tname' and AusbildungsWocheEnde <= DATE(now()) and EStatus = 1";

	$stmt = $conn->prepare($query); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	$resultSQL = array();
	
	while($row = $stmt->fetch_array())
		{	
		$resultSQL[] = $row['ENr'];
		}	
	
	// $result in Sessions Array $_SESSION['ENr'] speichern
	$_SESSION['ENr_abgegebeneEintraege']=$resultSQL;
	
	$stmt->free_result();
	$conn->close();

	
// Anzeige: fertige Einträge //alle Status = 1 	
	
	$conn = new mysqli($servername, $username, $password, $dbname);
 
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	
		
	$Tname = $_SESSION['loginname'];		
	$query = "SELECT ENr FROM eintraege, teilnehmer WHERE eintraege.TNr = teilnehmer.TNr AND teilnehmer.Tname = '$Tname' and AusbildungsWocheEnde <= DATE(now()) and EStatus = 2";

	$stmt = $conn->prepare($query); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	$resultSQL = array();
	
	while($row = $stmt->fetch_array())
		{	
		$resultSQL[] = $row['ENr'];
		}	
	
	// $result in Sessions Array $_SESSION['ENr'] speichern
	$_SESSION['ENr_fertigeEintraege']=$resultSQL;
	
	$stmt->free_result();
	$conn->close();
	
	
?>
	<!DOCTYPE HTML>
	<html>
   <head>
	 	<meta charset="utf-8">
	  <h2>Offene Einträge</h2>
   </head>
   <body>
	
	<?php
	$ausgabe_offeneEintraege=$_SESSION['ENr_offeneEintraege'];
	for($i=0;$i<count($ausgabe_offeneEintraege);$i++)
	{	
	echo "<a href='./eintragLesen.php?berichtsheftnummer=$ausgabe_offeneEintraege[$i]'>$ausgabe_offeneEintraege[$i]</a>";
	echo ", ";
	}
	
	?>
	<?php
	echo "<br>"."<h2>Abgegebene Einträge</h2>"."<br>";
	$ausgabe_abgegebeneEintraege=$_SESSION['ENr_abgegebeneEintraege'];
	for($i=0;$i<count($ausgabe_abgegebeneEintraege);$i++)
	{	
	echo "<a href='./eintragLesen.php?berichtsheftnummer=$ausgabe_abgegebeneEintraege[$i]'>$ausgabe_abgegebeneEintraege[$i]</a>";
	echo ", ";
	}
	
	?>
	<?php
	echo "<br>"."<h2>Fertige Einträge</h2>"."<br>";
	$ausgabe_fertigeEintraege=$_SESSION['ENr_fertigeEintraege'];
	for($i=0;$i<count($ausgabe_fertigeEintraege);$i++)
	{	
	echo "<a href='./eintragLesen.php?berichtsheftnummer=$ausgabe_fertigeEintraege[$i]'>$ausgabe_fertigeEintraege[$i]</a>";
	echo ", ";
	}
	
	?>
	
	   </body>
</html>
