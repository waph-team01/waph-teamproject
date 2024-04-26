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

| Date       |   Version     |  Description     |
|------------|:-------------:|-------------:    |
| 26/03/2024 |  0.0          | Init draft       |
| 31/03/2024 |  0.1          | Drafting template|
| 04/01/2024 |  1.0          |  Sprint 1 update |
| 04/22/2024 |  2.0          | Sprint 2 update  | 
| 04/24/2024 | 3.0	     | Sprint 3 update  |



# Overview
The primary focus of the WAPH project revolves around creating an all-encompassing web application named "MiniFacebook." The development process of this web application incorporates comprehensive full-stack web development techniques and cybersecurity principles to ensure its resilience against potential vulnerabilities exploited by hackers. Our team, comprised of four classmates, collaboratively worked on the website's development. We primarily utilized WhatsApp for communication, supplemented by in-person meetings for discussions. Additionally, we employed collaborative note-taking tools accessible to all team members, facilitating project discussions, idea generation, and progress tracking.

# User Interface
## Front-End:
### Edit & View Profile Feature:
Users can view their profile, and  modify their full name, email, and phone number.
### Change Password Option: 
Users can change their password if facing any issues.
### Posts Visibility Setting: 
Upon logging in, users can view site's posted content 
### Add posts : 
Users have the ability to post content , edit and delete their own posts.
### Add comments :
Users can add comments on all the posts that are visibile to them.
### Super users: 
Only super users have access to a specific page called user management , where he can view all the registered users and edit their access to the application.
## Back-End:
### Database Creation: 
Established a database with essential tables for the application.
### Users Table: 
Stores user information including full name, username, password, email, and phone number.
### Posts Table: 
Records posts from various users, containing fields like Post ID, Title, Content, Post Date, and Owner.
### Database Integration: 
Connected the database with the front end to save user inputs.
Implementation

# Security Analysis
•	The whole application is deployed over HTTPS

•	All the passwords are hashed before inserting into the database. 

•	Added client side and server side validations in the applications

•	All the user inputs are validated , and sanitized before being used or displayed in the code.

•	Strict security validations are implemented and forced to enter values in the required formats to minimize XSS attacks.

•	In the password management page a CSRF token is passed as a hidden parameter and validated at the server side to detect and counter CSRF attacks.

•	All the SQL queries are run as prepared statements and values are binded before executing to minimize SQL injection attacks.

•	Altered the user table to add two new columns one for super user and the other for enable_status of the account . Only the super users have the value 1 and default value is 0 . The super users can disable the access for other users to the application.


# System Analysis

During the initial phase that is for the sprint 0 of the project, we constructed the website utilizing the system configuration file, which was utilized and modified for the WAPH-team project file. The hosts file in the etc folder was updated with the public URL: [https://github.com/waph-team01/waph-teamproject](https://waph-team01.minifacebook.com/) alongside the IP address. 

# Snippets of the test pages (Demo)

![admin login](Images/Sprint0/admin.png)

![Team01_Personal_Page](Images/Sprint0/personalpage.png)

![test page of nakkantm](Images/Sprint0/Tulasiram1.png)

![test page of rasalavh](Images/Sprint0/rasalavh1.png)

![test page of rampudga](Images/Sprint0/rampudga1.jpeg)

![test page of pashamsp](Images/Sprint0/pashamsp1.png)


# Functional Requirements

## Features for posting like images and texts: 
Enabling users to create and share posts with images/texts.
## Database setup: 
Configuring database system for storing application data securely.
## Notification add on:
Implementing notification system for relevant user alerts.
## Forms for authentication and user registration:  
Implementing secure login and registration forms for user access.
## Search functionality: 
Enabling users to search for specific content within application.
## Messaging features: 
Integrating private messaging functionalities for user communication.

# Non - Functional Requirements
## Error handling: 
Managing errors for smoother user experience and application stability.
## Implementing security features: 
Strengthening application security through implementation of various security measures.
## Cookies:
Utilizing cookies for managing session information and enhancing user experience.
## Session information: 
Handling session data to maintain user context and interactions.

# Database:

## Scrum process

### Sprint 0

Duration: 03/22/2024-03/31/2024

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


### Sprint 1

Duration: 03/28/2024-04/01/2024

#### Completed Tasks: 

1.	Established the database according to the outlined criteria.
2.	Developed both login and registration forms.
3.	Executed fundamental features for authenticated users, such as password modification.


#### Contributions: 

1. Tulasiram Nakkanaboina, 11 commits, 7 hours, contributed in creating user registration and profile edit php files snd further developed index.php file
2. Vihasith Rasala, 15 commits, 6 hours, contributed in documentation of
README file and organizing the data. Created and developed logout php file. 
3. Grahika Rampudi, 8 commits, 7 hours, contributed in creating and organizing the database and it’s implementation in back end of web application. 
4. Sai Sandeep Pasham, 7 commits, 6 hours, contributed in creating the change password and login php files.

# Sprint 1 Retrospection
•	The main problem we faced for a team call is unmatched schedule of team members. We are usually doing our team meetings in late nights.
•	Online calls didn’t meet the expected progress of the project, so we are making ourselves available for physical sessions which is difficult.
•	Proper collaborative dashboards require premium subscriptions for third party applications.
•	Sandbox doesn’t work properly which is a dot in a white page.
•	Team members use different OS like MacOS or windows where it’s difficult to work in virtual machine setup if it’s a Macbook.

### Sprint 2

Duration: 04/15/2024-04/22/2024

#### Completed Tasks: 

1.Updated the database design and implemention to incorporate new posts,edits, deletion and user management access.
2.Logged-in users can add a new post, and add a comment on any post
3.Logged in users can edit their own post and the user cannot edit post of other users.


#### Contributions: 

1. Tulasiram Nakkanaboina, 22commits, 14 hours, contributed in creating usermanagement.php and updated index.php,  viewprofile,  edituser php files ,modified style.css to give new appearance to the application.
2. Vihasith Rasala, 18 commits, 10hours, contributed in updating the Edituser.php, viewpost.php, addpost.php, and insertpost.php. 
3. Grahika Rampudi, 19commits, 11 hours, contributed in updating the index.php, deletepost.php, edituser.php, database.php. 
4. Sai Sandeep Pasham, 17 commits, 9 hours, contributed in updating addcomment.php , Insertpost.php, edituser.php, Index.php and documentation of README file and organizing the data.


# Sprint 2 Retrospection
•	The whole sprint went well we were able to achieve the targets we have set before the start of the sprint.
•	All the team members have contributed equally for the project.
•	Sometimes the team members had the time conflicts which has delayed the work a bit
•	This sprint has been wonderful learning experience with the database and handling php code, though few team members have minimal knowledge over this topics.


#Demo Screenshots





# Appendix

**(i) updateuser.php**
![image](https://github.com/waph-team01/waph-teamproject/assets/156159822/3cb74aa6-73da-4c43-9847-e6d40fbd0dce)

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
