<?php
require "sessionauthentication.php";
require "database.php";

if (isset($_POST['postContent'])) {
    $postContent = htmlspecialchars($_POST['postContent']);
    $username = $_SESSION['username'];

    if (insertPost($postContent, $username)) {
        echo "Post added successfully.";
    } else {
        echo "Failed to add post.";
    }
} else {
    echo "No post content provided.";
}

header("Refresh:3; url=viewposts.php");
