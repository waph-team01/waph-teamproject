<?php
require "sessionauthentication.php";
require "database.php";

if (!isset($_GET['postID'])) {
    echo "Post ID not provided.";
    die();
}

$postID = $_GET['postID'];

$post = $mysqli->query("SELECT postContent FROM posts WHERE postID = $postID")->fetch_assoc();

if (!$post) {
    echo "Post not found.";
    die();
}

?>
<h2>Edit Post</h2>
<form action="updatepost.php" method="POST">
    <input type="hidden" name="postID" value="<?= $postID ?>">
    <textarea name="postContent" rows="4" cols="50" required><?= htmlspecialchars($post['postContent']) ?></textarea><br>
    <input type="submit" value="Update">
</form>
