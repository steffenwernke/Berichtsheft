<?php 
include("header.php");
include("function.php");

if($_SESSION['benutzer'] == "teilnehmer"){

// automatisches Auffüllen von leeren einträgen
$conn = new mysqli($servername, $username, $password, $dbname);
 
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}  
	
$Tname = $_SESSION['loginname'];		
$query = "SELECT AusbildungsWocheEnde, EBerichtsnummer FROM eintraege, teilnehmer WHERE eintraege.TNr = teilnehmer.TNr AND teilnehmer.Tname = '$Tname' AND AusbildungsWocheEnde <= DATE(now()) ORDER BY AusbildungsWocheEnde DESC LIMIT 1";
		
	$stmt = $conn->prepare($query); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	$row = $stmt->fetch_row();
	
	$EBerichtsnummer = $row[1];
	
	
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
	
if($EBerichtsnummer > 0){
	for($i=1;$i<=$datumdifferenz;$i++)
	{
	
	$date->modify('+7 day');
	
	$wochefreitag=$date->format('Y-m-d');
	
	$date->modify('-4 day');
	
	$wochemontag=$date->format('Y-m-d');
	
	$teilnehmernummer = $_SESSION['TNr'];
	
	$EBerichtsnummer = $EBerichtsnummer+1;
	
	$query = "Insert into eintraege (EStatus, EName, EAbteilung, EBerichtsnummer, TextBetrieblich, TextTheorie, AusbildungsWocheBeginn, AusbildungsWocheEnde, DatumUnterschrift, TNr) VALUES(0,NULL,NULL,'$EBerichtsnummer',NULL,NULL,'$wochemontag','$wochefreitag','$wochefreitag','$teilnehmernummer')";
	
	
	$stmt = $conn->prepare($query); 
	$stmt->execute();
	
	$date->modify('+4 day');
	
	}
}	


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
   <div class="padding contentleft">
	
	<?php
	
	
// Auswertung der Buttons Speichern,Laden und Abgeben 	
	
	
if(isset($_POST['speichern'])){
	
	echo "<br>" . "Bericht wurde gespeichert";	
					
$getENr = $_GET['ENr'];		
	
$ename = $_POST['name'];
$abteilung = $_POST['abteilung'];
$berichtsnr = $_POST['nummer'];
$vom = $_POST['vom'];
$bis = $_POST['bis'];
$betrieb = nl2br($_POST['betrieb']);
$theorie = nl2br($_POST['theorie']);
$unterschrift = $_POST['unterschrift'];			
			
$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}   	
		
	$querySpeichern ="UPDATE eintraege SET EStatus = 0, EName = '$ename', EAbteilung = '$abteilung', EBerichtsnummer = '$berichtsnr', AusbildungsWocheBeginn = '$vom', AusbildungsWocheEnde = '$bis', TextBetrieblich = '$betrieb', TextTheorie = '$theorie', DatumUnterschrift = '$unterschrift'  WHERE ENr = '$getENr'";
	
	$stmt = $conn->prepare($querySpeichern); 
	$stmt->execute();  
	
}	
	
if(isset($_POST['abgeben'])&& !empty($_POST['name'])&& !empty($_POST['abteilung'])&& !empty($_POST['nummer'])&& !empty($_POST['vom'])&& !empty($_POST['bis'])&& !empty($_POST['betrieb'])&& !empty($_POST['theorie'])&& !empty($_POST['unterschrift'])){
			echo "Bericht wurde abgegeben";	

$getENr = $_GET['ENr'];		
	
$ename = $_POST['name'];
$abteilung = $_POST['abteilung'];
$berichtsnr = $_POST['nummer'];
$vom = $_POST['vom'];
$bis = $_POST['bis'];
$betrieb = nl2br($_POST['betrieb']);
$theorie = nl2br($_POST['theorie']);
$unterschrift = $_POST['unterschrift'];						
			
$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}   	

	$getENr = $_GET['ENr'];	
		
	$queryAbgeben ="UPDATE eintraege SET EStatus = 1, EName = '$ename', EAbteilung = '$abteilung', EBerichtsnummer = '$berichtsnr', AusbildungsWocheBeginn = '$vom', AusbildungsWocheEnde = '$bis', TextBetrieblich = '$betrieb', TextTheorie = '$theorie', DatumUnterschrift = '$unterschrift'  WHERE ENr = '$getENr'";
	
	$stmt = $conn->prepare($queryAbgeben); 
	$stmt->execute();	 
	
}

if(isset($_POST['abgeben'])){ 
	if(empty($_POST['name'])|| empty($_POST['abteilung'])|| empty($_POST['nummer'])|| empty($_POST['vom'])|| empty($_POST['bis'])|| empty($_POST['betrieb'])|| empty($_POST['theorie'])|| empty($_POST['unterschrift'])){
		echo "<br>" . "Fehler nicht alle Felder ausgefüllt!";
	}
}	
	
	
	
	// Anzeige: offene Einträge //alle abgespeicherter Status 

$conn = new mysqli($servername, $username, $password, $dbname);
 
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}  
	
$Tname = $_SESSION['loginname'];		
$query1 = "SELECT EBerichtsnummer, ENr FROM eintraege, teilnehmer WHERE eintraege.TNr = teilnehmer.TNr AND teilnehmer.Tname = '$Tname' and AusbildungsWocheEnde <= DATE(now()) and EStatus < 1";

