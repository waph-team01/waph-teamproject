<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Comment</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      max-width: 90%;
      width: 400px;
      padding: 20px;
      border-radius: 8px;
      background-color: #f9f9f9;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card h2 {
      margin-top: 0;
    }

    .card form {
      margin-top: 20px;
    }

    .card textarea {
      width: calc(100% - 20px);
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
      margin-bottom: 10px;
    }

    .card input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    .card input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h2>Add Comment</h2>
      <?php
      require "sessionauthentication.php";
      require "database.php";

      if (isset($_POST['commentContent']) && isset($_POST['postID'])) {
          $commentContent = htmlspecialchars($_POST['commentContent']);
          $postID = $_POST['postID'];
          $username = $_SESSION['username'];

          if (insertComment($commentContent, $postID, $username)) {
              echo "Comment added successfully.";
          } else {
              echo "Failed to add comment.";
          }
      } else {
          echo "No comment content was provided";
      }

      header("Refresh:2; url=index.php");
      ?>
    </div>
  </div>
</body>
</html>
