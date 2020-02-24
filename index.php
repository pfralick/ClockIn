<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="signin.css">
    
	<title>PCI Clock In</title>
  </head>
  <body>
    <h1></h1>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </body>




<form class="form-signin" method="get" action="clockin.php">
    <img class="mb-4" src="pciLogofullT.png" alt="" width="300" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Remote Punch Clock. <br>Please clock in.</h1>
  <i class='fas fa-location-arrow' style='font-size:24px'></i>
  <label for="inputEmail" class="sr-only">First name</label>
  <input type="text" name="firstName" class="form-control" placeholder="First name">
  <input type="text" name="lastName" class="form-control" placeholder="Last name"> 
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label> 
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="button" onclick="getLocation()">Get Location</button>  <!-- use type=button so form does not submit and refresh page -->
  Latitude:
  <input type="text" name="latNum" id="insertLatitude" class="form-control" placeholder="Get coordinates" required autofocus>
  Longitude:
  <input type="text" name="longNum" id="insertLongitude" class="form-control" placeholder="Get coordinates" required>
  <!-- p class="mt-3 mb-3 text-muted" id="demo">Latitude:<br>Longitude:</p> -->
  <button class="btn btn-lg btn-primary btn-block" type="button" onclick="initMap()">Show map</button> 
  <div id="map"></div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" >Clock In</button>
  <p class="mt-5 mb-3 text-muted">&copy; PFWD 2020</p>
  
 
</form>
  
    
</html>
<!-- <footer>
     <button class="btn btn-lg btn-primary btn-block" type="button" onclick="initMap()">Show map</button>
     </footer> -->

<!--The GPS location element -->
<script>
var x = document.getElementById("demo");


function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
    // var ab = position.coords.latitude;
    // document.write(ab);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
    
function showPosition(position) {
     
    // document.getElementById("demo").innerHTML = x.innerHTML="Latitude: " + position.coords.latitude + 
    // "<br>Longitude: " + position.coords.longitude;
     Lat = position.coords.latitude;
     Long = position.coords.longitude;
     document.getElementById("insertLatitude").value = Lat;
     document.getElementById("insertLongitude").value = Long;
     //document.getElementById("demo").innerHTML = Lat;
}

</script>

<script>
function clockInFunction() {
    // not used, variales passed via form above
  window.location.href = "clockin.php?Lat=" + Lat + "&Long=" + Long;   //send javascript variables to php via href
}
</script>




<!--The div element for the map -->
    
    <script>
        // Initialize and add the map
        function initMap() {
          // The location of Uluru
          var uluru = {lat: Lat, lng: Long};
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
    
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        border: black;
        
        width: 400px;
        height: 200px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>