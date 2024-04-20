<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Status</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
  <div class="card">
    <h2>Registration Status</h2>
    <?php 
      require "database.php";

      function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $username = isset($_POST["username"]) ? sanitizeInput($_POST["username"]) : "";
      $fullName = isset($_POST["fullName"]) ? sanitizeInput($_POST["fullName"]) : "";
      $email = isset($_POST["email"]) ? sanitizeInput($_POST["email"]) : "";
      $password = isset($_POST["password"]) ? sanitizeInput($_POST["password"]) : "";
      $phoneNumber = isset($_POST["phoneNumber"]) ? sanitizeInput($_POST["phoneNumber"]) : "";

      $errors = [];
      if (empty($username) || empty($fullName) || empty($email) || empty($password) || empty($phoneNumber)) {
        $errors[] = "All fields are required!";
      }
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format!";
      }
      if (!preg_match("/^[0-9]{10}$/", $phoneNumber)) {
        $errors[] = "Invalid phone number format!";
      }
      if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long!";
      }

      if (empty($errors)) {
        if (addnewuser($username, $fullName, $email, $password, $phoneNumber)) {
          echo "<p>Registration Succeeded</p>";
        } else {
          echo "<p>Registration Failed!</p>";
        }
      } else {
        foreach ($errors as $error) {
          echo "<p class='error'>" . $error . "</p>";
        }
      }
    ?>
    <form action="form.php" method="GET">
      <button type="submit" class="button">Go back to login page</button>
    </form>
  </div>
</div>
</body>
</html>
