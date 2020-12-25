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
input[type=text] {
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
                <a href="find_job.php">Find a job</a>
            </li>
            <li>
                <a href="feed.php">News Feed</a>
            </li>
            <li>
                <a href="company_review.php">Company reviews</a>
            </li>
            <li>
                <a href="find_salaries.php">Find Salaries</a>
            </li>
        </ul>
        <ul class="menu-right">
            <li class="menu-cta">
                <a href="auth.php">
                    Get Started
                </a>
            </li>
        </ul>
    </div>
</header>

<section id="intro">
    <div class="top-right-gradient"></div>
    <div class="wrapper">
    <form action="feed_process.php" method ='POST' id="form">
      <input type="text" id="fname" name="cname" placeholder="Company Name">
      <input type="text" id="fname" name="position" placeholder="Position">

      <input type="text" id="fname" name="caddress" placeholder="Address">
          <input type="text" id="fname" name="res" placeholder="Responsibilities">
      <div class = "skill">
          <label for="skill"></label>
         <input type="text" id="skill" name="skill" placeholder="Desired Skill">
         <small class="small">Add</small>
      </div>
      <input type="text" id="fname" name="qua" placeholder="Qualification">
      <textarea name="feed_post" placeholder="Summary"></textarea>
     <center><input type="submit" id="fd" value="POST"></center>
    </form>
    </div>
    <div class="bottom-left-gradient"></div>
</section>
<script src="./js/dynamic_input.js">
</script>

</body>
</html>