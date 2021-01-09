<?php
    session_start();

    if(empty($_SESSION['email']))
    {
        header('Location:auth.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pulse Analytics | Home</title>
    <link rel="stylesheet" href="CSS/feed.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style> 
    *{
        font-family: Arial, Helvetica, sans-serif;
    }
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid red;
  border-radius: 4px;
}
input[type=number] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid red;
  border-radius: 4px;
}
.sel{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid red;
    border-radius: 4px;
}
small{
    font-size: 20px;
    padding-left: 2px;
    font-weight: 900;
    cursor: pointer;
    color: green;
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

<section id="intro">
    
    <div class="wrapper">
    <form action="feed_process.php" method ='POST' id="form">
      <input type="text" id="fname" name="cname" placeholder="Company Name">
      <input type="text" id="fname" name="position" placeholder="Position">

      <input type="text" id="fname" name="caddress" placeholder="Address">
          <input type="text" id="fname" name="res" placeholder="Responsibilities">
      <div class = "skill">
          <label for="skill"></label>
         <input type="text" id="skill" name="skill0" placeholder="Desired Skill">
      </div>
      <div class = "skill">
          <label for="skill"></label>
         <input type="text" id="skill" name="skill1" placeholder="Desired Skill">
      </div>
      <div class = "skill">
          <label for="skill"></label>
         <input type="text" id="skill" name="skill2" placeholder="Desired Skill">
      </div>
      <div class = "skill">
          <label for="skill"></label>
         <input type="text" id="skill" name="skill3" placeholder="Desired Skill">
      </div>
      <div class = "skill">
          <label for="skill"></label>
         <input type="text" id="skill" name="skill4" placeholder="Desired Skill">
      </div>
      <input type="text" id="fname" name="qua" placeholder="Qualification">
      <input type="number" id="fname" name="salary" placeholder="Salary">
      <select name="exper" class="sel">
        <option value="Junior">Junior Level</option>
        <option value="Mid">Mid Level</option>
        <option value="Senior">High Level</option>
      </select>
      <select name="type_time" class="sel">

        <option value="Internship">Internship</option>
        <option value="Part-time">Part-time</option>
        <option value="Full-time"> Full-time</option>
      </select>
      <textarea name="feed_post" placeholder="Summary"></textarea>
     <center><input type="submit" id="fd" value="POST"></center>
    </form>
    </div>
    
</section>


</body>
</html>