<?php
        define(ROOT,'./');

        include_once ROOT.'includes/db_connection.php';

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($_SERVER['REQUEST_METHOD']=='POST')
        {

        
            $sql = "SELECT * FROM user_info WHERE password = '$password' and email = '$email'";
            $result = mysqli_query($conn,$sql) or die("Failed to query the database" . mysqli_connect_error());

            $row = mysqli_fetch_assoc($result);
            if($row['email']==$email && $row['password'] == $password)
            {
                header('Location:homepage.php');
            }
            else
            {
                header('Location:auth.php');
            }
        }
?>