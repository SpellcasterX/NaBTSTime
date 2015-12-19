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

function timecheck ($stationname, $conn){
      $return = array();
      $sql = "SELECT * FROM " . $stationname;
      $result = $conn->query($sql); 

      date_default_timezone_set("Asia/Bangkok");
      $currenthour = date('H');
      $currentminute = date('i');

        /*$currenthour=17;
        $currentminute=25;*/

        $currenttimemin = ($currenthour*60)+$currentminute;


        $check = True;
        $check2 = True;

       while($row = $result->fetch_assoc()){
          
          $minstart = ($row["in_time_hour"]*60)+ $row["in_time_minute"];

          if(($currenttimemin<$minstart) && $check){
            $return[0] = $row["in_time_hour"] . ":" . $row["in_time_minute"];
            $check = False;
          }

          $minstart2 = ($row["out_time_hour"]*60)+ $row["out_time_minute"];

          if(($currenttimemin<$minstart2) && $check2){
            $return[1] = $row["out_time_hour"] . ":" . $row["out_time_minute"];
            $check2 = False;
          }
       }

       return $return;

  
       }


?>

<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">

    <script src="bootstrap-dropdown.js"></script>

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">





  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container" >
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

<style>
    center {
    margin: auto;
    width: 80%;
    padding: 5px;
}
</style>



      <div class="container">
        <h1 style="margin-top: 40px; text-align: center;">Ratchatewi Station</h1>
        <h3 style="text-align: center;">To Bearing:</h3>
        <center>

        <?php
        $time = timecheck("station_a", $conn);
            echo $time[0];
        ?>
      </center>

<?php




 /*
$sql = "SELECT in_time_hour,in_time_minute FROM station_a";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
/    while($row = $result->fetch_assoc()) {
        $hour = $row["in_time_hour"];
        $minutes = $row["in_time_minute"];
        if($hour<10){
          $hour = "0".$hour;
        }
        if($minutes<10){
          $minutes = "0".$minutes;
        }
        echo "In time: " . $hour .":". $minutes. "<br>";
    }
} else {
    echo "0 results";
}


*/









?>

      </center>


        <h3 style="text-align: center;">To Mo-Chit:</h3>
        <center>
        <?php
        $time = timecheck("station_a", $conn);
            echo $time[1];
        ?>
      </center>
        
      </div>

      


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
    <script src="bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

  

</body></html>

<?php
$conn->close();
?>