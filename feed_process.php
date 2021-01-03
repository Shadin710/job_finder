<?php
    
    include_once 'includes/db_connection.php';

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $comName = $_POST['cname'];
        $position = $_POST['position'];
        $comAddress = $_POST['caddress'];
        $res = $_POST['res'];
        $skill = $_POST['skill'];
        $skill0 = $_POST['skill0'];
        $skill1 = $_POST['skill1'];
        $skill2 = $_POST['skill2'];
        $skill3 = $_POST['skill3'];
        $skill4 = $_POST['skill4'];
        $salary = $_POST['salary'];
        $exper = $_POST['exper'];
        $type_time = $_POST['type_time'];

        $qua = $_POST['qua'];

        $sql_dup = "SELECT * FROM post_job WHERE $comName='comName' and $position = 'position' and $comAddress = 'comAddress'";
        $result = mysqli_query($conn,$sql_dup) or die("Failed to query the database" . mysqli_connect_error());

        $job_count = mysqli_num_rows($result);

        if($job_count>0)
        {
            echo "The job already exists!!";
            //header("Location: feed.php");
        }
        else
        {
            $sql = "INSERT INTO post_job (comName,position,comAddress,responsibility,skill,skill1,skill2,skill3,skill4, salary,exper,type_time) VALUES ('$comName','$position','$comAddress','$res','$skill','$skill0','$skill1','$skill2','$skill3','$skill4','$salary','$exper','$type_time')";

            if(!mysqli_query($conn,$sql))
            {
                echo("Error description: " . mysqli_error($conn));
            }
            else
            {
                header('Location:jobs.php');
            }
        }
    }

    mysqli_close($conn);
?>