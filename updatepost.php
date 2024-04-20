<?php
require "sessionauthentication.php";
require "database.php";

if (!isset($_POST['postID']) || !isset($_POST['postContent'])) {
    echo "Post ID or content not provided.";
    die();
}

$postID = $_POST['postID'];
$postContent = htmlspecialchars($_POST['postContent']);

if (updatePost($postID, $postContent)) {
    echo "Post updated successfully.";
} else {
    echo "Failed to update post.";
}

header("Refresh:3; url=viewposts.php");
?>
