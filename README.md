# WAPH-Web Application Programming and Hacking

## Instructor: Dr. Phu Phung

# Project Title: MiniFacebook

# Team members

1. Tulasiram Nakkanaboina,   nakkantm@mail.uc.edu
2. Vihasith Rasala,          rasalavh@mail.uc.edu
3. Grahika Rampudi,          Rampudga@mail.uc.edu
4. Sai Sandeep Pasham,       pashamsp@mail.uc.edu

# Project Management Information

Source code repository (private access): [Click_here](https://github.com/waph-team01/waph-teamproject)

Project homepage (public): [Click_here](https://github.com/waph-team01/waph-team01.github.io)


## Revision History

| Date       |   Version     |  Description |
|------------|:-------------:|-------------:|
| 26/03/2024 |  0.0          | Init draft   |
| 31/03/2024 |  0.1          | Drafting template   |


# Overview
The mian task of the WAPH procject deals about an inclusive development of a web application called "MiniFacebook". The process od development of the web applications includes a schematic usage of full stack web development learnings and cybersecurity principles which is used for securing the web application by not making it vulnerable for hackers. The website is being developed by our team which constitutes of four members of same class. We used Whatsapp as a channel to communicate and most of our discussion made in physical sessions. We used collobartive notes which can be accessed by all of our teammates where we use that one for the porject discussions, ideas and thoughts for the progress of the project. 

# System Analysis

For the initial phase of the project we developed the website using the system config file which is being used and edited for the WAPH-team project file. Hosts file in etc folder is udpated with the public url waph-team01.minifacebook.com adjacent to the I.P Address. After the creation of the website the web application is being accessed by our team members and the  demo screenshots are provided below. 

# Snippets of the test pages (Demo)

![admin login](Images/Sprint0/admin.png)

![Team01_Personal_Page](Images/Sprint0/personalpage.png)

![test page of nakkantm](Images/Sprint0/Tulasiram1.png)

![test page of rasalavh](Images/Sprint0/rasalavh1.png)

![test page of rampudga](Images/Sprint0/rampudga1.jpeg)

![test page of pashamsp](Images/Sprint0/pashamsp1.png)


# Security analysis


*  How did you apply the security programming principles in your project?
*  What database security principles have you used in your project?
*  Is your code robust and defensive? How?
*  How did you defend your code against known attacks such as XSS, SQL Injection, CSRF, Session Hijacking
*   How do you separate the roles of super users and regular users?

# Software Process Management

_(starting from sprint 0, and updates)_

## Scrum process

Our team, comprised of four classmates, employs a combination of WhatsApp and face-to-face interactions to facilitate our website development endeavors. WhatsApp serves as our primary communication platform, enabling quick exchanges and discussions, while physical meetings provide opportunities for more in-depth brainstorming sessions. Additionally, we utilize collaborative notes accessible to all team members, serving as a central hub for project-related discussions, idea generation, and progress tracking. This collaborative environment fosters creativity and ensures everyone's input is heard and considered. By leveraging these communication channels effectively, we maintain alignment on project goals, distribute tasks efficiently, and address challenges collaboratively. Our collective efforts are focused on driving the website development forward, harnessing the diverse skills and perspectives of each team member to achieve our shared vision for the project's success.

### Sprint 0

Duration: 22/03/2024-03/31/2024

#### Completed Tasks: 

1. Our team has successfully established both public and private repositories named "waph-teamproject" and "waph-team01.github.io" correspondingly.
2. SSL certificates and keys for the team project have been generated.
3. HTTPS has been configured within the local domain name to ensure secure communication.
4. A database has been set up for the system.
5. Individual home pages have been developed for all team members, and their respective lab files have been transferred to the team directory.
6. Testing of the index.html page has been carried out, yielding the anticipated performance and functionality as observed during the tests.

#### Contributions: 

1. Tulasiram Nakkanaboina, 11 commits, 7 hours, contributed in generating the SSL keys and certificates. 
2. Vihasith Rasala, 8 commits, 6 hours, contributed in documentation of README file and organizing the data.
3. Grahika Rampudi, 8 commits, 7 hours, contributed in creating the personal page of our team which includes details of our team members.
4. Sai Sandeep Pasham, 7 commits, 6 hours, contributed in creating the database-data.sql, index.html page which includes the details of admin login. 

# Appendix

**(i) database-account.sql code**

```SQL
create database waph_team;

CREATE USER 'team01'@'localhost' IDENTIFIED BY 'Pa$$w0rd';
GRANT ALL ON waph_team.* TO 'team01'@'localhost';
```

**(ii) database-data.sql code**

```SQL
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
UNLOCK tables;```

**(iii) form.php code**

```HTML
<form action="index.php" method="POST" class="form login">
	
	Username:<input type="text" class="text_feild" name="username" /> <br>
	Password: <input type="password" class="text_feild" name="password" /> <br>
	<button class="button" type="submit">
		Login
	</button>
```

**(iv) index.html code**

```HTML
<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }
  
        .team-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .team-member {
            margin-bottom: 30px;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .team-member img {
            float: left;
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 20px;
        }

        .team-member-details {
            padding: 20px;
        }

        .team-member-details h2 {
            margin-bottom: 10px;
            font-size: 1.5em;
            color: #333; /* Updated color */
        }

        .team-member-details p {
            margin-bottom: 20px;
            color: #666; /* Updated color */
        }

        .team-member-details a {
            color: #007bff;
            text-decoration: none;
        }

        .team-member-details a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
	
    <div class="team-container">
        <!-- Team member 1 -->
        <div class="team-member">
            <img src="images/tulasiram-headshot.jpg" alt="Tulasiram Nakkanaboina">
            <div class="team-member-details">
                <h2>Tulasiram Nakkanaboina</h2>
                <p>Interested in Java Backend Development</p>
                <a href="https://nakkantm-uc.github.io//">Personal Homepage</a>
            </div>
        </div>

        <!-- Team member 2 -->
        <div class="team-member">
            <img src="images/grahika.jpg" alt="Grahika Rampudi">
            <div class="team-member-details">
                <h2>Grahika Rampudi</h2>
                <p>Passionate about Frontend Development</p>
                <a href="https://rampudga.github.io/">Personal Homepage</a>
            </div>
        </div>

        <!-- Team member 3 -->
        <div class="team-member">
            <img src="images/sandeep.jpg" alt="Sai Sandeep Pasham">
            <div class="team-member-details">
                <h2>Sai Sandeep Pasham</h2>
                <p>Fascinated by Database Management</p>
                <a href="https://pashamsp.github.io/">Personal Homepage</a>
            </div>
        </div>

        <!-- Team member 4 -->
        <div class="team-member">
            <img src="images/rasalavh-headshot.jpg" alt="Vihasith Rasala">
            <div class="team-member-details">
                <h2>Vihasith Rasala</h2>
                <p>Professional Graphic Designer</p>
                <a href="https://Vihasith137.github.io/">Personal Homepage</a>
            </div>
        </div>

    </div>
</body>
</html>
'''
