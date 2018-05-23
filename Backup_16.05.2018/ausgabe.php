<html>
<head></head>
<body>
<?php
include("header.php");

$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}   	

if(isset($_GET['ENr'])){
	$ENr = $_GET['ENr'];
	
	$queryAnzeigeNr ="SELECT EName, EAbteilung, EBerichtsnummer, AusbildungsWocheBeginn, AusbildungsWocheEnde, TextBetrieblich, TextTheorie, DatumUnterschrift, EStatus FROM eintraege WHERE eintraege.ENr = '$ENr'";
	
	$stmt = $conn->prepare($queryAnzeigeNr); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	$row = mysqli_fetch_row($stmt);
	
	
	$EName = $row['0'];
	$EAbteilung = $row['1'];
	$EBerichtsnummer = $row['2'];
	$AusbildungsWocheBeginn = $row['3'];
	$AusbildungsWocheEnde = $row['4'];
	$TextBetrieblich = $row['5'];
	$TextTheorie = $row['6'];
	$DatumUnterschrift = $row['7'];
	$EStatus = $row['8'];
	
	echo $EName . "<br>" . $EAbteilung . "<br>" . $EBerichtsnummer . "<br>" . $AusbildungsWocheBeginn . "<br>" . $AusbildungsWocheEnde . "<br>" . $TextBetrieblich . "<br>" . $TextTheorie . "<br>" . $DatumUnterschrift . "<br>";
	
	
	if($benutzer == "ausbilder" && $EStatus == 1){
		
		$_SESSION['ENr'] = $ENr;
		
		echo"<html>
		<head>
	 	<meta charset='utf-8'>
		<title>Berichtsheft</title>
		</head>
		<body>
		<form method='POST' action='ausbilder_menue.php'>
		<input type='submit' name='bestätigen' value='Bestätigen'>
		<input type='submit' name='ablehnen' value='Ablehnen'>
		</form>
		<br></br>
		</body>
		</html>";
		
		}
	
	
	
	
	$stmt->free_result();
	$conn->close();
	
	
} 


if(isset($_GET['TName']) && isset($_GET['Date'])){
	
	$TName = $_GET['TName'];
	$Date = $_GET['Date'];
	
	$queryAnzeigeName ="SELECT EName, EAbteilung, EBerichtsnummer, AusbildungsWocheBeginn, AusbildungsWocheEnde, TextBetrieblich, TextTheorie, DatumUnterschrift FROM eintraege, teilnehmer WHERE eintraege.TNr = teilnehmer.TNr AND teilnehmer.TName = '$TName' AND ('$Date' BETWEEN eintraege.AusbildungsWocheBeginn AND eintraege.AusbildungsWocheEnde)";
	
	$stmt = $conn->prepare($queryAnzeigeName); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	$row = mysqli_fetch_row($stmt);
	
	$EName = $row['0'];
	$EAbteilung = $row['1'];
	$EBerichtsnummer = $row['2'];
	$AusbildungsWocheBeginn = $row['3'];
	$AusbildungsWocheEnde = $row['4'];
	$TextBetrieblich = $row['5'];
	$TextTheorie = $row['6'];
	$DatumUnterschrift = $row['7'];
	
	echo $EName . "<br>" . $EAbteilung . "<br>" . $EBerichtsnummer . "<br>" . $AusbildungsWocheBeginn . "<br>" . $AusbildungsWocheEnde . "<br>" . $TextBetrieblich . "<br>" . $TextTheorie . "<br>" . $DatumUnterschrift . "<br>";
	
	$stmt->free_result();
	$conn->close();
	
	
} 


 
?>
<form>
<input type='button' value='zurück' onclick='history.go(-1)'>
</form>
</body>
</html>