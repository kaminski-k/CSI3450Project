<!-- 
This is a partial page.  The purpose is to (1) Start the HTML page (2) set the CSS styles (3) Show the app title
(4) show the navigation menu.
 -->

<html>
	<title>Your Cookbook</title>
<head>
	<link rel="stylesheet" type="text/css" href="custom.css">
</head>

<body>
<div id="topmost-part"> <h1 id="after-login-heading"> Find Your Icecream </h1> </div>
		<div class="menu-container">
			<span class="menu-item"> Welcome, <?php
			session_start();
			echo $_SESSION['username']; ?>. <a href="logout.php"> Logout </a></span> | 
            <span class="menu-item"><a href="php_insert_update_delete_search.php"> ADDorRetrieve </a></span> |
            <span class="menu-item"><a href="filter.php"> Filter </a></span> |
            <span class="menu-item"><a href="ice_cart.php"> Shopping Cart </a></span>
            
		</div>

</body>
</html>