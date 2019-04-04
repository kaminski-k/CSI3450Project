<?php
session_start();

require_once 'db_connector.php';

if ($connection) {
    $attemptedLoginName = $_GET['login-name'];
    $attemptedPassword = $_GET['login-password'];
    
    
    $sql_statement = "SELECT * FROM `users_table` WHERE `user_name` = '$attemptedLoginName' AND `user_password` = '$attemptedPassword' LIMIT 1";
    $result = mysqli_query($connection, $sql_statement);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
           
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['user_name'];
            $_SESSION['userid'] = $row['id'];
            header('Location: showTopMenu.php');
        }
        else {
            echo "Login unsuccessful<br>";
            exit;
        }
    }
    else {
        echo "error" . mysqli_error($connection);
        exit;
    }
}
else {
    echo "Error connecting " . mysqli_connect_errno();
    exit;
}
?>

<!--
This page manages the login logic between the database and the site for login purposes.
!-->