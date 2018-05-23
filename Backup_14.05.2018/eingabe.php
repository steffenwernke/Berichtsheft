<?php
include("header.php");

$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}   
$Tname = $_SESSION['loginname'];	

$ENr=$_GET['ENr'];

$queryAuslesen ="SELECT * FROM eintraege WHERE eintraege.ENr = '$ENr'";

	$stmt = $conn->prepare($queryAuslesen); 
	$stmt->execute(); 
	$stmt = $stmt->get_result();
	
	$row = $stmt->fetch_row();
	
		
	$EBerichtsnummer = $row[4];
	$AusbildungsWocheBeginn = $row[7];	
	$AusbildungsWocheEnde = $row[8];
	$DatumUnterschrift = $row[9];

	
	if(isset($_POST['laden']) && isset($_POST['auswahlnummer'])){
			$auswahlnummer = $_POST['auswahlnummer'];
		
	$stmt->free_result();
	$conn->close();
	
	$conn = new mysqli($servername, $username, $password, $dbname);
 
	if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}   
	
	$queryAuslesen1 ="SELECT * FROM eintraege, teilnehmer WHERE eintraege.TNr = teilnehmer.TNr AND teilnehmer.TName = '$Tname' AND eintraege.EBerichtsnummer = '$auswahlnummer'";
	
	$stmt = $conn->prepare($queryAuslesen1); 
	$stmt->execute(); 
	$stmt = $stmt->get_result();
	
	$row = $stmt->fetch_row();		
	}
	
	$EName = $row[2];	
	$EAbteilung = $row[3];	
	$TextBetrieblich = $row[5];	
	$TextTheorie = $row[6];	

	
	$stmt->free_result();
	$conn->close();
	
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
		<input type="text" name="name" placeholder="Name eingeben" value="<?php echo $EName ?>"><label> Name</label><br></br>
		<input type="text" name="abteilung" placeholder="Abteilung eingeben" value="<?php echo $EAbteilung ?>"><label> Abteilung</label><br></br>
		<input type="integer" name="nummer" placeholder="Nummer eingeben" value="<?php echo $EBerichtsnummer ?>"><label> Berichtsnummer</label><br></br>
		<input type="date" name="vom" placeholder="Start Datum eingeben" value="<?php echo $AusbildungsWocheBeginn ?>"><label> Start Datum</label><br></br>
		<input type="date" name="bis" placeholder="End Datum eingeben" value="<?php echo $AusbildungsWocheEnde ?>"><label> Ende Datum</label><br></br>
		<textarea rows="17" cols="90" maxlength="1500" type="text" name="betrieb" placeholder="Betriebliche Tätigkeiten eingeben"><?php echo $TextBetrieblich ?></textarea><br/><label> Betriebliche Tätigkeiten</label><br></br>
		<textarea rows="17" cols="90" maxlength="1500" type="text" name="theorie" placeholder="Theorie Themen eingeben"><?php echo $TextTheorie ?></textarea><br/><label> Theorie Themen</label><br></br>
		<input type="date" name="unterschrift" placeholder="Datum Unterschrift eingeben" value="<?php echo $DatumUnterschrift ?>"><label> Datum der Unterschrift</label><br></br>
		<input type="submit" name="abgeben" value="Abgeben">
		<input type="submit" name="speichern" value="Speichern">
		</form>
		<form method='POST' action='eingabe.php?ENr=<?php echo $ENr?>'>
		<input type="text" name="auswahlnummer" placeholder="Berichtsnummer"><label></label>
		<input type="submit" name="laden" value="Laden">
		</form>	
   </body>
</html>