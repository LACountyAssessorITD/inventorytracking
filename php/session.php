<?php
	function checkForActiveSession() {
		if (!userLoggedIn()) {
			header("Location: http://localhost:41062/www/login.html");
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