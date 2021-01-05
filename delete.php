<?php
    session_start();
    if (empty($_SESSION['email'])) 
    {
          header("Location:auth.php");
    }

    include_once 'includes/db_connection.php';
    $email = $_SESSION['email'];
    $sql_email = "SELECT * FROM user_bio WHERE email = '$email'";
    $result = mysqli_query($conn,$sql_email) Or die("Failed to query " . mysqli_error($conn));
    $row_owner = mysqli_fetch_assoc($result); 

    $owner_id = $row_owner['id'];

    // we need to delete everything the owner has approved from request job
    $sql = "SELECT * FROM approve WHERE owner_id = '$owner_id'";
    $res = mysqli_query($conn,$sql) Or die("Failed to query " . mysqli_error($conn));

    $row_check = mysqli_num_rows($res);

    if($row_check>0)
    {
        while($row_del = mysqli_fetch_assoc($res))
        {

            $u_id  = $row_del['u_id'];

            $sql_req_del = "DELETE FROM request WHERE u_id = '$u_id'";
            if(!mysqli_query($conn,$sql_req_del))
            {
                die("Failed to delete the data " . mysqli_error($conn));
            }
            else
            {

                header("Location: request.php");
            }
        }
    }
    
?>