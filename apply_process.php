<?php

    session_start();
    include_once 'includes/db_connection.php';
    
    $email = $_SESSION['email'];
    $id = $_SESSION['job_id'];
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $sql_apply = "SELECT * FROM user_bio WHERE email  ='$email'";
        $result = mysqli_query($conn,$sql_apply) Or die("Failed to query " . mysqli_error($conn));
        $row_user = mysqli_fetch_assoc($result);
        $user_id = $row_user['id'];

        $sql_aj = "SELECT * FROM post_job WHERE id = '$id'";
        $result_job = mysqli_query($conn,$sql_aj) Or die("Failed to query " . mysqli_query($conn));
        $row_job = mysqli_fetch_assoc($result_job);

        //applied job is the table which is reserved for the person who posted the job
        $notify = "INSERT INTO applied_job (job_id,u_id) VALUES ('$id','$user_id')";

        if(!mysqli_query($conn,$notify))
        {
            die("Failed to insert the data");
        }
        else
        {
            
            header("Location:Notification.php");
        }
    }
?>