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
      background-color: #4CAF50; 
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
    $rand = bin2hex(openssl_random_pseudo_bytes(16));
    $_SESSION["nocsrftoken"] = $rand;
    ?>
    <h1>Change Password Form</h1>
    <form action="changepassword.php" method="POST" class="form login" onsubmit="return validatePassword()">
      <div class="input-group">
        <label for="username">Username:</label>
        <input type="text" class="text_field" name="username" value="<?php echo isset($_GET['username']) ? htmlentities($_GET['username']) : ''; ?>" readonly />
      </div>
      <div class="input-group">
        <label for="password">Current Password:</label>
        <input type="password" class="text_field" name="password" />
      </div>
      <div class="input-group">
        <label for="newpassword">New Password:</label>
        <input type="password" class="text_field" name="newpassword" id="newpassword" />
      </div>
      <div class="input-group">
        <label for="confirmpassword">Confirm New Password:</label>
        <input type="password" class="text_field" name="confirmpassword" id="confirmpassword" />
      </div>
      <div>
        <input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>"/>
      </div>
      <button class="button" type="submit">Change password</button>
      <button class="button" onclick="window.location.href='index.php';">Home</button>
    </form>
  </div>

  <script>
    function validatePassword() {
      var newPassword = document.getElementById("newpassword").value;
      var confirmPassword = document.getElementById("confirmpassword").value;

      if (newPassword.length < 8 || !/[A-Z]/.test(newPassword) || !/[!@#$%^&*()_+\-=\[\]{};':\\|,.<>\/?]+/.test(newPassword) || !/\d/.test(newPassword)) {
        alert("Password must be at least 8 characters long and contain at least one capital letter, one symbol, and one digit.");
        return false;
      }

      if (newPassword !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
      }

      return true;
    }
  </script>
</body>
</html>
