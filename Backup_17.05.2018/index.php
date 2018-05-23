<?php 
if(isset($_GET["abgewiesen"])&& $_GET['abgewiesen']=="true")
{
	$echo = "Anmeldung fehlgeschlagen!<br>";
}
?>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="css/custom.css">
</head>
<body>



<div class="container bg-faded mt-3">
	<h1 class="text-left pb-2 orange1 textblue1"><img src="logo.jpg" alt="firmensymbol" height="65" width="350">Berichtsheft Anmeldung</h1>
</div>

<div class="textblue1 text-center border"><br><p>Willkommen bei der Berichtsheft Application<br>Bitte melden Sie sich mit ihrem Account an</p></div>

<div class="container bg-faded mt-1 textblue1">	
<form class="text-center pt-3 pb-3 textblue1" action="login_check.php" method="POST">
	<strong><input class="orange1 textblue1" input type="text" name="loginname" placeholder="Name eingeben">
	<input class="orange1 textblue1" type="text" name="loginpasswort" placeholder="Passwort eingeben"></strong>
	<input class="orange1 textblue1" type="submit" name="loginbtn" value="Einloggen" >	
</form>
</div>
<br>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
