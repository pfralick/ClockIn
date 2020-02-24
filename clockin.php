<?php

// Get the product data
$FName = filter_input(INPUT_GET, 'firstName');
$LName = filter_input(INPUT_GET, 'lastName');
$Lat = filter_input(INPUT_GET, 'latNum', FILTER_VALIDATE_FLOAT);
$Long = filter_input(INPUT_GET, 'longNum', FILTER_VALIDATE_FLOAT);


        
	// $Lat = $_GET["Lat"];
        // $Long = $_GET["Long"];
        
date_default_timezone_set("America/Denver");
/* echo nl2br ("\n" . $FName . " " . $LName . ", you clocked in today at " . date("Y/m/d") . " " . date("h:i:sa") . "\n");
echo "Latitude: " . $Lat;
echo "Longitude: " . $Long; */

require_once('database.php');

  
    // Add the item to the databasse

    $query = 'INSERT INTO clockin
                (number, firstname, lastname, Latitude, Longitude)
             VALUES
                (:num, :fname, :lname , :lat, :long)';  
    
    
    // Get last inserted ID
    $db = new PDO($dsn, $username, $password);
    $db->exec($query);
    $last_id = $db->lastInsertId();
    //echo "Hi " . $last_id;
    
    
 
    $statement = $db->prepare($query);
    $statement->bindValue(':num', $last_id);
    $statement->bindValue(':fname', $FName);
    $statement->bindValue(':lname', $LName);
    $statement->bindValue(':lat', $Lat);
    $statement->bindValue(':long', $Long);
    //$statement->bindValue(':time', 345);
   // $statement->bindValue(':date', 2019-12-28);
   // $statement->bindValue(':description', $desc);
   // $statement->bindValue(':progress', $comp);
    $success = $statement->execute();
    $statement->closeCursor();    
    
    // echo "Item inserted into the database.";
    // echo "Hi " . $last_id;
    

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="navbar-top-fixed.css">
    
    <title>PCI Clock In App</title>
  </head>
  <body>
    <h1></h1>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="http://localhost/clockIn/">Plath Construction Inc.</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/clockIn/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link disabled" href="http://localhost/clockIn/clockIn.php">Clock In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/clockIn/admin.php">Admin</a>
          </li>
        </ul>
        <!--
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
       </div>
    </nav>

<main role="main" class="container">
  <div class="jumbotron">
    <h1> </h1>
    <img class="mb-4" src="pciLogofullT.png" alt="" width="350" height="75">
    <p class="lead" id="clockInText"><?php echo nl2br ($FName . " " . $LName . ", you clocked in today at " . date("Y/m/d") . " " . date("h:i:sa")); ?></p>
    <p class="lead" id="clockInText"><?php echo nl2br ("Latitude: " . $Lat . " Longitude: " . $Long); ?></p>
    <button class="btn btn-lg btn-primary" onclick="initMap()">Show map</button>  
  </div>
</main>



    <style>
       /* Set the size of the div element that contains the map */
      #map {
        margin: 10px;
        height: 400px;  /* The height is 400 pixels */
        width: 99%;  /* The width is the width of the web page */
       }
    </style>

    <!--The div element for the map -->
    <div id="map"></div>
    <script>
        // Initialize and add the map
        function initMap() {
          // The location of Uluru
          var uluru = {lat: <?php echo $Lat; ?>, lng: <?php echo $Long; ?>};
          // The map, centered at Uluru
          var map = new google.maps.Map(
              document.getElementById('map'), {zoom: 14, center: uluru});
          // The marker, positioned at Uluru
          var marker = new google.maps.Marker({position: uluru, map: map});
        }
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_VYXsqLPkoHJLYKPnSU40cUV0ZtwvHoA&callback=">
        // src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_VYXsqLPkoHJLYKPnSU40cUV0ZtwvHoA&callback=initMap"> // auto initiate map with page load
    
    </script>
  </body>
</html>


<p><a href="admin.php">Admin Dashboard</a></p>  