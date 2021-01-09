<?php
    session_start();

    if (empty($_SESSION['admin_name'])) 
    {
        header("Location:admin_login.php");
    }
    include_once 'includes/db_connection.php';

    $id = $_SESSION['job_id'];
    $sql_del = "DELETE FROM report_job WHERE job_id = '$id'";
    if (!mysqli_query($conn,$sql_del)) 
    {
        die("Failed to delete from report " . mysqli_error());
    }
    else
    {
        header("Location:admin_dashboard.php");
    }
?>