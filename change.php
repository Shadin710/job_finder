<?php
    session_start();
    if(empty($_SESSION['email']))
    {
        header('Location:auth.php');
    }

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        include_once 'includes/db_connection.php';
        include_once 'includes/variable.php';
        $skill0 =  $skill1 =  $skill2 =  $skill3 =  $skill4 = $addres = $new_email = $uname = $full_name = $company_name = $cur_pass = '';
        $new_pass = $re_pass = $gender = $dob = $country = $fb_url = $web_url= $high_name = $uni_name = $occupation='';
        $cname1  =  $postion1 =$cname2 = $postion2  = '';

        $count=0;
        $skill0 = $_POST['skill0'];
        $skill1 = $_POST['skill1'];
        $skill2 = $_POST['skill2'];
        $skill3 = $_POST['skill3'];
        $skill4 = $_POST['skill4'];

        $addres = $_POST['addres'];

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
            if(!preg_match($name_regex,$uname) and $uname!='')
            {
                $name_err = "First letter must be capital letter and must have numbers";
            }
            elseif(!preg_match($email_regex,$new_email) and $new_email!='')
            {
                $email_err = "Not a proper email";
            }
            elseif(!preg_match($pass_regex,$new_pass) and $new_pass !='')
            {
                $pass_err = 'Password must start with a capital letter' . '<br>' . ' and must have numbers in the end and must be minium 6 characters long';
            }

            if(strcmp($re_pass,$new_pass)<>0 and $new_pass !='')
            {
                $repass = "New password and retyped password doesn't match";
            }
            else
            {
                $sql_bio = 'SELECT * FROM user_bio';
                $result_bio = mysqli_query($conn,$sql_bio) or die("Failed to query" . mysqli_connect_error());
                $get_bio = mysqli_fetch_assoc($result_bio);
                if($uname == '')
                {
                    $uname = $get_bio['username'];
                }
                if($new_email == '')
                {
                    $new_email=$_SESSION['email'];
                }
                if($new_pass== '')
                {
                    $new_pass=$_SESSION['main_pass'];
                }
                if ($occupation=='') 
                {
                    $occupation = $get_bio['occupation']
                }
                if ($cname1=='') 
                {
                    $cname1 = $get_bio['work_place1']
                }
                if ($cname2=='') 
                {
                    $cname2 = $get_bio['work_place2'];
                }
                if ($postion1=='') 
                {
                    $postion1= $get_bio['position_1'];
                }
                if ($postion2=='') 
                {
                   $postion2= $get_bio['position_2'];
                }
                if ($uni_name=='') 
                {
                    $uni_name = $get_bio ['uni_name'];
                }
                if ($high_name=='') 
                {
                    $high_name = $get_bio['high_name'];
                }
                if ($skill0=='') 
                {
                    $skill0= $get_bio['skill0'];
                }
                if ($skill1=='') 
                {
                    $skill1 = $get_bio['skill1'];
                }
                if ($skill2=='') 
                {
                    $skill2 = $get_bio['skill2'];
                }
                if ($skill3=='') 
                {
                    $skill3 = $get_bio['skill3'];
                }
                if ($skill4) 
                {
                    $skill4 = $get_bio['skill4'];
                }
                if ($phone_number=='') 
                {
                    $phone_number = $get_bio['phone_number'];
                }
                if ($fb_url=='') 
                {
                    $fb_url = $get_bio['fb_url'];
                }
                if ($web_url=='') 
                {
                    $web_url = $get_bio['web_url'];
                }
                if ($addres=='') 
                {
                    $addres = $get_bio['addres'];
                }
                if ($country=='') 
                {
                    $country = $get_bio['country'];
                }
                if ($gender=='') 
                {
                    $gender = $get_bio['gender'];
                }
                if ($dob=='') 
                {
                    $dob = $get_bio['dob'];
                }

                //new email will produce an error

                if($new_email!= $_SESSION['email'])
                {
                    $sql_e ="SELECT * FROM user_info WHERE email = '$new_email'";
                    $result = mysqli_query($conn,$sql_e) or die("Failed to query the database" . mysqli_connect_error());
                    $count = mysqli_num_rows($result);
                }

                if($count>0)
                {
                    $email_match ="Email already exists!!";
                    echo $email_match . "<br>";
                }
                else
                {
                    $sql_update = "UPDATE user_bio SET username = '$uname', email = '$new_email',occupation= '$occupation', work_place1 = '$cname1',work_place2='$cname2',position_1='$postion1',position_2='$postion2',uni_name='$uni_name',high_name='$high_name',skill0='$skill0',skill1='$skill1',skill2='$skill2',skill3='$skill3',skill4='$skill4',phone_number='$phone_number',fb_url='$fb_url',web_url='$web_url',addres='$addres',country='$country',dob='$dob',gender='$gender' where email = '$email'";
                    if(!mysqli_query($conn,$sql_update))
                    {
                        die("Failed to update your profile" . mysqli_connect_error());
                    }
                    else
                    {
                        header("Location:profile.php");
                    }
                }
            
            }
        }
    }
    
?>