// Solange kein Neues Beichtsheft in der Datenbank existiert kann ich diese auch nicht mit select bekommen 
//1 Möglichkeit) ich ziehe mir mit dem select nach datum das letze berichtsheftwochenendedatum welches den status 1 oder 2 hat und bestimme dann mittels php den zeitabstand der wochen und somit den rückstand der in wochen und lasse mir diese als unbearbeitet ausgeben
//2 möglichkeit DAtenbank legt immer bis zum heutigen datum neue leere blätter 

	$stmt = $conn->prepare($query1); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	$resultSQL = array();
	while($row = $stmt->fetch_array())
		{	
		$resultSQL[] = $row['EBerichtsnummer'];
		$resultSQL2[] = $row['ENr'];
		}	
	
	
	// $result in Sessions Array $_SESSION['EBerichtsnummer'] speichern
	$_SESSION['EBerichtsnummer_offeneEintraege']=$resultSQL;
	
	
	// $result in Sessions Array $_SESSION['ENr'] speichern
	$_SESSION['ENr_offeneEintraege']=$resultSQL2;
	
	$stmt->free_result();
	$conn->close();
	

	
// Anzeige: abgegebene Einträge //alle Status = 1 	
	
	$conn = new mysqli($servername, $username, $password, $dbname);
 
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	
		
	$Tname = $_SESSION['loginname'];		
	$query2 = "SELECT EBerichtsnummer, ENr FROM eintraege, teilnehmer WHERE eintraege.TNr = teilnehmer.TNr AND teilnehmer.Tname = '$Tname' and AusbildungsWocheEnde <= DATE(now()) and EStatus = 1";

	$stmt = $conn->prepare($query2); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	$resultSQL = array();
	
	while($row = $stmt->fetch_array())
		{	
		$resultSQL3[] = $row['EBerichtsnummer'];
		$resultSQL4[] = $row['ENr'];
		}	
	
	// $result in Sessions Array $_SESSION['EBerichtsnummer'] speichern
	$_SESSION['EBerichtsnummer_abgegebeneEintraege']=$resultSQL3;
	
	// $result in Sessions Array $_SESSION['ENr'] speichern
	$_SESSION['ENr_abgegebeneEintraege']=$resultSQL4;
	
	$stmt->free_result();
	$conn->close();

	
	// Anzeige: fertige Einträge //alle Status = 2 	
	
	$conn = new mysqli($servername, $username, $password, $dbname);
 
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	
		
	$Tname = $_SESSION['loginname'];		
	$query3 = "SELECT EBerichtsnummer, ENr FROM eintraege, teilnehmer WHERE eintraege.TNr = teilnehmer.TNr AND teilnehmer.Tname = '$Tname' and AusbildungsWocheEnde <= DATE(now()) and EStatus = 2";

	$stmt = $conn->prepare($query3); 
	$stmt->execute();
	$stmt = $stmt->get_result();
	$resultSQL = array();
	
	while($row = $stmt->fetch_array())
		{	
		$resultSQL5[] = $row['EBerichtsnummer'];
		$resultSQL6[] = $row['ENr'];
		}	
	
	// $result in Sessions Array $_SESSION['EBerichtsnummer'] speichern
	$_SESSION['EBerichtsnummer_fertigeEintraege']=$resultSQL5;
	
	// $result in Sessions Array $_SESSION['ENr'] speichern
	$_SESSION['ENr_fertigeEintraege']=$resultSQL6;
	
	$stmt->free_result();
	$conn->close();
	
	echo "<br>"."<h2>Offene Einträge</h2>"."<br>";
	$ausgabe_offeneEintraege=$_SESSION['EBerichtsnummer_offeneEintraege'];
	$ausgabe_offeneEintraege2=$_SESSION['ENr_offeneEintraege'];
	for($i=0;$i<count($ausgabe_offeneEintraege);$i++)
	{	
	echo "<a href='./eingabe.php?ENr=$ausgabe_offeneEintraege2[$i]'>$ausgabe_offeneEintraege[$i]</a>";
	echo ", ";
	}
	
	?>
	<?php
	echo "<br>"."<h2>Abgegebene Einträge</h2>"."<br>";
	$ausgabe_abgegebeneEintraege=$_SESSION['EBerichtsnummer_abgegebeneEintraege'];
	$ausgabe_abgegebeneEintraege2=$_SESSION['ENr_abgegebeneEintraege'];
	for($i=0;$i<count($ausgabe_abgegebeneEintraege);$i++)
	{	
	echo "<a href='./ausgabe.php?ENr=$ausgabe_abgegebeneEintraege2[$i]'>$ausgabe_abgegebeneEintraege[$i]</a>";
	echo ", ";
	}
	
	?>
	<?php
	echo "<br>"."<h2>Fertige Einträge</h2>"."<br>";
	$ausgabe_fertigeEintraege=$_SESSION['EBerichtsnummer_fertigeEintraege'];
	$ausgabe_fertigeEintraege2=$_SESSION['ENr_fertigeEintraege'];
	for($i=0;$i<count($ausgabe_fertigeEintraege);$i++)
	{	
	echo "<a href='./ausgabe.php?ENr=$ausgabe_fertigeEintraege2[$i]'>$ausgabe_fertigeEintraege[$i]</a>";
	echo ", ";
	}
	
unset($_SESSION['ENr']);
unset($_SESSION['EBerichtsnummer']);
}	
 else{
	echo "Auf dieses Menü haben Sie keinen Zugriff, bitte melden sie sich erneut an";
	echo"<html>
		<head>
	 	<meta charset='utf-8'>
		</head>
		<body>
		<br></br>
		<form method='POST' action='index.php'>
		<input type='submit' name='back' value='zurück zum Anmeldefenster'>
		</form>
		<br></br>
		</body>
		</html>";
} 
?>
		</div>	
	   </body>
</html>
