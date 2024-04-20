<?php
session_set_cookie_params(15*60, "/", "waph-team01.mini.facebook.com", TRUE, TRUE);
session_start();
require "database.php"; 

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"]; 
    $password = $_POST["password"];

    if (checklogin_mysql($username, $password)) {
        $_SESSION["authenticated"] = TRUE;
        $_SESSION["username"] = $username; 
        $_SESSION["browser"] = $_SERVER["HTTP_USER_AGENT"];
    } else {
        session_destroy();
        echo "<script>alert('Invalid Username or password please recheck');window.location='form.php';</script>";
        die();
    }
}

if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] != TRUE) { 
    session_destroy();
    echo "<script>alert('You have not logged in. Please login first');</script>";
    header("Refresh:0; url=form.php");
    die();
}

if ($_SESSION["browser"] != $_SERVER["HTTP_USER_AGENT"]) {
    session_destroy();
    echo "<script>alert('Session hijack detected')</script>"; 
    header("Refresh:0; url=form.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Page</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
      <?php
      echo "<h2>Welcome " . htmlentities($_SESSION['username']) . "!</h2>";
      ?>
      <div class="links">
        <form id="changepasswordform" action="changepasswordform.php" method="POST">
        <input type="hidden" name="username" value="<?php echo urlencode($_SESSION['username']); ?>">
        <button type="submit">Change password</button>
        </form>  
        <form id="edituserform" action="edituser.php" method="GET">
        <input type="hidden" name="username" value="<?php echo urlencode($_SESSION['username']); ?>">
        <button type="submit">Edit profile</button>
        </form>  
        <form id="addpostform" action="addpost.php" method="POST">
        <button type="submit">Add Post</button>
        </form>
        <form id="viewpostsform" action="viewposts.php" method="POST">
        <button type="submit">View Posts</button>
        </form>
        <form id="logout" action="logout.php" method="POST">
        <button type="submit">Logout</button>
        </form> 
    </div>
  </div>
</body>
</html>
