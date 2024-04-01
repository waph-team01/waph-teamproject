<?php
session_start();

if(isset($_SESSION['user_id'])) {
    session_destroy();
}
header("Location: form.php");
exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <div class="logout-message">
        <p>You have been successfully logged out.</p>
        <a href="form.php">Back to Login</a>
    </div>
</body>
</html>
