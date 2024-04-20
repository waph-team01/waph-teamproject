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

header("Refresh:3; url=viewposts.php");
