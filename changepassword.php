<?php
require "sessionauthentication.php";
require "database.php";

$token = $_POST['csrf-token'];
if (!isset($token) || $token !== $_SESSION['csrf-token']) {
    echo "CSRF Attack is detected";
    die();
}

$username = $_SESSION['username'];
$newPassword = $_POST['newpassword'];
if (isset($username) && isset($newPassword)) {
    echo "Debug> changepassword.php got username=$username; got password=$newPassword";
    if (changepassword($username, $newPassword)) {
        echo "Password has been changed";
    } else {
        echo "Change password failed!";
    }
} else {
    echo "No username/password provided!";
}
?>
