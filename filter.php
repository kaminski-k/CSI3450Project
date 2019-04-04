<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `flavors` WHERE CONCAT(`id`, `flavor`, `brand`, `upc`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `flavors`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "icecream");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="custom.css">
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
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
        <form action="filter.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>Flavor</th>
                    <th>Brand</th>
                    <th>UPC</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['flavor'];?></td>
                    <td><?php echo $row['brand'];?></td>
                    <td><?php echo $row['upc'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>