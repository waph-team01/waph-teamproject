<?php 
	require "database.php";
	$username = $_POST["username"];
	$password = $_POST["password"];
	if(isset($username) and isset($password)){
		//echo "Debug> got username=$username;got password=$password";
		if(addnewuser($username, $password)){
			echo "Registration Succeed";
 		}else{
		echo "Registartion Failed!";
	}
}
else{
	echo " No username/password provided! ";
}

?>
