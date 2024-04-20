drop table if exists `messages`;
CREATE TABLE messages (
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    message TEXT NOT NULL,
    user_id INT,
    time_stamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

drop table if exists `posts`;
CREATE TABLE posts (
    postID INT AUTO_INCREMENT PRIMARY KEY,
    postContent TEXT,
    postDate DATETIME,
    username VARCHAR(255),
    FOREIGN KEY (username) REFERENCES users(username)
);

drop table if exists `comments`;
CREATE TABLE comments (
    commentID INT AUTO_INCREMENT PRIMARY KEY,
    commentContent TEXT,
    commentDate DATETIME,
    postID INT,
    username VARCHAR(255),
    FOREIGN KEY (postID) REFERENCES posts(postID),
    FOREIGN KEY (username) REFERENCES users(username)
);

drop table if exists `users`;
create table users(
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username varchar(50) ,
  password varchar(100) NOT NULL,
  fullname varchar(100),
  otheremail varchar(100),
  phone varchar(10));

drop table if exists `superusers`;
CREATE TABLE superusers (
    superuser_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

LOCK tables `users` WRITE;
INSERT INTO users(username,password) VALUES ('admin',md5('Pa$$w0rd'));
INSERT INTO users(username,password) VALUES ('test',md5('Pa$$w0rd'));
UNLOCK tables;
