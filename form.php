<form action="index.php" method="POST" class="form login">
    Username: <input type="text" class="text_field" name="username" /><br>
    Password: <input type="password" class="text_field" name="password" /><br>
    <button class="button" type="submit">
        Login
    </button>
    <button class="button" onclick="window.location.href='registrationform.php';"> <!-- Changed onclick to correctly navigate -->
        New User Registration
    </button>
</form>
