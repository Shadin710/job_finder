<?php
    session_start();
    include_once 'includes/db_connection.php';
    $id = $_SESSION['job_id'];
    $sql_report_job = "INSERT INTO report_job (job_id) VALUES('$id')";

    if (!mysqli_query($conn,$sql_report_job)) 
    {
        die("Failed to report the job " .  mysqli_error($conn));
    }
    else
    {
        header("Location:homepage.php");
    }
?>