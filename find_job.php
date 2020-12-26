<?php
    session_start();

    if(empty($_SESSION['email']))
    {
        header('Location:auth.php');
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/find_job.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
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
        <div class="intro-left">
            <input type="text" id= "first" placeholder = "What type of job" name="job_type">
            <input type="text" id= "second" placeholder = "Where" name="region">
            <a href="auth.php" class="intro-cta" >
              Search             
        </a>
        </div>
        <div class="intro-right">
            <!-- Insert Image here -->
            <img src="images/job.png" alt="image">
        </div>
    </div>
    <div class="bottom-left-gradient"></div>
</section>
<footer>

    <div class="wrapper">

        <div class="footer-left">


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
</body>
</html>