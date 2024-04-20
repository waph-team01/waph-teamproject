<?php
require "sessionauthentication.php";
require "database.php";

if (!isset($_GET['postID'])) {
    echo "Post ID not provided.";
    die();
}

$postID = $_GET['postID'];

if (deletePost($postID)) {
    echo "Post deleted successfully.";
} else {
    echo "Failed to delete post.";
}

header("Refresh:3; url=viewposts.php");
?>
