<html>
	<title> Index </title>
<head>
	<link rel="stylesheet" type="text/css" href="custom.css">
</head>

<body>
	<h1> Find Your Icecream </h1>
	<form class="login-grid" id="index-login" action="login.php">
		<div class="login">
			<div class="item1">
				Username: <input name="login-name" class="login-textbox" id="username">
			</div>
			
			<div class="item2">
				Password: <input type="password" name="login-password" class="login-textbox" id="password">
			</div>
			
			<div class="item3">
				<button class="login-button" id="login-button" > Login </button>
				<a href="register.html" id="register-button"> <input type="button" name="Register" value= "Register" class="login-button" id="register"> </a>
			</div>
		</div>
	</form>
</body>
</html>

<?php
    require_once 'showMainWelcome.php';
?>

<!--
This code is the first page viewed when visiting the site. It should not be changed. All of its code will show up on other pages if anything is added.
!-->
