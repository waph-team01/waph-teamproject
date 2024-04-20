<?php
require "sessionauthentication.php";
require "database.php";

$posts = $mysqli->query("SELECT p.postID, p.postContent, p.postDate, u.username
                         FROM posts p
                         JOIN users u ON p.username = u.username
                         ORDER BY p.postDate DESC");

if ($posts->num_rows > 0) {
    while ($row = $posts->fetch_assoc()) {
        echo "<div class='post'>";
        echo "<h3>" . htmlspecialchars($row['username']) . " on " . $row['postDate'] . "</h3>";
        echo "<p>" . htmlspecialchars($row['postContent']) . "</p>";

        // Edit and Delete buttons for the author
        if ($row['username'] == $_SESSION['username']) {
            echo "<a href='editpost.php?postID=" . $row['postID'] . "'>Edit</a> | ";
            echo "<a href='deletepost.php?postID=" . $row['postID'] . "'>Delete</a>";
        }

        echo "<h4>Comments:</h4>";

        
        $comments = $mysqli->query("SELECT c.commentContent, c.commentDate, u.username
                                    FROM comments c
                                    JOIN users u ON c.username = u.username
                                    WHERE c.postID = " . $row['postID'] . "
                                    ORDER BY c.commentDate ASC");

        if ($comments->num_rows > 0) {
            while ($commentRow = $comments->fetch_assoc()) {
                echo "<div class='comment'>";
                echo "<p>" . htmlspecialchars($commentRow['username']) . " on " . $commentRow['commentDate'] . "</p>";
                echo "<p>" . htmlspecialchars($commentRow['commentContent']) . "</p>";
                echo "</div>";
            }
        }

        echo "<h4>Add a Comment:</h4>";
        echo "<form action='addcomment.php' method='POST'>";
        echo "<textarea name='commentContent' rows='2' cols='40' required></textarea>";
        echo "<input type='hidden' name='postID' value='" . $row['postID'] . "'>";
        echo "<input type='submit' value='Comment'>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "No posts found.";
}
?>
