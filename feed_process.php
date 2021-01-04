<?php
    session_start();
    include_once 'includes/db_connection.php';

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $comName = $_POST['cname'];
        $position = $_POST['position'];
        $comAddress = $_POST['caddress'];
        $res = $_POST['res'];
        $skill0 = $_POST['skill0'];
        $skill1 = $_POST['skill1'];
        $skill2 = $_POST['skill2'];
        $skill3 = $_POST['skill3'];
        $skill4 = $_POST['skill4'];
        $salary = $_POST['salary'];
        $exper = $_POST['exper'];
        $type_time = $_POST['type_time'];
        $summary = $_POST['feed_post'];
        $qua = $_POST['qua'];
        $owner_id = $_SESSION['owner_id'];

        //if($job_count>0)
        //{
          //  echo "The job already exists!!";
            //header("Location: feed.php");
        //}
       // else
        //{
            $sql = "INSERT INTO post_job (comName,position,comAddress,responsibility,skill,skill1,skill2,skill3,skill4, salary,exper,type_time) VALUES ('$comName','$position','$comAddress','$res','$skill0','$skill1','$skill2','$skill3','$skill4','$salary','$exper','$type_time')";

            if(!mysqli_query($conn,$sql))
            {
                echo("Error description: " . mysqli_error($conn));
            }
            else
            {
                

                $sql_search_id = "SELECT * FROM post_job WHERE comName = '$comName' and position = '$position' and comAddress='$comAddress'";
                $result_id = mysqli_query($conn,$sql_search_id) Or die("Failed to query " . mysqli_connect_error());
                $result = mysqli_fetch_assoc($result_id);
                $job_id = $result['id'];

                $info_owner = "INSERT INTO notify_owner (job_id,owner_id,summary) VALUES ('$job_id','$owner_id','$summary')";
                if (!mysqli_query($conn,$info_owner)) 
                {
                    die("Failed to insert into notify owner " . mysqli_error($conn));
                }
                else
                {
                    header('Location:homepage.php');
                }
            }
        //}
    }

    mysqli_close($conn);
?>