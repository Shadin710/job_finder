<?php
    session_start();

    if(empty($_SESSION['email']))
    {
        header("Location: auth.php");
    }
    include_once 'includes/db_connection.php';
    $id = $_GET['id'];
    $_SESSION['job_id'] = $id;
    $sql_id = "SELECT * FROM post_job WHERE id = '$id'";
    $result = mysqli_query($conn,$sql_id) Or die("Failed to query " . mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);   
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pulse Analytics | Home</title>
    <link rel="stylesheet" href="CSS/index.css">
    <style>
    * {
  box-sizing: border-box;
  
}
body{
    
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
    
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 50px;
  margin-top:150px
}

.col-25 {
  float: left;
  width: 20%;
  margin-top: 30px;
}

.col-75 {
  float: left;
  width: 40%;
  margin-top: 30px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

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
        </ul>
    </div>
</header>
<div class='container'>
            
             <h1><b>Company Name: </b><?php echo $row['comName'];?></h1>
             <h3><b>Position offering: </b><?php echo $row['position'];?></h3>
             <h3><b>Address: </b><?php echo $row['comAddress'];?> </h3>
             <h3><b>LEVEL:   <?php echo $row['exper'];?></b></h3>
             <h3><b>Job Type: </b><?php echo $row['type_time'];?>
             </h3>
             <h3><strong>Salary: </strong><?php echo $row['salary'];?> </h3>
             <h3><strong>responsibility: </strong><?php echo $row['responsibility'];?> </h3>
             <h3><strong>Skills Required: </strong><br> <br>
             <ul>
                 <li># <?php echo $row['skill'];?></li>
                 <li># <?php echo $row['skill1'];?></li>
                 <li># <?php echo $row['skill2'];?></li>
                 <li># <?php echo $row['skill3'];?></li>
                 <li># <?php echo $row['skill4'];?></li>
                 <li># <?php echo $row['type_time'];?></li>
             </ul> 
             </h3>
             <div class="row">
                <div class="col-75"><a href="apply_process.php"><input type="submit" value="Apply" id="app"></a></div>
                <div class="col-25"> <a href="report_job.php"><input type="submit" value="Report" id="rep"></a></div>
                
                
            </div>
             
             
             
        </div>
        <br>
</body>
</html>
        