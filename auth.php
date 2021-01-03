
<?php
    session_start();
    if(!empty($_SESSION['email'])&& $_SESSION['check']!=0)
    {
        header("Location:homepage.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Finder</title>
    <!--Meta tag-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!--bootstrap|css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--additional|css-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <!--Googlefont-1-->
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@600&family=Roboto:wght@100;300;400;500&display=swap"
        rel="stylesheet">
    <!--font Awesome-->
    <script src="https://kit.fontawesome.com/984b75d004.js" crossorigin="anonymous"></script>
    <script src="./js/js.js"></script>
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <!----LOGIN-PART------------>
                <div class="col-md-4">
                    <div class="jumbotron">
                        <h2 class="text-center" style=" font-family:'Baloo Tamma 2', cursive;">Log-In</h2>
                        <h6 class="text-muted" style="margin-top: 0.4rem;">Please Log-in to continue</h6>

                        <form novalidate action="login.php" id="form" method="POST" onsubmit=" return validate() ">
                            <input type="email" id="email" class="input input1" placeholder="Email" name="email" style ="color: black" ><br>
                            <small style="margin-bottom: 0.3rem; font-style: italic;" id="error"></small>

                            <input type="password" class="input input1" placeholder="Password" id="password"
                                name="password">
                            <small style="margin-bottom: 0.3rem; font-style: italic;" id="passerror"></small>
                            <br>
                            <a href="forgetPass.php" style="text-decoration: none;font-size: 12px;">Forgot
                                password?</a><br><br>
                            <input type="submit" class="btn btn-danger btn-danger1" value="Log-In"
                                style="margin-bottom: 10px;width: 100%;"><br>
                            <!----FORM-CHECKBOX-------------->
                            <input class="form-check-input" style="margin-left: 5px;margin-top: 7px;" type="checkbox"
                                value="" id="defaultCheck1">
                            <label class="form-check-label" style="font-size: 12px;margin-left: 22px;"
                                for="defaultCheck1">Keep me logged in</label><br><br>
                        </form>
                        <div class="text-center text-muted">Or LogIn With</div><br>
                        <hr class="my-2">
                        <div class="social-icon-pack text-center">
                            <i class="fab fa-facebook"></i>
                            <a href="/auth/google"><i class="fab fa-google"></i></a>
                            <i class="fab fa-linkedin"></i>
                        </div>
                    </div>
                </div>
                <!-----COMPANY-TEXT---->
                <div class="col-md-4" style="margin-top: 10%;">
                    <div class="jumbotron shadow">
                        <span class="display-4 company-text">Job Finder</span>
                        <span class="lead company-text-2">Find jobs without any hassle</span>
                    </div>
                </div>
                <!----------REGISTRATION-PART------>

                <div class="col-md-4">
                    <div class="jumbotron">
                        <h2 class="text-center" style=" font-family:'Baloo Tamma 2', cursive;">Register</h2>
                       
                        <form action="register.php" method="POST">
                            <input type="text" class="input input2" placeholder="Name" name="name" required><br>
                            <input type="email" class="input input2" placeholder="Email" name="email" required><br>
                            <input type="password" class="input input2" placeholder="Password" name="pass" required><br>
                            <input type="password" class="input input2" placeholder="Confirm Password"
                                name="pass2" required><br><br>
                            <input type="submit" class="btn btn-danger btn-danger2"
                                style="margin-bottom: 10px;width: 100%;" value="Register Now" name ="register">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!--attachments-->
    <!--bootstrap|js-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>

</html>