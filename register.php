<?php
	$username = "root";
	$password = "";
	$hostname = "localhost";
	$dbname = "icecream";

	$selected = mysqli_connect($hostname, $username, $password, $dbname);

	if(isset($_GET['user_name']) && isset($_GET['user_password']) && isset($_GET['email'])){
		$user = $_GET['user_name'];
		$pass = $_GET['user_password'];
		$email = $_GET['email'];
		$query = "SELECT * FROM users_table WHERE user_name='$user'";
		$result = mysqli_query($selected, $query);
		if(mysqli_num_rows($result) == 0) { 
			$query = "INSERT INTO users_table (user_name, user_password, email) VALUES ('$user', '$pass', '$email')";
			$result = mysqli_query($selected, $query);
			echo '<script type="text/javascript">alert("Account Registration Successful!");</script>';
			include("index.php");
		} else {
			echo '<script type="text/javascript">alert("That username is already taken!");</script>';
			echo '<script type="text/javascript">window.history.back(); </script>';
		}
}
	mysqli_close($selected);
?>

<!--
This page manages the register logic between the database and the site for register purposes.
!-->