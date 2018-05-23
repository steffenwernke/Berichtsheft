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
		<strong>Auswahl</strong> <br />
		<strong>==============================</strong> <br /><br />
		<a href="./ausbilder_offene.php">Offene Eintraege ansehen</a> <br /><br /><br />
		<a href="./ausbilder_abgegebene.php">Abgegebene Eintraege bearbeiten</a> <br /><br /><br />
		<a href="./ausbilder_fertige.php">Fertige Eintraege ansehen</a> <br /><br /><br />
		
<?php

// offene einträge nach name gesucht

if(isset($_POST['submit1']) && $_POST['name1'] == true){
	
	$name1 = $_POST['name1'];
	

	$query1 ="SELECT EBerichtsnummer, ENr, AusbildungsWocheBeginn FROM eintraege, teilnehmer, ausbilder WHERE teilnehmer.GNr = ausbilder.GNr AND teilnehmer.TNr = eintraege.TNr AND teilnehmer.Tname = '$name1' AND EStatus = 0 GROUP BY eintraege.EBerichtsnummer";
	
	$stmt = $conn->prepare($query1); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	
	$i = 0;
	$ENr = array();
	$AusbildungsWocheBeginn = array();
	$EBerichtsnummer = array();
	
	while($row = $stmt->fetch_array())
		{
			
		$ENr[$i] = $row['ENr'];
		$AusbildungsWocheBeginn[$i] = $row['AusbildungsWocheBeginn'];
		$EBerichtsnummer[$i] = $row['EBerichtsnummer'];
				
			$i++;
		}
	
	for($j = 0; $j < count($ENr); $j++){
		
		echo "<a href='./ausgabe.php?ENr=$ENr[$j]'>$EBerichtsnummer[$j]</a>";
		echo ", <br>";
		
	}

	$stmt->free_result();
	$conn->close();
	
}
	
if(isset($_POST['submit1']) && $_POST['name1'] == FALSE){
	echo "Fehler bitte geben Sie einen Namen ein";
	}

// offene einträge nach datum gesucht	
	
if(isset($_POST['submit2']) && $_POST['date1'] == true){
	
	$auswahldate1 = $_POST['date1'];
	$query2 ="SELECT TName, ENr FROM eintraege, teilnehmer, ausbilder WHERE teilnehmer.GNr = ausbilder.GNr AND eintraege.TNr = teilnehmer.TNr AND ('$auswahldate1' BETWEEN eintraege.AusbildungsWocheBeginn AND eintraege.AusbildungsWocheEnde)AND EStatus = 0 GROUP BY eintraege.EName";
	
	$stmt = $conn->prepare($query2); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	
	$i = 0;
	$ENr = array();
	$Teilnehmername = array();
	
	while($row = $stmt->fetch_array())
		{
			
		$ENr[$i] = $row['ENr'];
		$Teilnehmername[$i] = $row['TName'];
				
			$i++;
		}
	
	for($j = 0; $j < count($ENr); $j++){
		
		echo "<a href='./ausgabe.php?TName=$Teilnehmername[$j]&Date=$auswahldate1'>$Teilnehmername[$j]</a>";
		echo ", <br>";
	
	}

	$stmt->free_result();
	$conn->close();
	
	}
if(isset($_POST['submit2']) && $_POST['date1'] == FALSE){
	echo "Fehler bitte geben Sie ein Datum ein";
	}
	
// abgegebene einträge nach name gesucht	
	
if(isset($_POST['submit3']) && $_POST['name2'] == true){
	
	$name2 = $_POST['name2'];
	$query3 ="SELECT EBerichtsnummer, ENr, AusbildungsWocheBeginn FROM eintraege, teilnehmer, ausbilder WHERE teilnehmer.GNr = ausbilder.GNr AND teilnehmer.TNr = eintraege.TNr AND teilnehmer.Tname = '$name2' AND EStatus = 1 GROUP BY eintraege.EBerichtsnummer";
	
	$stmt = $conn->prepare($query3); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	
	$i = 0;
	$ENr = array();
	$AusbildungsWocheBeginn = array();
	$EBerichtsnummer = array();
	
	while($row = $stmt->fetch_array())
		{
			
		$ENr[$i] = $row['ENr'];
		$AusbildungsWocheBeginn[$i] = $row['AusbildungsWocheBeginn'];
		$EBerichtsnummer[$i] = $row['EBerichtsnummer'];
				
			$i++;
		}
	
	for($j = 0; $j < count($ENr); $j++){
	
		echo "<a href='./ausgabe.php?ENr=$ENr[$j]'>$EBerichtsnummer[$j]</a>";
		echo ", <br>";
	}
	
	$stmt->free_result();
	$conn->close();
	

	}
