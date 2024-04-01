<h1>Change Password Form</h1>
<form action="changepassword.php" method="POST" class="form login">
Username: <input type="text" class="text_field" name="username" value="<?php echo isset($_GET['username']) ? htmlentities($_GET['username']) : ''; ?>" readonly /> <br>
Current Password: <input type="password" class="text_field" name="password" /> <br>
New Password: <input type="password" class="text_field" name="newpassword" /> <br>
<button class="button" type="submit"> Change password </button>
