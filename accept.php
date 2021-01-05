<?php
    session_start();
    if (empty($_SESSION['email'])) 
    {
        header("Location:auth.php");
    }
    include_once 'includes/db_connection.php';


    $email = $_SESSION['email'];
    $sql_owner = "SELECT * FROM user_bio WHERE email = '$email'";
    $result_owner = mysqli_query($conn,$sql_owner) Or die("Failed to query " . mysqli_connect_error());
    $owner = mysqli_fetch_assoc($result_owner);
    //this id is job id
    $id = $_GET['id'];
    $sql = "SELECT * FROM applied_job WHERE u_id ='$id'";
    $result = mysqli_query($conn,$sql) Or die("Failed to query the data " . mysqli_connect_error());
    $row_check = mysqli_num_rows($result);

    if($row_check>0)
    {
        
       while ($row_job  = mysqli_fetch_assoc($result))
        {
            $owner_id = $owner['id'];
            $job_id = $row_job['job_id'];
            $sql_match = "SELECT * FROM notify_owner WHERE job_id='$job_id' and owner_id = '$owner_id'";

            $res = mysqli_query($conn,$sql_match) Or die("Failed to query " . mysqli_connect_error());
            $res_job = mysqli_fetch_assoc($res);

            $u_id = $id;
            $job = $res_job['job_id'];
            $sql_user = "INSERT INTO approve (job_id,u_id,owner_id) VALUES ('$job','$u_id','$owner_id')";
            
            (int) $_SERVER['job_id']=$job;
            (int) $_SESSION['u_id'] =$u_id; 
            
            if (!mysqli_query($conn,$sql_user)) 
            {
                die("Failed to insert the data " . mysqli_error($conn));
            }
            else
            {
                
                header("Location:delete.php");
            }
        }
    }
   
?>