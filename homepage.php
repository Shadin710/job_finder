<?php
    session_start();

    if(empty($_SESSION['email']))
    {
        header('Location:auth.php');
    }
    $main_em  = $_SESSION['email'];
    // for best jobs
    include_once 'includes/db_connection.php';

    $sql_skill  = "SELECT * FROM user_bio WHERE email = '$main_em'";

    $result = mysqli_query($conn,$sql_skill) or die("Failed to query the database" . mysqli_connect_error());

    $row = mysqli_fetch_assoc($result);

    $sql_best = "SELECT * FROM post_job WHERE salary >=50000 order by salary desc";
    $sql_recent = "SELECT * FROM post_job order by id desc";
    $sql_recommend = "SELECT * FROM post_job";

    //best jobs
    $result_best = mysqli_query($conn,$sql_best) or die("Failed to query the database" . mysqli_connect_error());
    $best_check  = mysqli_num_rows($result_best);
    
    //recent
    $result_recent = mysqli_query($conn,$sql_recent) or die("Failed to query the database" . mysqli_connect_error());
    $recent_check  = mysqli_num_rows($result_recent);

    //recommended jobs
	$result_recommend= mysqli_query($conn,$sql_recommend) or die("Failed to query the database" . mysqli_connect_error());
	$recommend_check  = mysqli_num_rows($result_recommend);
	$result_r= mysqli_query($conn,$sql_recommend) or die("Failed to query the database" . mysqli_connect_error());

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
   <style>
    body{
    background-color: #f5f4f5;
    margin-top:20px;
}

/* Tr Job Post */

.job-item {
    background-color: #fff;
}

.job-tab .nav-tabs {
	margin-bottom: 60px;
	border-bottom: 0;
}

.job-tab .nav-tabs>li {
	float: none;
	display: inline;
}

.job-tab .nav-tabs li {
	margin-right: 15px;
}

.job-tab .nav-tabs li:last-child {
	margin-right: 0;
}

.job-tab .nav-tabs {
	position: relative;
	z-index: 1;
	display: inline-block;
}

.job-tab .nav-tabs:after {
	position: absolute;
	content: "";
	top: 50%;
	left: 0;
	width: 100%;
	height: 1px;
	background-color: #fff;
	z-index: -1;
}



.job-tab .nav-tabs>li a {
	display: inline-block;
	background-color: #fff;
	border: none;
	border-radius: 30px;
	font-size: 14px;
	color: #000;
	padding: 5px 30px;
}

.job-tab .nav-tabs>li>a.active, 
.job-tab .nav-tabs>li a.active>:focus, 
.job-tab .nav-tabs>li>a.active:hover,
.job-tab .nav-tabs>li>a:hover {
	border: none;
	background-color: #008def;
	color: #fff;
}

.job-item {
	border-radius: 3px;
	position: relative;
	margin-bottom: 30px;
	z-index: 1;
}

.job-item .btn.btn-primary {
	text-transform: capitalize;
}

.job-item .job-info {
	font-size: 14px;
	color: #000;
	overflow: hidden;
	padding: 40px 25px 20px;
}

.job-info .company-logo {
	margin-bottom: 30px;
}

.job-info .tr-title {
	margin-bottom: 15px;
}

.job-info .tr-title span {
	font-size: 14px;
	display: block;
}

.job-info .tr-title a {
	color: #000;
}

.job-info .tr-title a:hover {
	color: #008def;
}

.job-info ul {
	margin-bottom: 30px;
}

.job-meta li,
.job-meta li a {
	color: #646464;	
}

.job-meta li a:hover {
	color: #008def;
}

.job-meta li {
	font-size: 12px;
	margin-bottom: 10px;
}

.job-meta li span i {
	color: #000;
}

.job-meta li i {
	margin-right: 15px;
}

.job-item .time {
	position: relative;
}

.job-item .time:after {
	position: absolute;
	content: "";
	bottom: 35px;
	left: -50px;
	width: 150%;
	height: 1px;
	background-color: #f5f4f5;
	z-index: -1;
}

.job-item:hover .time,
.job-item:hover .time:after {
	opacity: 0;
}

.job-item .time span {
	font-size: 12px;
	color: #bebebe;
	line-height: 25px;
}

