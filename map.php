<?php
$name = filter_input(INPUT_GET, 'name');
$latitude = filter_input(INPUT_GET, 'lat', FILTER_VALIDATE_FLOAT);
$longitude = filter_input(INPUT_GET, 'long', FILTER_VALIDATE_FLOAT);
$longitude = filter_input(INPUT_GET, 'long', FILTER_VALIDATE_FLOAT);
echo $name . " ";
echo $latitude;
echo $longitude;

?>

<!DOCTYPE html>
<html>
  <head>
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 90%;  /* The width is the width of the web page */
       }
    </style>
  </head>
  <body>
    <h3>Plath Construction Inc.</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
        // Initialize and add the map
        function initMap() {
          // The location of Uluru
          var uluru = {lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?>};
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
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_VYXsqLPkoHJLYKPnSU40cUV0ZtwvHoA&callback=initMap">
    </script>
  </body>
</html>