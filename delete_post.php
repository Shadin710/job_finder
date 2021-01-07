<?php
    session_start();
    include_once 'includes/db_connection.php';
    
    $id = $_SESSION['job_id'];
    $sql_d = "DELETE FROM post_job WHERE id = '$id'";
    if (!mysqli_query($conn,$sql_d)) 
    {
        die("Failed to delete from post_job " . mysqli_error($conn));
    }
    else
    {
        $sql_d2 = "DELETE FROM notify_owner WHERE job_id ='$id'";
        if (!mysqli_query($conn,$sql_d2)) 
        {
            die("Failed to delete from notify user " . mysqli_error($conn));
        }
        else
        {
            $sql_d3 = "DELETE FROM report_job WHERE job_id = '$id'";
            if (!mysqli_query($conn,$sql_d3)) 
            {
                die("Failed to delete from report database " . mysqli_error($conn));
            }
            else
            {
                header("Location:admin_dashboard.php");
            }
        }
    }
?>