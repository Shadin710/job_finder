<?php
    $name = $_GET['name'];
    $pass = $_GET['pass'];
    include_once 'includes/db_connection.php';

    $sql_reg = "INSERT INTO admin_bio (admin_name,admin_pass) VALUES ('$name','$pass')";

    if (!mysqli_query($conn,$sql_reg)) 
    {
        die("Failed to query " . mysqli_error($conn));
    }
    else
    {
        header("Location:admin_login.php");
    }
?>