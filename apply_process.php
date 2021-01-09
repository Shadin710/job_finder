<?php

    session_start();
    include_once 'includes/db_connection.php';
    
    $email = $_SESSION['email'];
    $id = $_SESSION['job_id'];

        $sql_apply = "SELECT * FROM user_bio WHERE email  ='$email'";
        $result = mysqli_query($conn,$sql_apply) Or die("Failed to query " . mysqli_error($conn));
        $row_user = mysqli_fetch_assoc($result);
        $user_id = $row_user['id'];
        $req_name = $row_user['username'];
        $req_skill0 =$row_user['skill0'];
        $req_skill1 =$row_user['skill1'];
        $req_skill2 =$row_user['skill2'];
        $req_skill3 =$row_user['skill3'];
        $req_skill4 =$row_user['skill4'];
        $req_occupation =$row_user['occupation'];
        $req_country = $row_user['country'];
        $req_email=$row_user['email'];

        $sql_request = "INSERT INTO request (u_id,username,occupation,skill0,skill1,skill2,skill3,skill4,country,email) VALUES('$user_id','$req_name','$req_occupation','$req_skill0','$req_skill1','$req_skill2','$req_skill3','$req_skill4','$req_country','$req_email')";

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
            if (!mysqli_query($conn,$sql_request)) 
            {
                die("Failed to insert the data " . mysqli_error($conn));
            }
            else
            {
                header("Location:Notification.php");
            }
            
        }
    
?>