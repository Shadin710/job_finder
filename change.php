<?php
    session_start();
    if(empty($_SESSION['email']))
    {
        header('Location:auth.php');
    }
    include_once 'includes/db_connection.php';
    include_once 'includes/variable.php';
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $email = $_SESSION['email'];
        $uname  = $_POST['uname'];
        $full_name = $_POST['full_name'];
        $new_email = $_POST['email'];
        $company_name = $_POST['company_name'];
        $cur_pass= $_POST['pass'];
        $new_pass = $_POST['new_pass'];
        $re_pass = $_POST['re_pass'];

        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $country = $_POST['country'];
        
        $phone_number = $_POST['phone_number'];
        $web_url = $_POST['web_url'];
        $fb_url = $_POST['fb_url'];

        $high_name = $_POST['high_name'];
        $uni_name = $_POST['uni_name'];

        $occupation = $_POST['occupation'];
        $cname1 = $_POST['c_name1'];
        $postion1 = $_POST['position1'];
        $cname2 = $_POST['c_name2'];
        $postion2 = $_POST['position2'];

        $name_regex = '/^([A-Z]([a-z]){3,7}[0-9]{1,4})$/';
        $email_regex = '/^\w+([-+.\']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/';
        $pass_regex = '/^([A-z]+([0-9]+)?([@#$&%]+)?){6,20}$/';

        if(strcmp($cur_pass,$_SESSION['main_pass'])<>0)
        {
            $pass_matchErr = "Password doesn't match with the main password";
        }
        else
        {
            if(!preg_match($name_regex,$uname))
            {
                $name_err = "First letter must be capital letter and must have numbers";
            }
            elseif(!preg_match($email_regex,$new_email))
            {
                $email_err = "Not a proper email";
            }
            elseif(!preg_match($pass_regex,$new_pass))
            {
                $pass_err = 'Password must start with a capital letter' . '<br>' . ' and must have numbers in the end and must be minium 6 characters long';
            }

            if(strcmp($re_pass,$new_pass)<>0)
            {
                $repass = "New password and retyped password doesn't match";
            }
            else
            {
                $sql_e ="SELECT * FROM user_info WHERE email = '$new_email'";
                $result = mysqli_query($conn,$sql_e) or die("Failed to query the database" . mysqli_connect_error());

                $count = mysqli_num_rows($result);

                if($count>0)
                {
                    $email_match ="Email already exists!!";
                }
                else
                {
                    $sql = "UPDATE user_bio SET username = '$uname', email = '$new_email',occupation= '$occupation', work_place1 = '$cname1',work_place2='$cname2',position_1='$postion1',position_2='$postion2',uni_name='$uni_name',high_name='$high_name',skill0='',skill1='',skill2='',skill3='',skill4='',phone_number='$phone_number',fb_url='$fb_url',web_url='$web_url',addres='',country='$country',dob='$dob',gender='$gender' where email = '$email'";
                }
            }
        }
?>