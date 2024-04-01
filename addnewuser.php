<?php 
	require "database.php";
	$username = $_POST["username"];
        $fullName = $_POST["fullName"];
        $Email = $_POST["Email"];
	$password = $_POST["password"];
        $phoneNumber = $_POST["phoneNumber"];
	if(isset($username) and isset($password)){
		//echo "Debug> got username=$username;got password=$password";
		if(addnewuser($username, $fullName, $Email, $password, $phoneNumber)){
			echo "Registration Succeed";
 		}else{
		echo "Registartion Failed!";
	}
}
else{
	echo " No username/password/Email/phoneNumber/fullName provided! ";
}

?>
