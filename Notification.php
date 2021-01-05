<?php
    session_start();
    if(empty($_SESSION['email']))
    {
        header("Location:auth.php");
    }
    include_once 'includes/db_connection.php';
    $email= $_SESSION['email'];

    //finding the user id 
    $find_user = "SELECT * FROM user_bio WHERE email = '$email'";

    $find_result = mysqli_query($conn,$find_user) Or die("Failed to query " . mysqli_error($conn));
    $row_user = mysqli_fetch_assoc($find_result);

    $u_id = $row_user['id'];

    //seaches for applied job
    $sql_apply_search = "SELECT * FROM applied_job WHERE u_id = '$u_id'";
    $result_ap = mysqli_query($conn,$sql_apply_search) Or die("Failed to query " . mysqli_error($conn));
    $row_check = mysqli_num_rows($result_ap);

    $sql_approve = "SELECT * FROM approve WHERE u_id = '$u_id'";
    $result_dis = mysqli_query($conn,$sql_approve) Or die("Failed to query " .  mysqli_query($conn));
    $row_check2 = mysqli_num_rows($result_dis);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pulse Analytics | Home</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <style type="text/css">
    	body{
    margin-top:20px;
    background:#fbfdff;
}

[class*="noty_theme__unify--v1"] {
  box-shadow: 0 2px 15px 0 rgba(0, 0, 0, 0.15);
  border-radius: 4px;
  padding: 1.57143rem;
}

.noty_theme__unify--v1--dark {
  background-color: #2e3c56;
}

.noty_theme__unify--v1--light {
  background-color: #fff;
  box-shadow: 0 2px 15px 0 rgba(0, 0, 0, 0.05);
}

.noty_type__success.noty_theme__unify--v1 {
  background-color: #1cc9e4;
}

.noty_type__info.noty_theme__unify--v1 {
  background-color: #1d75e5;
}

.noty_type__error.noty_theme__unify--v1 {
  background-color: #e62154;
}

.noty_type__warning.noty_theme__unify--v1 {
  background-color: #e6a821;
}

.noty_body {
  font-weight: 400;
  font-size: 1rem;
  color: #fff;
}

[class*="noty_theme__unify--v1"] .noty_body {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
}

.noty_theme__unify--v1--light .noty_body {
  color: #41464B;
}

.noty_body__icon {
  position: relative;
  display: inline-block;
  color: #fff;
  text-align: center;
  border-radius: 50%;
}

.noty_body__icon::before {
  display: block;
}

.noty_body__icon > i {
  position: relative;
  top: 50%;
  display: block;
  -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
          transform: translateY(-50%);
  z-index: 2;
}

.noty_theme__unify--v1 .noty_body__icon {
  background-color: rgba(245, 249, 249, 0.2);
}

.noty_theme__unify--v1--dark .noty_body__icon {
  background-color: rgba(245, 249, 249, 0.1);
}

.noty_theme__unify--v1--dark.noty_type__success .noty_body__icon {
  color: #1cc9e4;
}

.noty_theme__unify--v1--dark.noty_type__info .noty_body__icon {
  color: #1d75e5;
}

.noty_theme__unify--v1--dark.noty_type__error .noty_body__icon {
  color: #e62154;
}

.noty_theme__unify--v1--dark.noty_type__warning .noty_body__icon {
  color: #e6a821;
}

.noty_theme__unify--v1--light.noty_type__success .noty_body__icon {
  background-color: rgba(28, 201, 228, 0.15);
  color: #1cc9e4;
}

.noty_theme__unify--v1--light.noty_type__info .noty_body__icon {
  background-color: rgba(29, 117, 229, 0.15);
  color: #1d75e5;
}

.noty_theme__unify--v1--light.noty_type__error .noty_body__icon {
  background-color: rgba(230, 33, 84, 0.15);
  color: #e62154;
}

.noty_theme__unify--v1--light.noty_type__warning .noty_body__icon {
  background-color: rgba(230, 168, 33, 0.15);
  color: #e6a821;
}

[class*="noty_theme__unify--v1"] .noty_close_button {
  top: 14px;
  right: 14px;
  width: 0.85714rem;
  height: 0.85714rem;
  line-height: 0.85714rem;
  background-color: transparent;
  font-weight: 300;
  font-size: 1.71429rem;
  color: #fff;
  border-radius: 0;
}

