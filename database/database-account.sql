create database waph_team;
CREATE USER 'team01'@'localhost' IDENTIFIED BY 'Pa$$w0rd';
GRANT ALL ON waph_team.* TO 'team01'@'localhost';
