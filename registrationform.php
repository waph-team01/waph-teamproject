<! DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>WAPH-Login page</title>
  <script type="text/javascript">
       function displayTime(){
         document.getElementById('digit-clock').innerHTML = "Current time:" + new Date();
       }
       setInterval(displayTime,500) :
  </script>
</head>
<body>
  <h1>New user registration, waph</h1>
  <div id="digit-clock"></div>
<?php
  echo "Visited time: " . date("Y-m-d h:i:sa")
?>
   <form action="addnewuser.php" method="POST" class="form login">
      Username: <input type="text" class="text_field" name="username" required
      pattern="^[\w.-]+@[\w-]+(.[\w-]+)*$"
      title="Email address is required as username"
      placeholder="username in email"
      onchange="this.setCustomerValidity(this.validity.patternMismatch?this.title: '');" /> <br>
      Password: <input type="password" class="text_field" name="password" /> <br>
     <button class="button" type="submit">Login</button>
   </form>
</body>
</html>
