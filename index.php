<?php
session_start();
if (isset($_POST["username"]) and isset($_POST["password"])) {
    if (checklogin_mysql($username, $password)) {
?>
    <h2> Welcome <?php echo $_POST["username"]; ?> !</h2>
<?php
} else {
    echo "<script>alert('Invalid Username or password please recheck');window.location='form.php';</script>";
}
}
function checklogin_mysql($username, $password) {
    $mysqli = new mysqli('localhost', 'team01', 'Pa$$w0rd', 'waph_team');
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "SELECT * FROM users WHERE username= ? AND password = MD5(?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    $result=$stmt->get_result();
    if ($result->num_rows >= 1) {
        return TRUE;
    } else {
        return FALSE;
    }
}
?>
