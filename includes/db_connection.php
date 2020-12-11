<?php

    $dbHost = "localhost";
    $dbUser= "root";    
    $dbpassword = "";

    $dbName = "job";
    $conn = mysqli_connect($dbHost, $dbUser,$dbpassword,$dbName);

    if(!$conn)
    {
        die("connection failed" . mysqli_connect_error());
    }
    else 
    {    
    echo "Connected";   
    }
?>