.noty_theme__unify--v1--light .noty_close_button {
  color: #cad6d6;
}

.noty_progressbar {
  height: 0.5rem !important;
}

.noty_theme__unify--v1 .noty_progressbar {
  background-color: rgba(0, 0, 0, 0.08) !important;
}

.noty_theme__unify--v1--dark.noty_type__success .noty_progressbar {
  background-color: #1cc9e4;
}

.noty_theme__unify--v1--dark.noty_type__info .noty_progressbar {
  background-color: #1d75e5;
}

.noty_theme__unify--v1--dark.noty_type__error .noty_progressbar {
  background-color: #e62154;
}

.noty_theme__unify--v1--dark.noty_type__warning .noty_progressbar {
  background-color: #e6a821;
}

.noty_theme__unify--v1--light.noty_type__success .noty_progressbar {
  background-color: rgba(28, 201, 228, 0.15);
}

.noty_theme__unify--v1--light.noty_type__info .noty_progressbar {
  background-color: rgba(29, 117, 229, 0.15);
}

.noty_theme__unify--v1--light.noty_type__error .noty_progressbar {
  background-color: rgba(230, 33, 84, 0.15);
}

.noty_theme__unify--v1--light.noty_type__warning .noty_progressbar {
  background-color: rgba(230, 168, 33, 0.15);
}

  .g-mb-25 {
    margin-bottom: 1.78571rem !important;
  }
</style>
</head>
<body>
    
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


<!-- LOGO AND MENU END -->



<!-- INTRO PAGE -->

<br><br><br><br><br>
<div class="container">
   <div class="row">
      <div class="col-md-6">
         <!-- Success -->
         <div class="g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-20--md g-mb-30">
            <h3 class="d-flex align-self-center text-uppercase g-font-size-12 g-font-size-default--md g-color-black g-mb-20">Applied</h3>
            <?php
                if($row_check>0)
                {
                  while($row_job = mysqli_fetch_assoc($result_ap))
                  {    
                     $job_id = $row_job['job_id'];
                       //shows applied jobs
                     $show_jobs = "SELECT * FROM post_job WHERE id ='$job_id'";
              
                     $result_show = mysqli_query($conn,$show_jobs) Or die("Failed to the query " .  mysqli_error($conn));
                     $show_j = mysqli_fetch_assoc($result_show);
                     echo '<div class="noty_bar noty_type__success noty_theme__unify--v1--light g-mb-25">
                     <div class="noty_body">
                        <div class="g-mr-20">
                           <div class="noty_body__icon">
                              <i class="hs-admin-check"></i>
                           </div>
                        </div>
                        <div>Hi,' . $row_user['username'] . '  you have applied for the job ' . $show_j['comName'] . '</div>
                     </div>
                     </div>';
                  }
                }
            ?>

         </div>
         <!-- End Success -->
      </div>
      <div class="col-md-6">
         <!-- Info -->
         <div class="g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-20--md g-mb-30">
            <h3 class="d-flex align-self-center text-uppercase g-font-size-12 g-font-size-default--md g-color-black g-mb-20">Approved</h3>
            
            <?php
              if ($row_check2>0) 
              {
                while ($row_job2 = mysqli_fetch_assoc($result_dis)) 
                {
                    $job_id2 = $row_job2['job_id']; 

                    $show_jobs2 = "SELECT * FROM post_job WHERE id ='$job_id'";
                    $result_show2 = mysqli_query($conn,$show_jobs2) Or die("Failed to the query " .  mysqli_error($conn));

                    $show_j2 = mysqli_fetch_assoc($result_show2);
                    echo '<div class="noty_bar noty_type__info noty_theme__unify--v1--light g-mb-25">
                    <div class="noty_body">
                       <div class="g-mr-20">
                          <div class="noty_body__icon">
                             <i class="hs-admin-info"></i>
                          </div>
                       </div>
                       <div>Hi,' . $row_user['username'] . ' You have been accepted for ' . $show_j2['comName'] . '</div>
                    </div>
                 </div>';
                }
              }
            ?>

         </div>
         <!-- End Info -->
      </div>
   </div>

</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>