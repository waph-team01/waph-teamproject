 drop table if exists `messages`;

drop table if exists `comments`;


drop table if exists `posts`;

drop table if exists `users`;
CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE,
  password VARCHAR(100) NOT NULL,
  fullname VARCHAR(100),
  otheremail VARCHAR(100),
  phone VARCHAR(10)
);

CREATE TABLE messages (
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    message TEXT NOT NULL,
    user_id INT,
    time_stamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE posts (
    postID INT AUTO_INCREMENT PRIMARY KEY,
    postContent TEXT,
    postDate DATETIME,
    username VARCHAR(255),
    FOREIGN KEY (username) REFERENCES users(username)
);

CREATE TABLE comments (
    commentID INT AUTO_INCREMENT PRIMARY KEY,
    commentContent TEXT,
    commentDate DATETIME,
    postID INT,
    username VARCHAR(255),
    FOREIGN KEY (postID) REFERENCES posts(postID),
    FOREIGN KEY (username) REFERENCES users(username)
);


ALTER TABLE users
ADD COLUMN superuser BOOLEAN DEFAULT 0,
ADD COLUMN account_enabled BOOLEAN DEFAULT 1;

LOCK tables `users` WRITE;
INSERT INTO users(username,password) VALUES ('admin',md5('Pa$$w0rd'));
INSERT INTO users(username,password) VALUES ('test',md5('Pa$$w0rd'));
UNLOCK tables;
