<?php
    session_start();

    if(empty($_SESSION['email']))
    {
        header('Location:auth.php');
    }
    include_once 'includes/variable.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pulse Analytics | Home</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/setting.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
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
                <a href="feed.php">Post a Job</a>
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
        <ul class="menu-right">
            <li class="menu-cta">
                <a href="logout.php">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</header>
<form action="change.php" method = "POST">
<div class="container light-style flex-grow-1 container-p-y" id="mar">
    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Education & Occupation</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Skills</a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">

              <div class="card-body media align-items-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="d-block ui-w-80">
                <div class="media-body ml-4">
                  </label> &nbsp;
            
                </div>
              </div>
              <hr class="border-light m-0">

              <div class="card-body">
                <div class="form-group">
                  <label class="form-label">Username</label>
                  <input type="text" class="form-control mb-1" value="" name="uname">
                  <span class = "error"><?php echo $name_err;?></span>
                </div>
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" value="" name="full_name">

                </div>
                <div class="form-group">
                  <label class="form-label">E-mail</label>
                  <input type="text" class="form-control mb-1" value="" name="email">
                  <span class = "error"><?php echo  $email_err;?></span>
                </div>
                <div class="form-group">
                  <label class="form-label">Company</label>
                  <input type="text" class="form-control" value="" name="company_name">
                </div>
                <div class="form-group">
                  <label class="form-label">Current password</label>
                  <input type="password" class="form-control" name = "pass">
                  <span class = "error"><?php echo $pass_matchErr;?></span>
                </div>
              </div>

            </div>
            <div class="tab-pane fade" id="account-change-password">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">Current password</label>
                  <input type="password" class="form-control" name = "pass">
                  <span class = "error"><?php echo $pass_matchErr;?></span>
                </div>

                <div class="form-group">
                  <label class="form-label">New password</label>
                  <input type="password" class="form-control" name ="new_pass">
                  <span class = "error"><?php echo  $pass_err;?></span>
                </div>

                <div class="form-group">
                  <label class="form-label">Repeat new password</label>
                  <input type="password" class="form-control" name = "re_pass">
                  <span class = "error"><?php echo $repass;?></span>
                </div>

              </div>
            </div>
            <div class="tab-pane fade" id="account-info">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">Address</label>
                  <input type="text" class="form-control" value="" name="addres">
                </div>
                <div class="form-group">
                  <label class="form-label">Gender</label>
                  <select class="custom-select" name = "gender">
                    <option  value = "Male" >Male</option>
                    <option  value = "Female">Female</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label">Birthday</label>
                  <input type="text" class="form-control" value="" name="dob">
                </div>
                <div class="form-group">
                  <label class="form-label">Country</label>
                  <select class="custom-select" name = "country">
                    <option  value = "Bangladesh" >Bangladesh</option>
                    <option  value = "Canada">Canada</option>
                    <option  value = "UK">UK</option>
                    <option  value = "Germany">Germany</option>
                    <option  value = "USA">USA</option>
                    <option  value = "India">India</option>
                    <option  value = "Pakistan">Pakistan</option>
                    <option  value = "Japan">Japan</option>
                    <option  value = "China">China</option>
                    <option  value = "Italy">Italy</option>
                    <option  value = "USA">USA</option>
                  </select>
                </div>


              </div>
              <hr class="border-light m-0">
              <div class="card-body pb-2">

                <h6 class="mb-4">Contacts</h6>
                <div class="form-group">
                  <label class="form-label">Phone</label>
                  <input type="text" class="form-control" value="" name="phone_number">
                </div>
                <div class="form-group">
                  <label class="form-label">Website</label>
                  <input type="text" class="form-control" value="" name= "web_url">
                </div>
                <div class="form-group">
                  <label class="form-label">Facebook</label>
                  <input type="text" class="form-control" value="" name= "fb_url">
                </div>
                <div class="form-group">
                  <label class="form-label">Current password</label>
                  <input type="password" class="form-control" name = "pass">
                  <span class = "error"><?php echo $pass_matchErr;?></span>
                </div>
              </div>
            </div>
 
            <div class="tab-pane fade" id="account-social-links">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">High School</label>
                  <input type="text" class="form-control" value="" name="high_name">
                </div>
                <div class="form-group">
                  <label class="form-label">University</label>
                  <input type="text" class="form-control" value="" name = "uni_name">
                </div>
                <div class="form-group">
                  <label class="form-label">Occupation</label>
                  <input type="text" class="form-control" value="" name = "occupation">
                </div>
                <div class="form-group">
                  <label class="form-label">Company</label>
                  <input type="text" class="form-control" value="" name="c_name1">
                </div>
                <div class="form-group">
                  <label class="form-label">Position</label>
                  <input type="text" class="form-control" value="" name = "position1">
                </div>
                <div class="form-group">
                  <label class="form-label">Previously worked</label>
                  <input type="text" class="form-control" value="" name="c_name2">
                </div>
                <div class="form-group">
                  <label class="form-label">Position</label>
                  <input type="text" class="form-control" value="" name = "position2">
                </div>
                <div class="form-group">
                  <label class="form-label">Current password</label>
                  <input type="password" class="form-control" name = "pass">
                  <span class = "error"><?php echo $pass_matchErr;?></span>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="account-connections">
              <div class="card-body">
              <label class="form-label">Skills</label>
                  <input type="text" class="form-control" value="" name = "skill0">
              </div>
             
              <div class="card-body">
              <label class="form-label">Skills</label>
                  <input type="text" class="form-control" value="" name = "skill1">
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
              <label class="form-label">Skills</label>
                  <input type="text" class="form-control" value="" name = "skill2">
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
              <label class="form-label">Skills</label>
                  <input type="text" class="form-control" value="" name = "skill3">
            </div>
            <hr class="border-light m-0">
              <div class="card-body">
              <label class="form-label">Skills</label>
                  <input type="text" class="form-control" value="" name = "skill4">
            </div>
            <hr class="border-light m-0">
              <div class="card-body">
              <label class="form-label">Current password</label>
                  <input type="password" class="form-control" value="" name = "pass">
            </div>

          </div>
        </div>

      </div>
    </div>

    <div class="text-right mt-3">
      <button type="Submit" class="btn btn-primary">Save changes</button>&nbsp;
      <a href="profile.php"><button type="button" class="btn btn-default">  Cancel</button></a>
    </div>
 
  </div>
  </form>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>