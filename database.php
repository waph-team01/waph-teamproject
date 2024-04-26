<?php
$mysqli = new mysqli('localhost', 'team01', 'Pa$$w0rd', 'waph_team');
if ($mysqli->connect_errno) {
    printf("Database connection failed: %s\n", $mysqli->connect_error);
    return false;
}

function addnewuser($username, $fullname, $otheremail, $password, $phone) {
    global $mysqli;
    $prepared_sql = "INSERT INTO users(username, password, fullname, otheremail, phone) VALUES(?, md5(?), ?, ?, ?);";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("sssss", $username, $password, $fullname, $otheremail, $phone);
    if ($stmt->execute()) return true;
    return false;
}

function updateuser($username, $fullname, $otheremail, $password, $phone) {
    global $mysqli;
    $prepared_sql = "UPDATE users SET password=md5(?), fullname=?, otheremail=?, phone=? WHERE username=?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("sssss", $password, $fullname, $otheremail, $phone, $username);
    if ($stmt->execute()) return true;
    return false;
}

function fetchUserProfile($username)
{
    global $mysqli;
    $prepared_sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        return $result->fetch_assoc();
    }
    return null;
}

function checklogin_mysql($username, $password) {
    global $mysqli;
    $prepared_sql = "SELECT * FROM users WHERE username = ? AND password = MD5(?) AND account_enabled = 1";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows >= 1) return true;
    return false;
}

function changepassword($username, $password) {
    global $mysqli;
    $prepared_sql = "UPDATE users SET password = md5(?) WHERE username= ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ss", $password, $username);
    if ($stmt->execute()) return true;
    return false;
}

function editUser($username, $fullname, $otheremail, $phone) {
    global $mysqli;
    $prepared_sql = "UPDATE users SET fullname = ?, otheremail = ?, phone = ? WHERE username = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ssss", $fullname, $otheremail, $phone, $username);
    return $stmt->execute();
}

function insertPost($postContent, $username) {
    global $mysqli;
    $prepared_sql = "INSERT INTO posts (postContent, postDate, username) VALUES (?, NOW(), ?)";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ss", $postContent, $username);
    return $stmt->execute();
}

function insertComment($commentContent, $postID, $username) {
    global $mysqli;
    $prepared_sql = "INSERT INTO comments (commentContent, commentDate, postID, username) VALUES (?, NOW(), ?, ?)";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("sis", $commentContent, $postID, $username);
    return $stmt->execute();
}

function updatePost($postID, $postContent) {
    global $mysqli;
    $prepared_sql = "UPDATE posts SET postContent = ? WHERE postID = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("si", $postContent, $postID);
    return $stmt->execute();
}

function deletePost($postID) {
    global $mysqli;
    
    $prepared_sql1 = "DELETE FROM comments WHERE postID = ?";
    $stmt1 = $mysqli->prepare($prepared_sql1);
    $stmt1->bind_param("i", $postID);
    $stmt1->execute();

    $prepared_sql = "DELETE FROM posts WHERE postID = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("i", $postID);
    return $stmt->execute();
}

function changeUserStatus($username, $status) {
    global $mysqli;
    $prepared_sql = "UPDATE users SET account_enabled = ? WHERE username = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("is", $status, $username);
    return $stmt->execute();
}

?>
