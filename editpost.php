<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Post</title>
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

      $post = $mysqli->query("SELECT postContent FROM posts WHERE postID = $postID")->fetch_assoc();

      if (!$post) {
          echo "<h2>Error</h2><p>Post not found.</p>";
          die();
      }
      ?>
      <h2>Edit Post</h2>
      <form action="updatepost.php" method="POST">
          <input type="hidden" name="postID" value="<?= $postID ?>">
          <div class="input-group">
              <textarea name="postContent" rows="4" cols="50" class="text_field" required><?= htmlspecialchars($post['postContent']) ?></textarea><br>
          </div>
          <button class="button" type="submit">Update</button>
      </form>
    </div>
  </div>
</body>
</html>
