<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "btstime";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>



<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jumbotron Template for Bootstrap</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <!-- Custom styles for this template -->
  



    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
          <a class="navbar-brand" href="#">BTS Time</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              
            </div>
            <div class="form-group">
              
            </div>
            
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">




      <div class="container text-center">
        <h1 style="margin-top: 40px; text-align: center;">BTS Time </h1>

<div class="btn-group">
      <button type="button" class="btn btn-success dropdown-toggle btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 330px; color: white;">Choose your station <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="StationA.php">StationA</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Separated link</a></li>
      </ul>
    </div>

      </div>

<div class="container text-center">



<div class="btn-group">

  <button type="button" class="btn btn-success dropdown-toggle btn-lg" data-toggle="modal" data-target=".bs-example-modal-sm" style="width: 330px; margin-top: 10px; background-color:  ">Light Green Line</button>

  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <h4><a href="StationA.php">StationA</a></h4>
      </div>
    </div>
  </div>

<!--
  <button type="button" class="btn btn-success dropdown-toggle btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 330px; margin-top: 10px; background-color:  ">Choose your station <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
-->
</div>




</div>
      </div>
    </div>

    <div class="container">
      <div class="col-lg-6">
        <form action="index.php" method="post">

        <div class="input-group">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Go!</button>
          </span>
          <input type="text" class="form-control" name="station" placeholder="Search for...">
         
        </div>
         <?php

        $sql = "SELECT station_name FROM station_name";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["station_name"]."<br>";
            }
        } else {
            echo "0 results";
        }



          ?><!-- /input-group -->
        </form>
        
      </div>

      <hr>

    <div class = "navbar navbar-default navbar-fixed-bottom">
        <div class = "container">
          <div class="row">
            <div class="col-xs-3">
              <a class = "navbar-btn btn-default btn pull-left btn-block" href="index.php"><span class="glyphicon glyphicon-search"></span> Home</a>
            </div>
            <div class="col-xs-3">
              <a class="navbar-btn btn-primary btn btn-block"  href="index2.php">Map</a>
            </div>
            <div class="col-xs-3">
              <a class = "navbar-btn btn-warning btn btn-block" href="Favorites.php" >Favorites</a>
            </div>
            <div class="col-xs-3">
              <a class = "navbar-btn btn-danger btn btn-block">Help</a>
            </div>
          </div>
        </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
    <?php
    
      




function datagenerator($hour, $minute, $hour2, $minute2, $stationname, $conn){
      $sql = "SELECT in_time_hour FROM " . $stationname;
      $result = $conn->query($sql);
      if ($result->num_rows == 0) {

          for($x=1; $x<300; $x++){

            $sql = "INSERT INTO " . $stationname . " (in_time_hour,in_time_minute,out_time_hour,out_time_minute) VALUES ($hour, $minute, $hour2, $minute2)";
            $minstart=($hour*60)+$minute;

            //Increment//
            if($minstart>=315 && $minstart<420){
              $increment = 5;
            }

            elseif($minstart>=420 && $minstart<540){
              $increment = 2.83;
            }

            elseif($minstart>=540 && $minstart<570){
              $increment = 3.58;
            }

            elseif($minstart>=570 && $minstart<960){
              $increment = 5.92;
            }

            elseif($minstart>=960 && $minstart<990){
              $increment = 4.42;
            }

            elseif($minstart>=990 && $minstart<1020){
              $increment = 3;
            }

            elseif($minstart>=1020 && $minstart<1140){
              $increment = 3;
            }

            elseif($minstart>=1140 && $minstart<1200){
              $increment = 3.58;
            }

            elseif($minstart>=1200 && $minstart<1260){
              $increment = 4.42;
            }

            elseif($minstart>=1260 && $minstart<1320){
              $increment = 6;
            }

            elseif($minstart>=1320 && $minstart<1440){
              $increment = 8;
            }

            elseif($minstart<360 || $minstart>=1440){
              break;
            }

            //Increment  
            
            $conn->query($sql);

            $minute = $minute + $increment;
            if($minute>=60){
              $hour = $hour + 1;
              $minute = $minute - 60;
            }
            if($hour>=24){
              break;
            }

            $minute2 = $minute2 + $increment;
            if($minute2>=60){
              $hour2 = $hour2 + 1;
              $minute2 = $minute2 - 60;
            }
            if($hour2>=24){
              break;
            }



            }

          }

          }
        

datagenerator(5,15,5,20,"station_a", $conn);
datagenerator(5,16,5,21,"station_b", $conn);
datagenerator(5,19,5,24,"station_c", $conn);

    ?>

</body></html>