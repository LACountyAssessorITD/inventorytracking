<?php
include_once "Conn.php";

	session_start();
	global $role;

	$username = $_POST["usernameInput"];
	$password = $_POST["passwordInput"];
	
	if (!authenticateUser($username, $password)) {
		$_SESSION["logged_in"] = FALSE;
		header("Location: " . LOGIN_ERROR_URL);		
	}
	
	$val = array($username);
	$result = validateUser($val);
	
	if ($result->num_rows > 0) {
		$row = $result->fetch_array(MYSQLI_NUM);
		if (password_verify($password, $row[2])) {
			$_SESSION["logged_in"] = TRUE;
			$_SESSION["username"] = $_POST["usernameInput"];
			$_SESSION["role"] = $row[3];
			echo $_SESSION["role"];		
			header("Location: " . HOME_PAGE_URL);
		} else {
			$_SESSION["logged_in"] = FALSE;
			header("Location: " . LOGIN_ERROR_URL);
		}
	} else {
		$_SESSION["logged_in"] = FALSE;
		header("Location: " . LOGIN_ERROR_URL);
	}
?>