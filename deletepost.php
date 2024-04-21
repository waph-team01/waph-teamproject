<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Post</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <div class="card">
      <?php
      require "sessionauthentication.php";
      require "database.php";

      if (!isset($_POST['postID'])) {
          echo "<h2>Error</h2><p>Post ID not provided.</p>";
          die();
      }

      $postID = $_POST['postID'];

      if (deletePost($postID)) {
          echo "<h2>Success</h2><p>Post deleted successfully.</p>";
      } else {
          echo "<h2>Error</h2><p>Failed to delete post.</p>";
      }

      header("Refresh:2; url=index.php");
      ?>
    </div>
  </div>
</body>
</html>
