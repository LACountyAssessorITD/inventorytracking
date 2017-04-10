<?php
include "Conn.php";

	session_start();
	global $role;


	$username = $_POST["usernameInput"];
	$password = $_POST["passwordInput"];
	
	$val = array($username, $password);
	$result = validateUser($val);
	
	if ($result->num_rows > 0) {
		$_SESSION["logged_in"] = TRUE;
		$row = $result->fetch_array(MYSQLI_NUM);
		$_SESSION["role"]= $row[3];
		$_SESSION["username"]= $_POST["usernameInput"];
		echo $_SESSION["role"];		
		header("Location: http://localhost:41062/www/index.php");

	} else {
		$_SESSION["logged_in"] = FALSE;
		header("Location: http://localhost:41062/www/login_error.html");
	}

?>