<?php 
	require "database.php";
	$username = $_POST["username"];
	$fullName = $_POST["fullName"];
	$email = $_POST["email"]; 
	$password = $_POST["password"];
	$phoneNumber = $_POST["phoneNumber"];
	if(isset($username) && isset($password) && isset($fullName) && isset($email) && isset($phoneNumber)){
		if(addnewuser($username, $fullName, $email, $password, $phoneNumber)){
			echo "Registration Succeeded";
 		}else{
			echo "Registration Failed!";
		}
	}
	else{
		echo "No username/password/email/phoneNumber/fullName provided!";
	}
?>
