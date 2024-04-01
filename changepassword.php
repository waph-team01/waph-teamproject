<?php
	require "session_auth.php";
	require "database.php";
	$token= $_POST['nocsrftoken'];
	if(!isset($token) or $token!=$_SESSION['nocsrftoken']){
		echo "CSRF Attack is detected";
		die();
	}
	$username= $_SESSION['username'];
	$password= $_REQUEST['newpassword'];
	if(isset($username) and isset($password)){
		echo "Debug> changepassword.php got username=$username;got password=$password";
		if(changepassword($username, $password)){
			echo "Password has been changed";
 		}else{
		echo "Change password failed!";
	}
}
else{
	echo " No username/password provided! ";
}
?>
