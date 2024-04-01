<?php 
$mysqli=  new mysqli('localhost','team01','Pa$$w0rd','waph_team');
		if($mysqli->connect_errno){ 
			printf("Database connction failed; %s\n", $mysqli->connect_error);
			return FALSE;
		}
function addnewuser($username, $password, $fullname, $otheremail, $phone){
		global $mysqli;
		$prepared_sql = "INSERT INTO users(username,password,fullname,otheremail,phone) VALUES(?,md5(?),?,?,?);";
		$stmt = $mysqli->prepare($prepared_sql);
		$stmt->bind_param("sssss", $username,$password,$fullname,$otheremail,$phone);
		if($stmt->execute())return TRUE;
		return FALSE;
	}
function checklogin_mysql($username, $password) {
    global $mysqli;
    $prepared_sql = "SELECT * FROM users WHERE username= ? AND password = MD5(?)";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    $result=$stmt->get_result();
    if ($result->num_rows >= 1) return TRUE;
    return FALSE;
    }
    function changepassword($username, $password) {
    global $mysqli;
    $prepared_sql = "UPDATE users SET password = md5(?) WHERE username= ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ss",$password,$username);
    if ($stmt -> execute()) return TRUE;
    return FALSE;
    }
    function editUser($username, $fullname, $otheremail, $phone) {
    global $mysqli;
    $prepared_sql = "UPDATE users SET fullname = ?, otheremail = ?, phone = ? WHERE username = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ssss", $fullname, $otheremail, $phone, $username);
    return $stmt->execute();
}
?>
