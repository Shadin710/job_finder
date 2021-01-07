


<?php
    session_start();
    if (empty($_SESSION['email'])) {
        header("Location:auth.php");
    }  
    include_once 'includes/db_connection.php';
    $email = $_SESSION['email'];
    $sql_user = "SELECT * FROM user_bio WHERE email = '$email'";
    $res = mysqli_query($conn,$sql_user) Or die("Failed to query " .  mysqli_connect_error());
    $row_id  = mysqli_fetch_assoc($res);

    $owner_id = $row_id['id'];


    $sql_not = "SELECT * FROM notify_owner WHERE owner_id = '$owner_id'";
    $result = mysqli_query($conn,$sql_not) Or die("Failed to query " .  mysqli_connect_error());
    $row_check = mysqli_num_rows($result);
    $check =0;
    $flag=0;
    
    if ($row_check>0) 
    {
        $check=1;
        //$sql_bio = "SELECT * FROM user_bio WHERE id = '$user_id'";
        //$user_info = mysqli_query($conn,$sql_bio) Or die("Failed to query " . mysqli_connect_error());
        //row_info is for user_bio
      //  $check = mysqli_num_rows($user_info);
       // $req = mysqli_fetch_assoc($user_info);
        

    }
    else
    {   
        $flag=0;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pulse Analytics | Home</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
    	body{
    background:#f2f3f7;
    margin-top:20px;
    }
.m-b-30 {
    margin-bottom: 30px;
}
p{
color: #8A98AC;    
}
.table-borderless td {
    border: 0 !important;
}
.table td {
    color: #8A98AC;
    vertical-align: middle;
    border-top: 1px solid rgba(0, 0, 0, 0.03);
    padding: 0.6rem;
}
.btn-primary-rgba {
    background-color: rgba(80, 111, 228, 0.1);
    border: none;
    color: #506fe4;
}
.btn-success-rgba {
    background-color: rgba(67, 209, 135, 0.1);
    border: none;
    color: #43d187;
}
.card {
    border: none;
    border-radius: 3px;
    background-color: #ffffff;
}
    </style>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" integrity="sha256-xHkYry2yRjy99N8axsS5UL/xLHghksrFOGKm9HvFZIs=" crossorigin="anonymous"></script>

   <!-- LOGO AND MENU -->

   <header id="header">
    <div class="wrapper">

        <button id="submenu" onclick="showMenu(event)">
            <span></span>
            <span></span>
            <span></span>
        </button>


    <!-- MENU LINKS  -->

        <ul class="menu-left">
            <li>
                <a href="homepage.php">Homepage</a>
            </li>
            <li>
                <a href="feed.php">Post a job</a>
            </li>
            <li>
                <a href="search.php">Search</a>
            </li>
            <li>
                <a href="Notification.php">Notifications</a>
            </li>
            <li>
                <a href="profile.php">Profile</a>
            </li>
            <li>
                <a href="request.php">Requested Job</a>
            </li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        </ul>

    </div>
</header>

<br><br><br><br><br>

<div class="container">
<div class="row">
    <!-- Start col -->
    <?php
        if($check>0)
        {
            while ($row_owner = mysqli_fetch_assoc($result)) {
               
                $job_id = $row_owner['job_id'];
                $sql_app = "SELECT * FROM applied_job WHERE job_id = '$job_id'";
                $result_user = mysqli_query($conn,$sql_app) Or die("Failed to query " . mysqli_connect_error());
                $check = mysqli_num_rows($result_user);
                $sql_cout = "SELECT * FROM request";
                $res_c= mysqli_query($conn,$sql_cout) Or die("Faile to query " . mysqli_connect_error());
        
                $len = mysqli_num_rows($res_c);
            
            
            while ($row_user = mysqli_fetch_assoc($result_user)) 
            {   
                

                //row_user is for applied jobs
        
                $user_id = $row_user['u_id'];
                $sql_req = "SELECT * FROM request WHERE u_id = '$user_id'";
                $res_req = mysqli_query($conn,$sql_req) Or die ("Failed to query the database " . mysqli_error($conn));
                $row_info=mysqli_fetch_assoc($res_req);
                if(!empty($row_info['username']))
                {

                echo '   <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-body py-5">
                        <div class="row">
                            <div class="col-lg-3 text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-fluid mb-3" alt="user" />
                            </div>
                            <div class="col-lg-9">
                                <a href=overview.php?id=' . $row_info['u_id'] .  '><h4>' . $row_info['username'] . '</h4></a>
                               
                                <div class="button-list mt-4 mb-3">
                                    <table >
                                        <tr>    
                                            <td><a href=accept.php?id=' . $row_info['u_id'] . '><button type="button" class="btn btn-primary-rgba"><i class="feather icon-message-square mr-2"></i>Accept</button></a></td>
                                            <td><form action="reject.php"><button type="button" class="btn btn-success-rgba"><i class="feather icon-phone mr-2"></i>Reject</button></form></td>
                                        </tr>
                                    </table>
                                    
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="p-1">Category :</th>
                                                <td class="p-1">' . $row_info['occupation'] . '</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="p-1">Skills:</th>
                                                <td class="p-1">' . $row_info['skill0'] . ', ' . $row_info['skill1'] . ', ' . $row_info['skill2'] . ', ' . $row_info['skill3'] . ', ' . $row_info['skill4'] . '</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="p-1">Country :</th>
                                                <td class="p-1">' . $row_info['country'] . '</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="p-1">Email ID :</th>
                                                <td class="p-1">' . $row_info['email'] . '</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
                }
            }
        }
        }
        elseif ($flag==0) 
        {
            echo "No one has applied for your job <br>";
        }
    ?>

    <!-- End col -->
    <!-- Start col -->
    
    <!-- End col -->
</div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>