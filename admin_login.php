
<?php
    session_start();
    $_SESSION['check']=0;
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
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	                
                        body{margin-top:20px;}    
                        
                        /* custom google plus style theme */
                        @import url(http://fonts.googleapis.com/css?family=Roboto:400);
                        body {
                          background-color:#e0e0e0;
                          -webkit-font-smoothing: antialiased;
                          font: normal 14px Roboto,arial,sans-serif;
                          color:#545454;
                        }
                        
                        .btn,.form-control,.panel,.list-group,.well {border-radius:1px;box-shadow:0 0 0;}
                        .form-control {border-color:#d7d7d7;}
                        .btn-primary {border-color:transparent;}
                        .btn-primary,.label-primary,.list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {background-color:#4285f4;}
                        .btn-plus {background-color:#ffffff;border-width:1px;border-color:#dddddd;box-shadow:1px 1px 0 #999999;border-radius:3px;color:#666666;text-shadow:0 0 1px #bbbbbb;}
                        .well,.panel {border-color:#d2d2d2;box-shadow:0 1px 0 #cfcfcf;border-radius:3px;}
                        .btn-success,.label-success,.progress-bar-success{background-color:#65b045;}
                        .btn-info,.label-info,.progress-bar-info{background-color:#a0c3ff,border-color:#a0c3ff;}
                        .btn-danger,.label-danger,.progress-bar-danger{background-color:#dd4b39;}
                        .btn-warning,.label-warning,.progress-bar-warning{background-color:#f4b400;color:#444444;}
                        
                        hr {border-color:#ececec;}
                        button {
                            outline: 0;
                        }
                        
                        .panel .btn i,.btn span{
                          color:#666666;
                        }
                        .panel .panel-heading {
                          background-color:#ffffff;
                          font-weight:700;
                          font-size:16px;
                          color:#262626;
                          border-color:#ffffff;
                        }
                        .panel .panel-heading a {
                          font-weight:400;
                          font-size:11px;
                        }
                        .panel .panel-default {
                          border-color:#cccccc;
                        }
                        .panel .img-circle {
                          width:50px;
                          height:50px;
                        }
                        
                        h3,h4,h5 { 
                          border:0 solid #efefef; 
                          border-bottom-width:1px;
                          padding-bottom:10px;
                        }
                        
                        .modal-dialog {
                         width: 450px;
                        }
                        
                        .modal-footer,.modal-content,.modal-header {
                         border-width:0;
                        }
                        
                        
                            </style>
</head>
<body>
    

<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
         
          <h2 class="text-center"><img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-circle"><br>Admin</h2>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action="admin_process.php" method ="POST">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Name" name="name">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password" name="pass">
            </div>
            <div class="form-group">
              <input type="Submit" class="btn btn-primary btn-lg btn-block" value ="Submit">
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
         <a href="index.php"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button></a> 
    	  </div>	
      </div>
  </div>
  </div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>