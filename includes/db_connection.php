<?php

    $conn = mysqli_connect('127.0.0.1','root','');

    if(!$conn)
    {
        echo "Not Connected to the server";
    }
    if(!mysqli_select_db($conn,'job'))
    {
        echo "database is not selected";
    }
?>