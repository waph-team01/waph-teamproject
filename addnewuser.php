<?php 
	require "database.php";
	$username = $_POST["username"];
        $FullName = $_POST["FullName"];
        $Email = $_POST["Email"];
	$password = $_POST["password"];
        $PhoneNumber = $_POST["PhoneNumber"];
	if(isset($username) and isset($password)){
		//echo "Debug> got username=$username;got password=$password";
		if(addnewuser($username, $FullName, $Email, $password, $PhoneNumber)){
			echo "Registration Succeed";
 		}else{
		echo "Registartion Failed!";
	}
}
else{
	echo " No username/password/Email/PhoneNumber/FullName provided! ";
}

?>
