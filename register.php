<?php
    

    include_once 'includes/db_connection.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    $name_regex = '/^([A-Z]([a-z]){3,7}[0-9]{1,4})$/';
    $email_regex = '/^\w+([-+.\']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/';
    $pass_regex = '/^([A-z]+([0-9]+)?([@#$&%]+)?){6,20}$/';

    if(strcmp($pass,$pass2)<>0)
    {
        echo "Password doesn't match";
    }
    if(preg_match($name_regex,$name) and preg_match($email_regex,$email) and preg_match($pass_regex,$pass))
    {
        //insert every thing in database

        $sql = "INSERT INTO user_info (username,email,pass) VALUES ('$name','$email','$pass')";
        if(!mysqli_query($conn,$sql))
        {
            echo("Error description: " . mysqli_error($conn));
        }
        else
        {
            header('Location:auth.php');
        }
    }
    else
    {
        echo "error in regex";
    }
    mysqli_close($conn);

?>