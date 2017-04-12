<?php
include_once "Conn.php";

	session_start();
	
	$username = $_POST["usernameInput"];
	$password = $_POST["passwordInput"];
	$repeatPwd = $_POST["pwdRepeatInput"];
	
	if ($password != $repeatPwd) {
		header("Location: " . SIGNUP_ERROR_URL);
	}
	
	if (!authenticateUser($username, $password)) {
		header("Location: " . SIGNUP_ERROR_URL);		
	}
	
	$val = array($username, $password);
	$result = createUser($val);
	
	if ($result) {
		header("Loccation: " . LOGIN_URL);
	} else {
		header("Location: " . SIGNUP_ERROR_URL);
	}
?>