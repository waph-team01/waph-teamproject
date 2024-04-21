<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Page</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    .post {
      background-color: #f9f9f9;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
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
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    .add-comment-form input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .user-post {
      background-color: #e6f7ff;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
    require "sessionauthentication.php";
    require "database.php";

    $posts = $mysqli->query("SELECT p.postID, p.postContent, p.postDate, u.username
                             FROM posts p
                             JOIN users u ON p.username = u.username
                             ORDER BY p.postDate DESC");

    if ($posts->num_rows > 0) {
        while ($row = $posts->fetch_assoc()) {
            echo "<div class='post" . ($row['username'] == $_SESSION['username'] ? " user-post" : "") . "'>";
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

            if ($comments->num_rows > 0) {
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
        }
    } else {
        echo "<p>No posts found.</p>";
    }
    ?>
  </div>
</body>
</html>
