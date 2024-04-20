<?php
require "sessionauthentication.php";
?>

<h2>Add a New Post</h2>
<form action="insertpost.php" method="POST">
    <textarea name="postContent" rows="4" cols="50" required></textarea><br>
    <input type="submit" value="Post">
</form>
