<?php 
if(isset($_GET["abgewiesen"])&& $_GET['abgewiesen']=="true")
{
	echo "Anmeldung fehlgeschlagen!<br>";
}
?>
<form action="login_check.php" method="POST">
	Name: <input type="text" name="loginname">
	Passwort: <input type="text" name="loginpasswort">
	<input type="submit" name="loginbtn" value="Einloggen" >
</form>

<br>
<br>
