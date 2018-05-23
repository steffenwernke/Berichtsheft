<?php
include("header.php");
include("function.php");

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
   <div class="contentleft">
   
		<h3>Offene Einträge</h3> <br />
		
<div class="padding textblue1">
<?php

// offene Einträge nach name gesucht

if(isset($_POST['submit1']) && $_POST['name'] == true){
	
	$name = $_POST['name'];
	
	$queryName1 ="SELECT EBerichtsnummer, ENr, AusbildungsWocheBeginn FROM eintraege, teilnehmer, ausbilder WHERE teilnehmer.GNr = ausbilder.GNr AND teilnehmer.TNr = eintraege.TNr AND teilnehmer.Tname = '$name' AND EStatus = 0 GROUP BY eintraege.EBerichtsnummer";
	
	$stmt = $conn->prepare($queryName1); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	$i1 = 0;
	$ENr1 = array();
	$AusbildungsWocheBeginn1 = array();
	$EBerichtsnummer1 = array();
	
	while($row1 = $stmt->fetch_array())
		{
			
		$ENr1[$i1] = $row1['ENr'];
		$AusbildungsWocheBeginn1[$i1] = $row1['AusbildungsWocheBeginn'];
		$EBerichtsnummer1[$i1] = $row1['EBerichtsnummer'];
				
			$i1++;
		}
	
	for($j1 = 0; $j1 < count($ENr1); $j1++){
		
		echo "<a href='./ausgabe.php?ENr=$ENr1[$j1]'>$EBerichtsnummer1[$j1]</a>";
		if(count($ENr1) > 1){
			echo ", ";
		}	
	}
	$stmt->free_result();
	$conn->close();
}
	
// offene Einträge nach date gesucht
	
if(isset($_POST['submit2']) && $_POST['date'] == true){
	
	
	$auswahldate = $_POST['date'];
	
	$queryDate1 ="SELECT TName, ENr FROM eintraege, teilnehmer, ausbilder WHERE teilnehmer.GNr = ausbilder.GNr AND eintraege.TNr = teilnehmer.TNr AND ('$auswahldate' BETWEEN eintraege.AusbildungsWocheBeginn AND eintraege.AusbildungsWocheEnde)AND EStatus = 0 GROUP BY eintraege.EName";
	
	$stmt = $conn->prepare($queryDate1); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	$i1 = 0;
	$ENr1 = array();
	$Teilnehmername1 = array();
	
	while($row1 = $stmt->fetch_array())
		{
			
		$ENr1[$i1] = $row1['ENr'];
		$Teilnehmername1[$i1] = $row1['TName'];
				
			$i1++;
		}
	
	for($j1 = 0; $j1 < count($ENr1); $j1++){
		
		echo "<a href='./ausgabe.php?TName=$Teilnehmername1[$j1]&Date=$auswahldate'>$Teilnehmername1[$j1]</a>";
		if(count($ENr1) > 1){
		echo ", ";
		}
	}

	$stmt->free_result();
	$conn->close();
}	
?>
</div>
<br></br>
<h3>Abgegebene Einträge</h3> <br />
		
<div class="padding textblue1">
<?php	

//abgegebene Einträge nach name gesucht

if(isset($_POST['submit1']) && $_POST['name'] == true){
	
	$conn = new mysqli($servername, $username, $password, $dbname);
 
	if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}   
	
	$name = $_POST['name'];
	
	$queryName2 ="SELECT EBerichtsnummer, ENr, AusbildungsWocheBeginn FROM eintraege, teilnehmer, ausbilder WHERE teilnehmer.GNr = ausbilder.GNr AND teilnehmer.TNr = eintraege.TNr AND teilnehmer.Tname = '$name' AND EStatus = 1 GROUP BY eintraege.EBerichtsnummer";
	
	$stmt = $conn->prepare($queryName2); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	
	$i2 = 0;
	$ENr2 = array();
	$AusbildungsWocheBeginn2 = array();
	$EBerichtsnummer2 = array();
	
	while($row2 = $stmt->fetch_array())
		{
			
		$ENr2[$i2] = $row2['ENr'];
		$AusbildungsWocheBeginn2[$i2] = $row2['AusbildungsWocheBeginn'];
		$EBerichtsnummer2[$i2] = $row2['EBerichtsnummer'];
				
			$i2++;
		}
	
	for($j2 = 0; $j2 < count($ENr2); $j2++){
	
		echo "<a href='./ausgabe.php?ENr=$ENr2[$j2]'>$EBerichtsnummer2[$j2]</a>";
		if(count($ENr2) > 1){
		echo ", ";
		}
	}
	
	$stmt->free_result();
	$conn->close();
}	
	
//abgegebene Einträge nach date gesucht

