<?php
	session_start();
	require("../model/dbConnection.php");
	require("../model/dbFunctions.php");
	require("filterInput.php");
	echo "check";
	// Input via POST method 
	if(!empty($_POST)) {
		echo "check1";
		$username = testInput($_POST['adminUser']);
		$password = testInput($_POST['password']);
		if (checkLogin($username, $password)) {
		echo "You are now logged in as ".$_SESSION["adminUser"];
		echo $_SESSION['userID'];
		header('location:../view/main.php');

		} else {
		header('location:../index.php');
		}

	} else {
		header('location:../index.php');
	}

?>
