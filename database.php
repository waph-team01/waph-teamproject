<?php 
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
	function addnewuser($username, $password){
		$mysqli=  new mysqli('localhost','waph_team01','waph@uc!2024','waph_team');
		if($mysqli->connect_errno){ 
			printf("Database connction failed; %s\n", $mysqli->connect_error);
			return FALSE;
		}
		$prepared_sql = "INSERT INTO users(username,password) VALUES(?,md5(?));";
		$stmt = $mysqli->prepare($prepared_sql);
		$stmt->bind_param("ss", $username,$password);
		if($stmt->execute())return TRUE;
		return FALSE;
	}
?>
