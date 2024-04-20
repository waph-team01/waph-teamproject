<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile - WAPH</title>
  <link rel="stylesheet" href="styles.css"> <!-- Include styles.css -->
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      padding: 20px;
    }

    .edit-profile-card {
      background: #fff;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
      padding: 20px;
      border-radius: 10px; 
      width: 100%;
      max-width: 400px; 
    }

    .input-group {
      
      margin-bottom: 15px;
    }

    label {
     
      display: block; 
      margin-bottom: 5px; 
    }

    .text_field, button {
      width: 100%; 
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      background-color: #007bff; 
      color: white; 
      margin-top: 10px; 
      cursor: pointer; 
    }

    button:hover {
      background-color: #0056b3; 
    }
  </style>
  <script type="text/javascript">
    function validateForm() {
      var email = document.forms["editProfileForm"]["email"].value;
      var phone = document.forms["editProfileForm"]["phoneNumber"].value;
      
      var emailPattern = /^[\w.-]+@[\w-]+(\.[\w-]+)*$/;
      if (!emailPattern.test(email)) {
        alert("Please enter a valid email address");
        return false;
      }
      
      var phonePattern = /^\d{10}$/;
      if (!phonePattern.test(phone)) {
        alert("Please enter a valid 10-digit phone number");
        return false;
      }
    }
  </script>
</head>
<body>
  <div class="container">
    <div class="edit-profile-card">
      <h1>Edit User Profile - WAPH</h1>
      <form name="editProfileForm" action="updateuser.php" method="POST" class="form edit-profile" onsubmit="return validateForm();">
        <div class="input-group">
          <label for="username">Username:</label>
          <input type="text" class="text_field" name="username" value="<?php echo isset($_GET['username']) ? htmlentities($_GET['username']) : ''; ?>" readonly />
        </div>
        <div class="input-group">
          <label for="fullName">Full Name:</label>
          <input type="text" class="text_field" name="fullName" required>
        </div>
        <div class="input-group">
          <label for="email">Email:</label>
          <input type="email" class="text_field" name="email" required placeholder="username@example.com">
        </div>
        <div class="input-group">
          <label for="password">Password:</label>
          <input type="password" class="text_field" name="password" required>
        </div>
        <div class="input-group">
          <label for="phoneNumber">Phone Number:</label>
          <input type="tel" class="text_field" name="phoneNumber" required pattern="[0-9]{10}" title="Please enter a 10-digit phone number">
        </div>
        <button type="button" onclick="window.location.href='index.php';">Home</button>
        <button type="submit">Update Profile</button>
      </form>
    </div>
  </div>
</body>
</html>
