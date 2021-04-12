<?php
session_start();
require("../model/dbConnection.php");
require("../model/dbFunctions.php");
require("filterInput.php");

if (!empty([$_POST])) {
	// Input sanitation via testInput function 
	$username = testInput($_POST['username']);
	$mypass = testInput($_POST['pass']);
	$role = testInput($_POST['accessRights']);
	$firstname = testInput($_POST['fname']);
	$lastname = testInput($_POST['lname']);
	$email = testInput($_POST['email']);
	// Hashing the password with PASSWORD_HASH()
	$hpassword = password_hash($mypass, PASSWORD_DEFAULT);
	$query = $conn->prepare("SELECT username FROM users WHERE username = :user");
	$query->bindValue(":user", $username);
	$query->execute();
	if ($query->rowCount() < 1) { // If user does not exist
		newUser($firstname, $lastname, $email, $username, $hpassword, $role); // Function call
		echo "User account has been created";
		header('Location:../view/main.php');
		echo'<br><a href="../view/main.php">Home</a>';
	}
	else {
		echo "Customer already exists";
	}
};
?>
