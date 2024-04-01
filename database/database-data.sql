drop table if exists `users`;
create table users(
  user_id INT AUTO_INCREMENT PRIMARY KEY,
username varchar(50) ,
  fullname varchar(100),
  otheremail varchar(100),
password varchar(100) NOT NULL,
  phone varchar(10));
drop table if exists `superusers`;
CREATE TABLE superusers (
    superuser_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);
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
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    post_type VARCHAR(50),
    title varchar(100) NOT NULL,
    user_id INT,
  posttime varchar(100),
    time_stamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
drop table if exists `comments`;
CREATE TABLE comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT,
    user_id INT,
    comment TEXT NOT NULL,
    time_stamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(post_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

LOCK tables `users` WRITE;
INSERT INTO users(username,password) VALUES ('admin',md5('Pa$$w0rd'));
INSERT INTO users(username,password) VALUES ('test',md5('Pa$$w0rd'));
UNLOCK tables;
