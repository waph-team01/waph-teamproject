drop table if exists `users`;
create table users(
username varchar(50) PRIMARY KEY,
password varchar(100) NOT NULL);
LOCK tables 'users' WRITE
INSERT INTO users(username,password) VALUES ('admin',md5('Pa$$w0rd'));
UNLOCK tables;
