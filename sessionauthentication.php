<?php
	session_start();
	session_set_cookie_params(15*60, "/","waph-team01.minifacebook.com",TRUE,TRUE);
	if(!$_SESSION['authenticated'] or $_SESSION["authenticated"] != TRUE){
		session_destroy();
		echo "<script>alert('You have not login, Please login first');</script>";
		header("Refresh:0; url=form.php");
		die();
	}

	if($_SESSION["browser"] != $_SERVER["HTTP_USER_AGENT"]){
		session_destroy();
		echo "<script>alert('Session hijacking attack is detected!');</script>";
		header("Refresh:0; url=form.php");
		die();
	}
?>
