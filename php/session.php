<?php
include_once "constants.php";

	function checkForActiveSession() {
		if (!userLoggedIn()) {
			header("Location: " . LOGIN_URL);
		}
	}
	
	function userLoggedIn() {
		return $_SESSION["logged_in"];
	}

	function checkRole(){
		return $_SESSION["role"];
	}

	function getName(){
		return $_SESSION["username"];
	}
?>