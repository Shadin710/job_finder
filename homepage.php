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
    <link rel="stylesheet" href="CSS/index.css">
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
            <li>
                <a href="profile.php">Profile</a>
            </li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</header>


<!-- LOGO AND MENU END -->



<!-- INTRO PAGE -->


<section id="intro">
    <div class="top-right-gradient"></div>
    <div class="wrapper">
        <div class="intro-left">
            <h1>Insights which will help you to grow</h1>
            <p>
                Open a account and start finding job that interests you
            </p>
            <a href="auth.php" class="intro-cta" >
              Sign-In              
        </a>
        </div>
        <div class="intro-right">
            <!-- Insert Image here -->
            <img src="images/undraw_growth_analytics_8btt.png" alt="image">
        </div>
    </div>
    <div class="bottom-left-gradient"></div>
</section>

<!-- Intro Page END -->


<!-- About Page Start -->

<section id="about">
    <div class="wrapper">
        <div class="about-left">
            <img src="images/undraw_report_mx0a.svg" alt="img">
        </div>

        <div class="about-right">
            <h1>How we help YOU grow your Business</h1>
            <p>
                Consume out-of-the-box data analytics anywhere, anytime. Take advantage of rich domain content , pre-built industry metrics, stunning visualizations, and data adaptors for cloud/business applications as well as big data sources.

            </p>
            <a href="#" class="cta">Learn More</a>
        </div>
    </div>

    <div class="top-right-gradient"></div>
</section>

<!-- About Page END -->

<!-- Page Banner START -->

<div class="page-banner">
    <h1>Analytics Made Easy</h1>
    <h3>Experience the next generation Analytics</h3>
    <a href="auth.php">Sign-Up</a>
</div>

<!-- Banner END -->


<!-- FOOTER START -->

<footer>

    <div class="wrapper">

        <div class="footer-left">

            <a href="/">
                <img src="images/logo2.png" alt="logo">
            </a>

            <p class="footer-links">

                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Pricing</a>
                <a href="#">Contact</a>

            </p>

            <p class="footer-company-name"> Pulse Analytics &copy; 2019 - Made By Design Medium</p>

        </div>

        <div class="footer-center">

            <div>

                <i class="fas fa-map-marker-alt"></i>
                <p><span> 965 Central Rd.</span>Lakewood, NJ 08701</p>

            </div>

            <div>

                <i class="fas fa-phone"></i>
                <p><span> +1 555 12342342</p>

            </div>

            <div>

                <i class="fas fa-envelope"></i>
                <p><a href="#">DesignMedium@company.com</a></p>

            </div>

        </div>

        <div class="footer-right">

            <p class="footer-connect">
                <span> Connect with us</span>
                Consume out of the box data Analytics anwhere, anytime. Contact us to get Started.
            </p>

            <div class="footer-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>

            </div>

        </div>
    </div>



</footer>

<script>

    function showMenu(event){

        event.preventDefault();

        let element = document.getElementById('header');

        if(element.classList.contains('active')){
            element.className = "";
        } else {
            element.className = "active";
        }


    }

</script>

</html>