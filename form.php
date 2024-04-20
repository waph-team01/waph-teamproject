<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <div class="card">
      <h2>Login</h2>
      <form action="index.php" method="POST" class="form login">
        <div class="input-group">
          <label for="username">Username:</label>
          <input type="text" class="text_field" name="username" id="username" placeholder="Enter your username">
        </div>
        <div class="input-group">
          <label for="password">Password:</label>
          <input type="password" class="text_field" name="password" id="password" placeholder="Enter your password">
        </div>
        <button class="button" type="submit">Login</button>
      </form>
      <div class="registration-link">
        <span>Don't have an account?</span>
        <button class="button" onclick="window.location.href='registrationform.php';">Register</button>
      </div>
    </div>
  </div>
</body>
</html>
