<?php 
$mysqli=  new mysqli('localhost','waph_team01','waph@uc!2024','waph_team');
		if($mysqli->connect_errno){ 
			printf("Database connction failed; %s\n", $mysqli->connect_error);
			return FALSE;
		}
	function addnewuser($username, $password){
		global mysqli;
		$prepared_sql = "INSERT INTO users(username,password) VALUES(?,md5(?));";
		$stmt = $mysqli->prepare($prepared_sql);
		$stmt->bind_param("ss", $username,$password);
		if($stmt->execute())return TRUE;
		return FALSE;
	}
?>
