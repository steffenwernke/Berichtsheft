<?php
include("header.php");
include("function.php");


$Tname = $_SESSION['loginname'];
?>
<html>
<head>
<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" href="css/custom.css">
</head>
<body>
 <div class="container bg-faded mt-3">
	<h1 class="text-left pb-2 orange1 textblue1"><img src="logo.jpg" alt="firmensymbol" height="65" width="350">Berichtsheft<span class=" text-right size left textblue1"><?php echo "$Tname" . " " ?><a class='text-right size' href='index.php' onclick='logout()'>abmelden</a></span></h1>
	</div>
	<div class="contentleft textblue1">
	<br></br>
<?php


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
	
	$_SESSION['a'] = $EName;
	$_SESSION['b'] = $EAbteilung;
	$_SESSION['c'] = $EBerichtsnummer;
	$_SESSION['d'] = $AusbildungsWocheBeginn;
	$_SESSION['e'] = $AusbildungsWocheEnde;
	$_SESSION['f'] = $TextBetrieblich;
	$_SESSION['g'] = $TextTheorie;
	$_SESSION['h'] = $DatumUnterschrift;
	

	
} 


if(isset($_GET['TName']) && isset($_GET['Date'])){
	
	$TName = $_GET['TName'];
	$Date = $_GET['Date'];
	$ENr = $_GET['ENr'];
	
	$queryAnzeigeName ="SELECT EName, EAbteilung, EBerichtsnummer, AusbildungsWocheBeginn, AusbildungsWocheEnde, TextBetrieblich, TextTheorie, DatumUnterschrift, EStatus FROM eintraege, teilnehmer WHERE eintraege.TNr = teilnehmer.TNr AND teilnehmer.TName = '$TName' AND ('$Date' BETWEEN eintraege.AusbildungsWocheBeginn AND eintraege.AusbildungsWocheEnde)";
	
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
	$EStatus = $row['8'];
	
}	
	
$stmt->free_result();
	$conn->close();
	
?>	
	
	<span><strong>Ausbildungsnachweis</strong></span>
	<br></br>
	<form class="rahmen">
	<span class="texteinrücken">Name: </span><span class="borderb"><?php echo $EName ?></span>
	<br></br>
	<span class="texteinrücken">Ausbildungsabteilung: </span><span class="borderb"><?php echo $EAbteilung ?></span>
	<br></br>
	<span class="texteinrücken">Ausbildungsnachweis Nr. </span><span class="borderb"><?php echo $EBerichtsnummer ?></span>
	<br></br>
	<span class="texteinrücken">Ausbildungswoche vom: </span><span class="borderb"><?php echo $AusbildungsWocheBeginn ?></span>
	
	<span class="texteinrücken">bis: </span><span class="borderb texteinrücken"> <?php echo $AusbildungsWocheEnde ?></span>
	<br></br>
	<span class="texteinrücken bordertb bg-secondary">Betriebliche Tätigkeiten </span><br></br><span class="texteinrücken block"><?php echo nl2br($TextBetrieblich) ?></span>
	<br></br>
	
	<span class="texteinrücken bordertt bg-secondary">Bearbeitete Theoriethemen </span><br></br><span class=" texteinrücken block"><?php echo nl2br($TextTheorie) ?></span>
	<br></br>
	
	<span class="unterschriftlinks"><?php echo $DatumUnterschrift ?></span><span class="unterschriftrechts"><?php echo $DatumUnterschrift ?></span>
	<br></br>
	<span class="azubi">Auszubildende/Ausbildender</span><span class="datum">Datum</span><span class="ausbilder">Ausbilderin / Ausbilder</span><span class="datum">Datum</span>
	</form>
	
	
<?php			



 
 if(isset($_POST['drucken'])){
	
	header('Location: drucken.php');
	
 }


if($benutzer == "ausbilder" && $EStatus == 1){
		
		$ENr = $_GET['ENr'];
		$_SESSION['ENr'] = $ENr;	
		
		echo"<br></br>
		<form method='POST' action='ausbilder_menue.php'>
		<input type='submit' name='bestätigen' value='Bestätigen'>
		<input type='submit' name='ablehnen' value='Ablehnen'>
		</form>";
		
		}
	
?>

<br></br>
<input type='button' value='zurück' onclick='history.go(-1)'>
<br></br>
<?php 
if($EStatus == 2){
echo "<form action='' method='POST'>
	  <button class='orange1' name='drucken'>Drucken</button>
	  </form>";
}	
?>
</div>
</body>
</html>