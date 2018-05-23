<?php
include("header.php");
{
$berichtsheftnummer=1;
$ENr=$_SESSION['ENr'];
$test=$_GET['berichtsheftnummer'];
echo "berichtsheftnummer über get".$test;
var_dump($ENr);
$heft=$ENr[$berichtsheftnummer];	


// Anzeige: 

$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}   
$Tname = $_SESSION['loginname'];		
$query = "SELECT Enr, AusbildungsWocheBeginn, AusbildungsWocheEnde, DatumUnterschrift, EAbteilung, EBerichtsnummer, EName, EStatus, TextBetrieblich, TextTheorie, ANr, eintraege.TNr From eintraege, teilnehmer WHERE eintraege.ENr = '$heft' and eintraege.TNr = teilnehmer.TNr AND teilnehmer.Tname = '$Tname'";

$stmt = $conn->prepare($query); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	while($row = $stmt->fetch_array())
		{	
		$resultSQL = $row['AusbildungsWocheBeginn'];
		}	
	
	// $result in Sessions Array $_SESSION['ENr'] speichern
	$_SESSION['AusbildungsWocheBeginn']=$resultSQL;
	echo "result:".$resultSQL;

	
}
?>