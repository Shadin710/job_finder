<?php
        session_start();
        include_once 'includes/db_connection.php';

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($_SERVER['REQUEST_METHOD']=='POST')
        {

        
            $sql = "SELECT * FROM user_info WHERE pass = '$password' and email = '$email'";
            $result = mysqli_query($conn,$sql) or die("Failed to query the database" . mysqli_connect_error());

            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            if($row['email']==$email && $row['pass'] == $password)
            {
                $_SESSION['owner_id'] = $id;
                $_SESSION['email']=$email;
                $_SESSION['main_pass'] = $password;
                header('Location:homepage.php');   

            }
            else
            {
                header('Location:auth.php');
            }
        }
?>