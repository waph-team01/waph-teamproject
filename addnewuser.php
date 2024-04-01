<?php 
	require "database.php";
	$username = $_POST["username"];
        $Full Name = $_POST["Full Name"];
        $Email = $_POST["Email"];
	$password = $_POST["password"];
        $Phone Number = $_POST["Phone Number"];
	if(isset($username) and isset($password)){
		//echo "Debug> got username=$username;got password=$password";
		if(addnewuser($username, $Full Name, $Email, $password, $Phone Number)){
			echo "Registration Succeed";
 		}else{
		echo "Registartion Failed!";
	}
}
else{
	echo " No username/password/Email/Phone Number/Full Name provided! ";
}

?>
