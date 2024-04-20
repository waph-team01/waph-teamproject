<?php
require "sessionauthentication.php";
require "database.php";

$token = $_POST['nocsrftoken'];
if (!isset($token) || $token !== $_SESSION['nocsrftoken']) {
    echo "CSRF Attack is detected";
    die();
}

$username = $_SESSION['username'];
$newPassword = $_POST['newpassword'];
if (isset($username) && isset($newPassword)) {
    echo "Debug> changepassword.php got username = $username; got password = $newPassword <br>";
    if (changepassword($username, $newPassword)) {
        echo "Password has been changed";
    } else {
        echo "Change password failed!";
    }
} else {
    echo "No username/password provided!";
}
?>
<form action="form.php" method="GET">
    <button type="submit">Go back to login page</button>
</form>