if(isset($_POST['submit3']) && $_POST['name2'] == FALSE){
	echo "Fehler bitte geben Sie einen Namen ein";
	}

// abgegebene einträge nach datum gesucht	
	
if(isset($_POST['submit4']) && $_POST['date2'] == true){
	$auswahldate2 = $_POST['date2'];
	$query4 ="SELECT TName, ENr FROM eintraege, teilnehmer, ausbilder WHERE teilnehmer.GNr = ausbilder.GNr AND eintraege.TNr = teilnehmer.TNr AND ('$auswahldate2' BETWEEN eintraege.AusbildungsWocheBeginn AND eintraege.AusbildungsWocheEnde)AND EStatus = 1 GROUP BY eintraege.EName";
	
	$stmt = $conn->prepare($query4); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	
	$i = 0;
	$ENr = array();
	$Teilnehmername = array();
	
	while($row = $stmt->fetch_array())
		{
			
		$ENr[$i] = $row['ENr'];
		$Teilnehmername[$i] = $row['TName'];
				
			$i++;
		}
	
	for($j = 0; $j < count($ENr); $j++){
		
	echo "<a href='./ausgabe.php?TName=$Teilnehmername[$j]&Date=$auswahldate2'>$Teilnehmername[$j]</a>";
		echo ", <br>";
	
	}

	$stmt->free_result();
	$conn->close();
	}
if(isset($_POST['submit4']) && $_POST['date2'] == FALSE){
	echo "Fehler bitte geben Sie ein Datum ein";
	}	

// fertige einträge nach name gesucht

if(isset($_POST['submit5']) && $_POST['name3'] == true){
	$name3 = $_POST['name3'];
	$query5 ="SELECT EBerichtsnummer, ENr, AusbildungsWocheBeginn FROM eintraege, teilnehmer, ausbilder WHERE teilnehmer.GNr = ausbilder.GNr AND teilnehmer.TNr = eintraege.TNr AND teilnehmer.Tname = '$name3' AND EStatus = 2 GROUP BY eintraege.EBerichtsnummer";
	
	$stmt = $conn->prepare($query5); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	
	$i = 0;
	$ENr = array();
	$AusbildungsWocheBeginn = array();
	$EBerichtsnummer = array();
	
	while($row = $stmt->fetch_array())
		{
			
		$ENr[$i] = $row['ENr'];
		$AusbildungsWocheBeginn[$i] = $row['AusbildungsWocheBeginn'];
		$EBerichtsnummer[$i] = $row['EBerichtsnummer'];
				
			$i++;
		}
	
	for($j = 0; $j < count($ENr); $j++){
	
		echo "<a href='./ausgabe.php?ENr=$ENr[$j]'>$EBerichtsnummer[$j]</a>";
		echo ", <br>";
	}
	
	$stmt->free_result();
	$conn->close();
	
	}
if(isset($_POST['submit5']) && $_POST['name3'] == FALSE){
	echo "Fehler bitte geben Sie einen Namen ein";
	}	

// fertige einträge nach datum gesucht

if(isset($_POST['submit6']) && $_POST['date3'] == true){
	$auswahldate3 = $_POST['date3'];
	$query6 ="SELECT TName, ENr FROM eintraege, teilnehmer, ausbilder WHERE teilnehmer.GNr = ausbilder.GNr AND eintraege.TNr = teilnehmer.TNr AND ('$auswahldate3' BETWEEN eintraege.AusbildungsWocheBeginn AND eintraege.AusbildungsWocheEnde)AND EStatus = 2 GROUP BY eintraege.EName";
	
	$stmt = $conn->prepare($query6); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	
	$i = 0;
	$ENr = array();
	$Teilnehmername = array();
	
	while($row = $stmt->fetch_array())
		{
			
		$ENr[$i] = $row['ENr'];
		$Teilnehmername[$i] = $row['TName'];
				
			$i++;
		}
	
	for($j = 0; $j < count($ENr); $j++){
		
		echo "<a href='./ausgabe.php?TName=$Teilnehmername[$j]&Date=$auswahldate3'>$Teilnehmername[$j]</a>";
		echo ", <br>";
	
	}

	$stmt->free_result();
	$conn->close();
	}
if(isset($_POST['submit6']) && $_POST['date3'] == FALSE){
	echo "Fehler bitte geben Sie ein Datum ein";
	}


?>
		
		
		
	
		
		
   </body>
</html>