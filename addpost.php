<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add a New Post</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <div class="card">
      <h2>Add a New Post</h2>
      <form action="insertpost.php" method="POST" class="form login">
        <div class="input-group">
          <label for="postContent">Post Content:</label>
          <textarea name="postContent" rows="4" cols="50" class="text_field" required></textarea>
        </div>
        <button class="button" type="submit">Post</button>
        <button class="button" onclick="window.location.href='index.php';">Home</button>
      </form>
    </div>
  </div>
</body>
</html>
