<?php
include "Conn.php";

	session_start();
	
	$username = $_POST["usernameInput"];
	$password = $_POST["passwordInput"];
	$repeatPwd = $_POST["pwdRepeatInput"];
	
	if ($password != $repeatPwd) {
		header("Location: http://localhost:41062/www/signup_error.html");
	}
	
	$val = array($username, $password);
	$result = createUser($val);
	
	if ($result) {
		header("Loccation: http://localhost:41062/www/login.html");
	} else {
		header("Location: http://localhost:41062/www/signup_error.html");
	}
?>