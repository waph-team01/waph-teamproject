<?php
session_start();
session_set_cookie_params(15*60, "/", "waph-team01.mini.facebook.com", TRUE, TRUE);
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
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0fff0;
    }

    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      margin-top: 0;
    }

    .links {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .links form {
      margin-bottom: 10px;
    }

    .links button {
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .links button:hover {
      background-color: #45a049;
    }

    .post-container {
      margin-bottom: 20px;
    }

    .post {
      background-color: #f9f9f9;
      border-radius: 8px;
      padding: 20px;
    }

    .post h3 {
      margin-top: 0;
    }

    .post p {
      margin-bottom: 10px;
    }

    .comment {
      background-color: #f0f0f0;
      border-radius: 4px;
      padding: 10px;
      margin-top: 10px;
    }

    .comment p {
      margin-bottom: 5px;
    }

    .add-comment-form {
      margin-top: 10px;
    }

    .add-comment-form textarea {
      width: calc(100% - 20px);
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
      margin-bottom: 10px;
    }

    .add-comment-form input[type="submit"] {
      background-color: #4CAF50; /* Dark green button color */
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .add-comment-form input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="links">
      <?php echo "<div>Welcome " . htmlentities($_SESSION['username']) . "!</div>"; ?>
      <div>
        <form id="changepasswordform" action="changepasswordform.php" method="POST">
          <input type="hidden" name="username" value="<?php echo urlencode($_SESSION['username']); ?>">
          <button type="submit">Change Password</button>
        </form>
        <form id="viewprofileform" action="viewprofile.php" method="POST">
          <input type="hidden" name="username" value="<?php echo urlencode($_SESSION['username']); ?>">
          <button type="submit">View/Edit Profile</button>
        </form> 
        <form id="addpostform" action="addpost.php" method="POST">
          <button type="submit">Add Post</button>
        </form>
        <form id="logout" action="logout.php" method="POST">
          <button type="submit">Logout</button>
        </form> 
      </div>
    </div>

    <h1>Posts</h1> 

    <?php
    require "database.php";

    $posts = $mysqli->query("SELECT p.postID, p.postContent, p.postDate, u.username
                             FROM posts p
                             JOIN users u ON p.username = u.username
                             ORDER BY p.postDate DESC");

    if ($posts && $posts->num_rows > 0) {
        while ($row = $posts->fetch_assoc()) {
            echo "<div class='post-container'>";
            echo "<div class='post'>";
            echo "<h3>" . htmlspecialchars($row['username']) . " on " . $row['postDate'] . "</h3>";
            echo "<p>" . htmlspecialchars($row['postContent']) . "</p>";

            if ($row['username'] == $_SESSION['username']) {
                echo "<a href='editpost.php?postID=" . $row['postID'] . "'>Edit</a> | ";
                echo "<a href='deletepost.php?postID=" . $row['postID'] . "'>Delete</a>";
            }

            echo "<h4>Comments:</h4>";

            $comments = $mysqli->query("SELECT c.commentContent, c.commentDate, u.username
                                        FROM comments c
                                        JOIN users u ON c.username = u.username
                                        WHERE c.postID = " . $row['postID'] . "
                                        ORDER BY c.commentDate ASC");

            if ($comments && $comments->num_rows > 0) {
                while ($commentRow = $comments->fetch_assoc()) {
                    echo "<div class='comment'>";
                    echo "<p>" . htmlspecialchars($commentRow['username']) . " on " . $commentRow['commentDate'] . "</p>";
                    echo "<p>" . htmlspecialchars($commentRow['commentContent']) . "</p>";
                    echo "</div>";
                }
            }

            echo "<h4>Add a Comment:</h4>";
            echo "<form action='addcomment.php' method='POST' class='add-comment-form'>";
            echo "<textarea name='commentContent' rows='2' required></textarea>";
            echo "<input type='hidden' name='postID' value='" . $row['postID'] . "'>";
            echo "<input type='submit' value='Comment'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No posts found.</p>";
    }
    ?>
  </div>
</body>
</html>
