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
      text-align: center;
      padding-top: 20px;
    }

    .welcome-text {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .links {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
    }

    .links form {
      margin: 10px;
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
      max-width: 600px; /* Set maximum width for the post container */
      margin-left: auto;
      margin-right: auto;
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

    /* Adjust home button color */
    button[type="submit"] {
      background-color: #4CAF50; /* Dark green button color */
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
      background-color: #45a049;
    }
    
    .edit-delete-container {
      display: inline-block;
    }
    
    .edit-post-form, .delete-post-form {
      display: inline;
    }
  </style>
</head>
<body>
  <div class="container">
      <?php
      echo "<div class='welcome-text'>Welcome " . htmlentities($_SESSION['username']) . "!</div>";
      ?>
      <div class="links">
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

    <h1>Posts</h1>

    <?php
    $posts = $mysqli->query("SELECT p.postID, p.postContent, p.postDate, u.username
                             FROM posts p
                             JOIN users u ON p.username = u.username
                             ORDER BY p.postDate DESC");

    if ($posts->num_rows > 0) {
        while ($row = $posts->fetch_assoc()) {
            echo "<div class='post-container'>";
            echo "<div class='post'>";
            echo "<h3>" . htmlspecialchars($row['username']) . " posted on " . $row['postDate'] . "</h3>";
            echo "<p>" . htmlspecialchars($row['postContent']) . "</p>";
            
            echo "<div class='edit-delete-container'>";
            if ($row['username'] == $_SESSION['username']) {
                echo "<form action='editpost.php' method='POST' class='edit-post-form'>";
                echo "<input type='hidden' name='postID' value='" . $row['postID'] . "'>";
                echo "<button type='submit'>Edit</button>";
                echo "</form>";
                echo "<form action='deletepost.php' method='POST' class='delete-post-form'>";
                echo "<input type='hidden' name='postID' value='" . $row['postID'] . "'>";
                echo "<button type='submit'>Delete</button>";
                echo "</form>";
            }
            echo "</div>";

            echo "<h4>Comments:</h4>";

            $comments = $mysqli->query("SELECT c.commentContent, c.commentDate, u.username
                                        FROM comments c
                                        JOIN users u ON c.username = u.username
                                        WHERE c.postID = " . $row['postID'] . "
                                        ORDER BY c.commentDate ASC");

            if ($comments->num_rows > 0) {
                while ($commentRow = $comments->fetch_assoc()) {
                    echo "<div class='comment'>";
                    echo "<p>" . htmlspecialchars($commentRow['username']) . " commented on " . $commentRow['commentDate'] . "</p>";
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