.job-item .btn.btn-primary,
.role .btn.btn-primary,
.job-item .time a span {
	padding: 5px 10px;
    border-radius: 4px;
    line-height: 10px;
    font-size: 12px;
}

.job-item .time a span {
	color: #fff;
    background-color: #f1592a;
    border-color: #f1592a;	
}

.job-item .time a span.part-time {
	background-color: #00aeef;
	border-color: #00aeef;
}

.job-item .time a span.freelance {
	background-color: #92278f;
	border-color: #92278f;	
}

.job-item .item-overlay {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	border-radius: 5px;
	background-color: #008def;
	color: #fff;
	opacity: 0;
	-webkit-transition: all 800ms;
	-moz-transition: all 800ms;
	-ms-transition: all 800ms;
	-o-transition: all 800ms;
	transition: all 800ms;
}

.job-item:hover .item-overlay {
	opacity: 1;
}

.item-overlay .job-info {
	padding: 45px 25px 40px;
	overflow: hidden;
}

.item-overlay .btn.btn-primary {
	background-color: #007bd4;
	border-color: #007bd4;
	margin-bottom: 10px;
}

.item-overlay .job-info,
.item-overlay .job-info ul li,
.item-overlay .job-info ul li i,
.item-overlay .job-info .tr-title a {
	color: #fff;
}

.job-social {
	margin-top: 35px;
}

.job-social li {
	float: left;
}

.job-social li + li {
	margin-left: 15px;
}

.job-social li a i {
	margin-right: 0;
	font-size: 14px;
}

.job-social li a {
	width: 35px;
	height: 35px;
	text-align: center;
	display: block;
	background-color: #007bd4;
	line-height: 35px;
	border-radius: 100%;
	border: 1px solid #007bd4;
	position: relative;
	overflow: hidden;
	z-index: 1;
}

.job-social li:last-child a {
	background-color: #fff;
}

.job-social li:last-child a i {
	color: #008def;
}

.job-social li a:before {
	position: absolute;
	content: "";
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	z-index: -1;
	border-radius: 100%;
	background-color:#008def;
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    -ms-transform: scale(0);
    transform: scale(0);	
}

.job-social li a:hover:before {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
    padding: 5px;
}

.job-social li a:hover {
	border-color: #fff;
}

.job-social li a:hover i {
	color: #fff;
}

