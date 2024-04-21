<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .form {
      text-align: left;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      margin-right: 10px;
      background-color: #4CAF50; /* Dark green button color */
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
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
        <button class="button" type="submit">Go back to login page</button>
    </form>
  </div>
</body>
</html>
