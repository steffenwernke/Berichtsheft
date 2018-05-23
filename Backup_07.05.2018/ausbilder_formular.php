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
		<strong>Berichtsheft</strong> <br />
		<strong>==============================</strong> <br /><br />
		<a href="./ausbilder_offene.php">Offene Eintraege ansehen</a> <br /><br /><br />
		<a href="./ausbilder_abgegebene.php">Abgegebene Eintraege bearbeiten</a> <br /><br /><br />
		<a href="./ausbilder_fertige.php">Fertige Eintraege ansehen</a> <br /><br /><br />
		
<?php

// offene einträge nach name gesucht

if(isset($_POST['submit1']) && $_POST['name1'] == true){
	
	$name1 = $_POST['name1'];
	$query1 ="SELECT ENr, AusbildungsWocheBeginn FROM eintraege, teilnehmer WHERE eintraege.TNr = teilnehmer.TNr AND teilnehmer.Tname = '$name1' AND EStatus = 1";
	
	$stmt = $conn->prepare($query1); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	
	$i = 0;
	$ENr = array();
	$AusbildungsWocheBeginn = array();
	
	while($row = $stmt->fetch_array())
		{
			
		$ENr[$i] = $row['ENr'];
		$AusbildungsWocheBeginn[$i] = $row['AusbildungsWocheBeginn'];
				
			$i++;
		}
	
	for($j = 0; $j < count($ENr); $j++){
		echo "Nummer: " . $ENr[$j] . " ". "Datum: " . $AusbildungsWocheBeginn[$j] . "<br>";
	
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
	$query2 ="SELECT TName, ENr FROM eintraege, teilnehmer WHERE eintraege.TNr = teilnehmer.TNr AND ('$auswahldate1' BETWEEN eintraege.AusbildungsWocheBeginn AND eintraege.AusbildungsWocheEnde)AND EStatus = 1";
	
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
		echo "Nummer: " . $ENr[$j] . " ". "Name: " . $Teilnehmername[$j] . "<br>";
	
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
	$query1 ="SELECT ENr, AusbildungsWocheBeginn FROM eintraege, teilnehmer WHERE eintraege.TNr = teilnehmer.TNr AND teilnehmer.Tname = '$name2' AND EStatus = 1";
	
	$stmt = $conn->prepare($query1); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	
	$i = 0;
	$ENr = array();
	$AusbildungsWocheBeginn = array();
	
	while($row = $stmt->fetch_array())
		{
			
		$ENr[$i] = $row['ENr'];
		$AusbildungsWocheBeginn[$i] = $row['AusbildungsWocheBeginn'];
				
			$i++;
		}
	
	for($j = 0; $j < count($ENr); $j++){
		echo "Nummer: " . $ENr[$j] . " ". "Datum: " . $AusbildungsWocheBeginn[$j] . "<br>";
	
		//echo "<a href='./#####.php?berichtsheftnummer=$ausgabe_fertigeEintraege[$i]'>$ausgabe_fertigeEintraege[$i]</a>";
		//echo ", ";
	}
	
	$stmt->free_result();
	$conn->close();
	

	}
if(isset($_POST['submit3']) && $_POST['name2'] == FALSE){
	echo "Fehler bitte geben Sie einen Namen ein";
	}

// abgegebene einträge nach datum gesucht	
	
if(isset($_POST['submit4']) && $_POST['date2'] == true){
	echo "date 2";
	}
if(isset($_POST['submit4']) && $_POST['date2'] == FALSE){
	echo "Fehler bitte geben Sie ein Datum ein";
	}	

// fertige einträge nach name gesucht

if(isset($_POST['submit5']) && $_POST['name3'] == true){
	echo "name 3";
	}
if(isset($_POST['submit5']) && $_POST['name3'] == FALSE){
	echo "Fehler bitte geben Sie einen Namen ein";
	}	

// fertige einträge nach datum gesucht

if(isset($_POST['submit6']) && $_POST['date3'] == true){
	echo "date3";
	}
if(isset($_POST['submit6']) && $_POST['date3'] == FALSE){
	echo "Fehler bitte geben Sie ein Datum ein";
	}


?>
		
		
		
	
		
		
   </body>
</html>