<?php
	session_start();

	$_SESSION["logged_in"] = FALSE;
	header("Location: http://localhost:41062/www/login.html");
?>

