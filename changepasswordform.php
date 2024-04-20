<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password Form</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <?php
    session_start();
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