if(isset($_POST['submit2']) && $_POST['date'] == true){

	$conn = new mysqli($servername, $username, $password, $dbname);
 
	if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}   

	$auswahldate = $_POST['date'];
		
	$queryDate2 ="SELECT TName, ENr FROM eintraege, teilnehmer, ausbilder WHERE teilnehmer.GNr = ausbilder.GNr AND eintraege.TNr = teilnehmer.TNr AND ('$auswahldate' BETWEEN eintraege.AusbildungsWocheBeginn AND eintraege.AusbildungsWocheEnde)AND EStatus = 1 GROUP BY eintraege.EName";
	
	$stmt = $conn->prepare($queryDate2); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	
	$i2 = 0;
	$ENr2 = array();
	$Teilnehmername2 = array();
	
	while($row2 = $stmt->fetch_array())
		{
			
		$ENr2[$i2] = $row2['ENr'];
		$Teilnehmername2[$i2] = $row2['TName'];
				
			$i2++;
		}
	
	for($j2 = 0; $j2 < count($ENr2); $j2++){
		
	echo "<a href='./ausgabe.php?TName=$Teilnehmername2[$j2]&Date=$auswahldate'>$Teilnehmername2[$j2]</a>";
		if(count($ENr2) > 1){
		echo ", ";
		}
	}

	$stmt->free_result();
	$conn->close();
}
?>
</div>
<br></br>
<h3>Fertige Einträge</h3> <br />
		
<div class="padding textblue1">
<?php	

// fertige Einträge nach name
	
if(isset($_POST['submit1']) && $_POST['name'] == true){	
	
	$conn = new mysqli($servername, $username, $password, $dbname);
 
	if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}   
	
	$name = $_POST['name'];
	
	$queryName3 ="SELECT EBerichtsnummer, ENr, AusbildungsWocheBeginn FROM eintraege, teilnehmer, ausbilder WHERE teilnehmer.GNr = ausbilder.GNr AND teilnehmer.TNr = eintraege.TNr AND teilnehmer.Tname = '$name' AND EStatus = 2 GROUP BY eintraege.EBerichtsnummer";
	
	$stmt = $conn->prepare($queryName3); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	
	$i3 = 0;
	$ENr3 = array();
	$AusbildungsWocheBeginn3 = array();
	$EBerichtsnummer3 = array();
	
	while($row3 = $stmt->fetch_array())
		{
			
		$ENr3[$i3] = $row3['ENr'];
		$AusbildungsWocheBeginn3[$i3] = $row3['AusbildungsWocheBeginn'];
		$EBerichtsnummer3[$i3] = $row3['EBerichtsnummer'];
				
			$i3++;
		}
	
	for($j3 = 0; $j3 < count($ENr3); $j3++){
	
		echo "<a href='./ausgabe.php?ENr=$ENr3[$j3]'>$EBerichtsnummer3[$j3]</a>";
		if(count($ENr3) > 1){
		echo ", ";
		}
	}
	
	$stmt->free_result();
	$conn->close();
}
	
// fertige Einträge nach date	

if(isset($_POST['submit2']) && $_POST['date'] == true){
	
	$conn = new mysqli($servername, $username, $password, $dbname);
 
	if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}   

	$auswahldate = $_POST['date'];
		
	$queryDate3 ="SELECT TName, ENr FROM eintraege, teilnehmer, ausbilder WHERE teilnehmer.GNr = ausbilder.GNr AND eintraege.TNr = teilnehmer.TNr AND ('$auswahldate' BETWEEN eintraege.AusbildungsWocheBeginn AND eintraege.AusbildungsWocheEnde)AND EStatus = 2 GROUP BY eintraege.EName";
	
	$stmt = $conn->prepare($queryDate3); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	
	$i3 = 0;
	$ENr3 = array();
	$Teilnehmername3 = array();
	
	while($row3 = $stmt->fetch_array())
		{
			
		$ENr3[$i3] = $row3['ENr'];
		$Teilnehmername3[$i3] = $row3['TName'];
				
			$i3++;
		}
	
	for($j3 = 0; $j3 < count($ENr3); $j3++){
		
		echo "<a href='./ausgabe.php?TName=$Teilnehmername3[$j3]&Date=$auswahldate'>$Teilnehmername3[$j3]</a>";
		if(count($ENr3) > 1){
		echo ", ";
		}
	}

	$stmt->free_result();
	$conn->close();
}

// Fehler kein Name eingegeben	
	
if(isset($_POST['submit1']) && $_POST['name'] == FALSE){
	echo "Fehler bitte geben Sie einen Namen ein";
	}

// Fehler Datum eingeben

if(isset($_POST['submit2']) && $_POST['date'] == FALSE){
	echo "Fehler bitte geben Sie ein Datum ein";
	}
	

?>
		</div>
		<br></br>	
		<form>
		<input class="textblue1" type='button' value='zurück' onclick='history.go(-1)'>
		</form>
	</div>
   </body>
</html>