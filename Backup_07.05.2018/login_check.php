<?php 
function logindatenSessions()
	{
	$_SESSION['loginname']=$_POST['loginname'];
	$_SESSION['loginpasswort']=$_POST['loginpasswort'];
	}

if(isset($_POST['loginbtn']))
{
	
	// benutzer	
	session_start();
	
	$benutzer="initialisierung"; // ist das sicher???
	include('db.php');
	$conn = new mysqli($servername, $username, $password, $dbname);
	
		if ($conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		}
	
	$name = $_POST['loginname'];
	$pw = $_POST['loginpasswort'];
	
	
	// 1) suchen ob Logindaten in Ausbilder
	
	$query = "SELECT AName, APasswort FROM ausbilder WHERE AName = ? AND APasswort = ?";
	
	$stmt = $conn->prepare($query); 
	$stmt->bind_param("ss", $name, $pw);
	$stmt->execute();
	$stmt = $stmt->get_result();
	
	
		
		while($row = $stmt->fetch_array())
		{
			
			if($name == $row['AName'] && $pw == $row['APasswort'])
			{
				$ausbilder = $row['AName'];
				$benutzer = "ausbilder";
				logindatenSessions();
				header('Location: ausbilder_menue.php');	
			}
		}

	
	
	// 2) Teilnehmermenü / wenn Logindaten nicht in Ausbilder, dann suche sie in teilnehmer	
	
	if(!isset($ausbilder))
	{
	$query = "SELECT TName, TPasswort, TNr FROM teilnehmer WHERE TName = ? AND TPasswort = ?";
	
	$stmt = $conn->prepare($query); 
	$stmt->bind_param("ss", $name, $pw);
	$stmt->execute();
	$stmt = $stmt->get_result();
	
		while($row = $stmt->fetch_array())
		{	
			if($name == $row['TName'] && $pw == $row['TPasswort'])
			{
				$teilnehmer = $row['TName'];
				$_SESSION['TNr']=$row['TNr'];
				$benutzer ="teilnehmer";
				$_SESSION['benutzer'] = $benutzer;
				logindatenSessions();
				header('Location: teilnehmer_menue.php');	
			}	
		}	
	}	
		
	// 3) wenn Logindaten nicht in DB, dann abweisen oder Anmeldename und passwort stimmen nicht
	if(!isset($ausbilder)&& (!isset($teilnehmer)))
	{	
		header('Location: index.php?abgewiesen=true');	
	}	
	
	$stmt->free_result();
	$conn->close();				
}		
		
	

	

?>