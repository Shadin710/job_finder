<?php
    

    include_once 'includes/db_connection.php';


    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $occupation = $work_place1 = $work_place2 = $position_1 = $position_2 = $uni_name = $high_name = $skill0 = $skill1 = $skill2 = $skill3 = $skill4 = $phone_number = $fb_url = $web_url = $addres = $country = $dob = $gender = ''; 
    $name_regex = '/^([A-Z]([a-z]){3,7}[0-9]{1,4})$/';
    $email_regex = '/^\w+([-+.\']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/';
    $pass_regex = '/^([A-z]+([0-9]+)?([@#$&%]+)?){6,20}$/';
    
    $sql_e ="SELECT * FROM user_info WHERE pass = '$pass' and email = '$email'";
    $result = mysqli_query($conn,$sql_e) or die("Failed to query the database" . mysqli_connect_error());

    $count = mysqli_num_rows($result);

    if($count>0)
    {
        echo "email already exists!!";
        
    }
    else
    {

        if(strcmp($pass,$pass2)<>0)
        {
            die("Password doesn't match");
        }
        if(preg_match($name_regex,$name) and preg_match($email_regex,$email) and preg_match($pass_regex,$pass))
        {
            //insert every thing in database

            $sql = "INSERT INTO user_info (username,email,pass) VALUES ('$name','$email','$pass')";
            
            if(!mysqli_query($conn,$sql))
            {
                echo("Error description: " . mysqli_error($conn));
            }
            else
            {
                $sql_1= "INSERT INTO user_bio (username,email,occupation,work_place1,work_place2,position_1,position_2,uni_name,high_name,skill0,skill1,skill2,skill3,skill4,phone_number,fb_url,web_url,addres,country,dob,gender) VALUES ('$name','$email','$occupation','$work_place1','$work_place2','$position_1','$position_2','$uni_name','$high_name','$skill0','$skill1','$skill2','$skill3','$skill4','$phone_number','$fb_url','$web_url','$addres','$country','$dob','$gender')";

                if(!mysqli_query($conn,$sql_1))
                {
                    echo("Error description: " . mysqli_error($conn));
                }
                else
                {
                    header('Location:auth.php');
                }
                echo "Inserted the data in user info but not user bio";
            }
        }
    
        else
        {
            echo "error in regex";
        }
    }
    mysqli_close($conn);
   

?>