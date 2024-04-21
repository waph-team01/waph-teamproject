<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile - WAPH</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <div class="edit-profile-card">
      <h1>Edit User Profile - WAPH</h1>
      <form name="editProfileForm" action="updateuser.php" method="POST" class="form edit-profile" onsubmit="return validateForm();">
        <div class="input-group">
          <label for="username">Username:</label>
          <input type="text" class="text_field" name="username" value="<?php session_start(); echo isset($_SESSION['username']) ? htmlentities($_SESSION['username']) : ''; ?>" readonly />
        </div>
        <div class="input-group">
          <label for="fullName">Full Name:</label>
          <input type="text" class="text_field" name="fullName" required oninput="validateFullName()">
          <div class="error-message" id="fullName-error"></div>
        </div>
        <div class="input-group">
          <label for="email">Email:</label>
          <input type="email" class="text_field" name="email" required placeholder="username@example.com" oninput="validateEmail()">
          <div class="error-message" id="email-error"></div>
        </div>
        <div class="input-group">
          <label for="password">Password:</label>
          <input type="password" class="text_field" name="password" required oninput="validatePassword()">
          <div class="error-message" id="password-error"></div>
        </div>
        <div class="input-group">
          <label for="phoneNumber">Phone Number:</label>
          <input type="tel" class="text_field" name="phoneNumber" required pattern="[0-9]{10}" title="Please enter a 10-digit phone number" oninput="validatePhoneNumber()">
          <div class="error-message" id="phoneNumber-error"></div>
        </div>
        <button class="button" type="button" onclick="window.location.href='index.php';">Home</button>
        <button class="button" type="submit">Update Profile</button>
      </form>
    </div>
  </div>

  <script>
    function validateFullName() {
      var fullName = document.forms["editProfileForm"]["fullName"].value;
      var fullNameError = document.getElementById("fullName-error");
      if (fullName == "") {
        fullNameError.innerHTML = "Full Name must be filled out";
      } else {
        fullNameError.innerHTML = "";
      }
    }

    function validateEmail() {
      var email = document.forms["editProfileForm"]["email"].value;
      var emailError = document.getElementById("email-error");
      if (!isValidEmail(email)) {
        emailError.innerHTML = "Invalid email address";
      } else {
        emailError.innerHTML = "";
      }
    }

    function validatePassword() {
      var password = document.forms["editProfileForm"]["password"].value;
      var passwordError = document.getElementById("password-error");
      if (password.length < 8) {
        passwordError.innerHTML = "Password must be at least 8 characters long";
      } else {
        passwordError.innerHTML = "";
      }
    }

    function validatePhoneNumber() {
      var phoneNumber = document.forms["editProfileForm"]["phoneNumber"].value;
      var phoneNumberError = document.getElementById("phoneNumber-error");
      if (!isValidPhoneNumber(phoneNumber)) {
        phoneNumberError.innerHTML = "Please enter a valid 10-digit phone number";
      } else {
        phoneNumberError.innerHTML = "";
      }
    }

    function isValidEmail(email) {
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }

    function isValidPhoneNumber(phoneNumber) {
      var phoneRegex = /^[0-9]{10}$/;
      return phoneRegex.test(phoneNumber);
    }

    function validateForm() {
      validateFullName();
      validateEmail();
      validatePassword();
      validatePhoneNumber();

      var errors = document.querySelectorAll(".error-message");
      for (var i = 0; i < errors.length; i++) {
        if (errors[i].innerHTML !== "") {
          return false;
        }
      }

      return true;
    }
  </script>
</body>
</html>