.tr-list {
    margin: 0;
    padding: 0;
    list-style: none;
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
    </div>
</header>


<!-- LOGO AND MENU END -->



<!-- INTRO PAGE -->




<!-- Intro Page END -->


<!-- About Page Start -->
<br><br><br><br><br><br>
<section id="about">
    <div class="wrapper">
    <div class="container">
		<div class="job-tab text-center">
			<ul class="nav nav-tabs justify-content-center" role="tablist">
				<li role="presentation" class="active">
					<a class="active show" href="#hot-jobs" aria-controls="hot-jobs" role="tab" data-toggle="tab" aria-selected="true">Best Jobs</a>
				</li>
				<li role="presentation"><a href="#recent-jobs" aria-controls="recent-jobs" role="tab" data-toggle="tab" class="" aria-selected="false">Recent Jobs</a></li>
				<li role="presentation"><a href="#popular-jobs" aria-controls="popular-jobs" role="tab" data-toggle="tab" class="" aria-selected="false">Recommended Jobs</a></li>
			</ul>
			<div class="tab-content text-left">
				<div role="tabpanel" class="tab-pane fade active show" id="hot-jobs">
					<div class="row">
						<?php
							if($best_check>0)
							{
								while($row_best=mysqli_fetch_assoc($result_best))
								{
									echo '<div class="col-md-6 col-lg-3">
									<div class="job-item">
										<div class="item-overlay">
											<div class="job-info">
												<a href="#" class="btn btn-primary">'. $row_best['type_time'] .'</a>
												<span class="tr-title">
													<a href= apply.php?id=' . $row_best['id'] . '>' . $row_best['position'] . '</a>
													<span><a href=apply.php?id=' . $row_best['id'] . '>Apply</a></span>
												</span>
												<ul class="tr-list job-meta">
													<li><i class="fa fa-map-signs" aria-hidden="true"></i>' . $row_best['comAddress'] . '</li>
													<li><i class="fa fa-briefcase" aria-hidden="true"></i>' . $row_best['exper'] . '</li>
													<li><i class="fa fa-money" aria-hidden="true"></i>' . $row_best['salary'] . '</li>
												</ul>
											</div>										
										</div>
										<div class="job-info">
											<div class="company-logo">
												
											</div>
											<span class="tr-title">
												<a href="#">' . $row_best['comName'] . '</a><br />
												<a href="#">' . $row_best['position'] . '</a>
												
											</span>
											<ul class="tr-list job-meta">
												<li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>' . $row_best['comAddress'] . '</li>
												<li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>' . $row_best['exper'] . '</li>
												<li><span><i class="fa fa-money" aria-hidden="true"></i></span>' . $row_best['salary'] . '</li>
											</ul>
											<div class="time">
												<a href="#"><span>' . $row_best['type_time'] . '</span></a>
												
											</div>																				
										</div>
									</div>
								</div>';
								}
							}
						?>

					</div><!-- /.row -->
				</div><!-- /.tab-pane -->


				<div role="tabpanel" class="tab-pane fade in" id="recent-jobs">
					<div class="row">
					<?php
						if($recent_check>0)
						{
							while($row_recent = mysqli_fetch_assoc($result_recent))
							{
								echo '<div class="col-md-6 col-lg-3">
								<div class="job-item">
									<div class="item-overlay">
										<div class="job-info">
										<a href="#" class="btn btn-primary">'. $row_recent['type_time'] .'</a>
											<span class="tr-title">
												<a href=apply.php?id=' . $row_recent['id'] . '>' . $row_recent['position'] . '</a>
												<span><a href=apply.php?id=' . $row_recent['id'] . '>Apply</a></span>
											</span>
											<ul class="tr-list job-meta">
												<li><i class="fa fa-map-signs" aria-hidden="true"></i>' . $row_recent['comAddress'] . '</li>
												<li><i class="fa fa-briefcase" aria-hidden="true"></i>' . $row_recent['exper'] . '</li>
												<li><i class="fa fa-money" aria-hidden="true"></i>' . $row_recent['salary'] . '</li>
											</ul>

										</div>										
									</div>								
									<div class="job-info">
										<div class="company-logo">
											
										</div>
										<span class="tr-title">
											<a href="#">' . $row_recent['comName'] . '</a><br />
											<a href="#">' . $row_recent['position'] . '</a>
											
										</span>
										<ul class="tr-list job-meta">
											<li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>' . $row_recent['comAddress'] . '</li>
											<li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>' . $row_recent['exper'] . '</li>
											<li><span><i class="fa fa-money" aria-hidden="true"></i></span>' . $row_recent['salary'] . '</li>
										</ul>
										<div class="time">
											<a href="#"><span class="part-time">' . $row_recent['type_time'] . '</span></a>
											
										</div>				
									</div>
								</div>
							</div>	';
							}
						}
					?>

					</div><!-- /.row -->	
				</div><!-- /.tab-pane -->
				<div role="tabpanel" class="tab-pane fade in" id="popular-jobs">
					<div class="row">
						<?php
							if($recommend_check>0)
							{
								$count_arry = array();
							
								while($row_recommend = mysqli_fetch_assoc($result_recommend))
								{
									$count_recom=0;
									// count_recom will count the number of matches found in a job and a person
									if ($row_recommend['position']==$row['position_1'] Or $row_recommend['position']== $row['position_2'] Or $row_recommend['position']== $row['occupation'])
									{
										$count_recom++;
									}
									if(($row_recommend['skill']==$row['skill0']) Or ($row_recommend['skill']==$row['skill1']) Or ($row_recommend['skill']==$row['skill2']) Or ($row_recommend['skill']==$row['skill3']) Or ($row_recommend['skill']==$row['skill4']))
									{
										$count_recom++;
									}
									if(($row_recommend['skill1']==$row['skill0']) Or ($row_recommend['skill1']==$row['skill1']) Or ($row_recommend['skill1']==$row['skill2']) Or ($row_recommend['skill1']==$row['skill3']) Or ($row_recommend['skill1']==$row['skill4']))									
									{
										$count_recom++;
									}
									if(($row_recommend['skill2']==$row['skill0']) Or ($row_recommend['skill2']==$row['skill1']) Or ($row_recommend['skill2']==$row['skill2']) Or ($row_recommend['skill2']==$row['skill3']) Or ($row_recommend['skill2']==$row['skill4']))
									{
										$count_recom++;
									}
									if(($row_recommend['skill3']==$row['skill0']) Or ($row_recommend['skill3']==$row['skill1']) Or ($row_recommend['skill3']==$row['skill2']) Or ($row_recommend['skill3']==$row['skill3']) Or ($row_recommend['skill3']==$row['skill4']))
									{
										$count_recom++;
									}
									if(($row_recommend['skill4']==$row['skill0']) Or ($row_recommend['skill4']==$row['skill1']) Or ($row_recommend['skill4']==$row['skill2']) Or ($row_recommend['skill4']==$row['skill3']) Or ($row_recommend['skill4']==$row['skill4']))
									{
										$count_recom++;
									}
									//storing the count value in another array by using array_push 
									
									array_push($count_arry,$count_recom);
									
								
								}
								$refactor_index = array();
								for ($i=0; $i <$recommend_check; $i++) { 
									// helps us to get the max value
									$get_max = max($count_arry);

									$get_index = array();
									//this array keys will help use to find index of the max value
									$get_index = array_keys($count_arry,$get_max);
									//array_keys always returns an array so no need to check if it's an array

									//the below for loop will help us to insert every data in refactor array
										for ($j=0; $j <count($get_index) ; $j++) { 
											array_push($refactor_index,$get_index[$j]);
											$pos = $get_index[$j];
											$count_arry[$pos] = -1;
										}

								}
							$j=0;
							$refactor_index = array_unique($refactor_index);
							for ($i=0; $i <count($refactor_index);$i++) 
							{ 
									
								$cou=0;
								$result_r=array();
								$result_r[$j] = mysqli_query($conn,$sql_recommend) Or die("Failed to query " . mysqli_error($conn));

								while($row_r =mysqli_fetch_assoc($result_r[$j])) 
								{ 
								
									if($cou == $refactor_index[$i])
									{
											
										echo '<div class="col-md-6 col-lg-3">
										<div class="job-item">
											<div class="item-overlay">
												<div class="job-info">
													<a href="#" class="btn btn-primary">' . $row_r['type_time'] . '</a>
													<span class="tr-title">
														<a href=apply.php?id=' . $row_r['id'] . '>' . $row_r['position'] . '</a>
														<span><a href=apply.php?id=' . $row_r['id'] . '>Apply</a></span>
													</span>
													<ul class="tr-list job-meta">
														<li><i class="fa fa-map-signs" aria-hidden="true"></i>' . $row_r['comAddress'] . '</li>
														<li><i class="fa fa-briefcase" aria-hidden="true"></i>' . $row_r['exper'] . '</li>
														<li><i class="fa fa-money" aria-hidden="true"></i>' . $row_r['salary'] . '</li>
													</ul>
												</div>										
											</div>								
											<div class="job-info">
												<div class="company-logo">
													
												</div>
												<span class="tr-title">
													<a href="#">' . $row_r['comName'] . '</a><br />
													<a href="#">' . $row_r['position'] . '</a>
													
												</span>
												<ul class="tr-list job-meta">
													<li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>' . $row_r['comAddress'] . '</li>
													<li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>' . $row_r['exper'] . '</li>
													<li><span><i class="fa fa-money" aria-hidden="true"></i></span>' . $row_r['salary'] . '</li>
												</ul>	
												<div class="time">
													<a href="#"><span>' . $row_r['type_time'] . '</span></a>
												</div>			
											</div>
										</div>
									</div>';
									
									break;
									}
									$cou++;
									
								}
								$j++;
							}
						}
					?>
						
					</div><!-- /.row -->	
				</div><!-- /.tab-pane -->
			</div>				
		</div><!-- /.job-tab -->			
	</div><!-- /.container -->
    </div>

    
</section>

<!-- About Page END -->

<!-- Page Banner START -->



<!-- Banner END -->


<!-- FOOTER START -->


<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

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