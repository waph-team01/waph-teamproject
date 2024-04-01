<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>WAPH-Login page</title>
  <script type="text/javascript">
    function displayTime() {
      document.getElementById('digit-clock').innerHTML = "Current time: " + new Date();
    }
    setInterval(displayTime, 500);
    
    function validateForm() {
      var email = document.forms["registrationForm"]["email"].value;
      var phone = document.forms["registrationForm"]["phone"].value;
      
      // Email validation
      var emailPattern = /^[\w.-]+@[\w-]+(\.[\w-]+)*$/;
      if (!emailPattern.test(email)) {
        alert("Please enter a valid email address");
        return false;
      }
      
      // Phone number validation
      var phonePattern = /^\d{10}$/;
      if (!phonePattern.test(phoneNumber)) {
        alert("Please enter a valid 10-digit phone number");
        return false;
      }
    }
  </script>
</head>
<body>
  <h1>New user registration, WAPH</h1>
  <div id="digit-clock"></div>
<?php
  echo "Visited time: " . date("Y-m-d h:i:sa");
?>
  <form name="registrationForm" action="addnewuser.php" method="POST" class="form login" onsubmit="return validateForm();">
    Username: <input type="text" class="text_field" name="username" required
    pattern="^[\w.-]+@[\w-]+(.[\w-]+)*$"
    title="Email address is required as username"
    placeholder="username in email"
    onchange="this.setCustomerValidity(this.validity.patternMismatch?this.title: '');" /> <br>
    Full Name: <input type="text" class="text_field" name="fullName" required><br>
    Email: <input type="email" class="text_field" name="email" required placeholder="username@example.com"><br>
    Password: <input type="password" class="text_field" name="password" required><br>
    Phone Number: <input type="tel" class="text_field" name="phoneNumber" required pattern="[0-9]{10}" title="Please enter a 10-digit phone number"><br>
    <button class="button" type="submit">Register</button>
  </form>
</body>
</html>
