<?php

$host = "localhost";
$user = "root";
$password ="";
$database = "icecream";

$id = "";
$flavor = "";
$brand = "";
$upc = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['flavor'];
    $posts[2] = $_POST['brand'];
    $posts[3] = $_POST['upc'];
    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM flavors WHERE id = $data[0]";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $id = $row['id'];
                $flavor = $row['flavor'];
                $brand = $row['brand'];
                $upc = $row['upc'];
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `flavors`(`id`,`flavor`, `brand`, `upc`) VALUES ('$data[0]','$data[1]','$data[2]',$data[3])";
    try{
        $insert_Result = mysqli_query($connect, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessupc();
    }
}

// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `flavors` WHERE `id` = $data[0]";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessupc();
    }
}

// Edit
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `flavors` SET `flavor`='$data[1]',`brand`='$data[2]',`upc`=$data[3] WHERE `id` = $data[0]";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Updated';
            }else{
                echo 'Data Not Updated';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessupc();
    }
}



?>


<!DOCTYPE Html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="custom.css">
        <title>PHP INSERT UPDATE DELETE SEARCH</title>
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
        <form action="php_insert_update_delete_search.php" method="post">
            <input type="number" name="id" placeholder="Id" value="<?php echo $id;?>"><br><br>
            <input type="text" name="flavor" placeholder="Flavor" value="<?php echo $flavor;?>"><br><br>
            <input type="text" name="brand" placeholder="Brand" value="<?php echo $brand;?>"><br><br>
            <input type="number" name="upc" placeholder="UPC" value="<?php echo $upc;?>"><br><br>
            <div>
                <!-- Input For Add Values To Database-->
                <input type="submit" name="insert" value="Add">
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete">
                
                <!-- Input For Find Values With The given ID -->
                <input type="submit" name="search" value="Find">
            </div>
        </form>
    </body>
</html>