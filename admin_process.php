<?php
    session_start();


    include_once 'includes/db_connection.php';
    if ($_SERVER['REQUEST_METHOD']=='POST') 
    {
        $name = $_POST['name'];
        $pass= $_POST['pass'];
        $sql_admin = "SELECT * FROM admin_bio";
        $res = mysqli_query($conn,$sql_admin) Or die("Failed to query " . mysqli_connect_error());
        $row = mysqli_num_rows($res);
        //echo $row;
        if ($row<=0) 
        {
            header("Location:insert_admin.php?name="  . $name . "&pass=" . $pass);
            
        }
        else
        {
            $sql_admin2 = "SELECT * FROM admin_bio WHERE  admin_name = '$name'";
            $res1 = mysqli_query($conn,$sql_admin2) Or die("Failed to query " . mysqli_connect_error());
            $row1 = mysqli_fetch_assoc($res1);
           // echo $row1['admin_pass'] . "<br>" . $pass;
            if ($row1['admin_pass']==$pass) 
            {
                $_SESSION['admin_name']=$name;
                header("Location: admin_dashboard.php");
                
            }
            else
            {
                 header("Location:admin_login.php");
            }
        }
       
    }
?>