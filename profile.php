<?php

    session_start();

    if(empty($_SESSION['email']))
    {
        header('Location:auth.php');
    }

    include_once 'includes/db_connection.php';
    $email = $_SESSION['email'];
    $sql_e = "SELECT * FROM user_bio WHERE email='$email'";

    $result1 = mysqli_query($conn,$sql_e) or die("Failed to query the database" . mysqli_connect_error());
    $row1 = mysqli_fetch_assoc($result1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pulse Analytics | Home</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/profile.css">
</head>
<body?>
    
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
<div class="container">
<div id="content" class="content p-0">
    <div class="profile-header">
        <div class="profile-header-cover"></div>

        <div class="profile-header-content">
            <div class="profile-header-img">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
            </div>

            <div class="profile-header-info">
                <h4 class="m-t-sm"><?php    
                                            if (!empty($row1['username']))
                                            {
                                                echo $row1['username'];
                                            }
                                            else
                                            {
                                                echo '';
                                            }
                                    ;?></h4>
                <p class="m-b-sm"><?php echo $row1['occupation'];?></p>
                <a href="setting.php" class="btn btn-xs btn-primary mb-3">Edit Profile</a>
            </div>
        </div>

    </div>

    <div class="profile-container">
        <div class="row row-space-20">
            <div class="col-md-8">
                <div class="tab-content p-0">
                    <div class="tab-pane active show" id="profile-about">
                        <table class="table table-profile">
                            <thead>
                                <tr>
                                    <th colspan="2">WORK AND EDUCATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="field">Work</td>
                                    <td class="value">
                                        <div class="m-b-5">
                                            <b><?php echo $row1['work_place1'];?></b> <br />
                                            <span class="text-muted"><?php echo $row1['position_1'];?></span>
                                        </div>
                                        <div>
                                            <b><?php echo $row1['work_place2'];?></b> <br />
                                            <span class="text-muted"><?php echo $row1['position_2'];?></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Education</td>
                                    <td class="value">
                                        <div class="m-b-5">
                                            <b><?php echo "University ";?></b> <br />
                                            <span class="text-muted"><?php echo $row1['uni_name'];?></span>
                                        </div>
                                        <div>
                                            <b>High School</b> <br />
                                            <span class="text-muted"><?php echo $row1['high_name'];?></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Skills</td>
                                    <td class="value">
                                        <?php
                                            for ($i=0; $i <5 ; $i++) { 
                                                if ($i==4) {
                                                    echo $row1['skill'.$i];
                                                }
                                                else
                                                {
                                                    echo $row1['skill'.$i] . ",";
                                                }
                                                

                                            }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-profile">
                            <thead>
                                <tr>
                                    <th colspan="2">CONTACT INFORMATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="field">Mobile Phones</td>
                                    <td class="value">
                                       <?php
                                            echo $row1['phone_number'];
                                       ?>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Email</td>
                                    <td class="value">
                                     <?php
                                            echo $row1['email'];
                                       ?>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Facebook</td>
                                    <td class="value">
                                    <?php
                                            if (!empty($row1['fb_url'])) 
                                            {
                                                echo $row1['fb_url'];    
                                            }
                                            else
                                            {
                                                echo "N/A";
                                            }
                                            
                                       ?>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Website</td>
                                    <td class="value">
                                    <?php
                                            echo $row1['web_url'];
                                       ?>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Address</td>
                                    <td class="value">
                                        <?php echo $row1['addres']?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-profile">
                            <thead>
                                <tr>
                                    <th colspan="2">BASIC INFORMATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="field">Birth of Date</td>
                                    <td class="value">
                                    <?php
                                            echo $row1['dob'];
                                    ?>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Gender</td>
                                    <td class="value">
                                    <?php
                                            echo $row1['gender'];
                                    ?>
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Facebook</td>
                                    <td class="value">
                                        <?php echo $row1['fb_url']?>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field">Website</td>
                                    <td class="value">
                                        <?php echo $row1['web_url']?>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4 hidden-xs hidden-sm">
                <ul class="profile-info-list">
                    <li class="title">PERSONAL INFORMATION</li>
                    <li>
                        <div class="field">Occupation:</div>
                        <div class="value"><?php
                                            echo $row1['occupation'];
                                       ?></div>
                    </li>
                    <li>
                        <div class="field">Skills:</div>
                        <div class="value"> <?php
                        for ($i=0; $i <5 ; $i++) 
                        { 
                            if($i==4)
                            {
                                echo $row1['skill'.$i];
                            }
                            else
                            {
                                echo $row1['skill'.$i] . ', ';
                            }
 
                        }
                        ?>
                        </div>
                    </li>
                    <li>
                        <div class="field">Birth of Date:</div>
                        <div class="value"><?php echo $row1['dob'];?></div>
                    </li>
                    <li>
                        <div class="field">Country:</div>
                        <div class="value"><?php echo $row1['country']?></div>
                    </li>
                    <li>
                        <div class="field">Address:</div>
                        <div class="value">
                            <address class="m-b-0">
                            <?php echo $row1['addres']?>
                            </address>
                        </div>
                    </li>
                    <li>
                        <div class="field">Phone No.:</div>
                        <div class="value">
                            <?php echo $row1['phone_number']?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>