<?php
	session_start();
	if( (!isset($_SESSION['loginname'])) || (!isset($_SESSION['loginpasswort'])) || (!isset($_SESSION['benutzer']))) 
	{
		header('Location: login.php?abgewiesen=true');
	}
	else
	{
	$benutzer=$_SESSION['benutzer']; 
	include('db.php');
	}
?>